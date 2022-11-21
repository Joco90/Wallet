<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        // $userConect=

        return view('login');
    }

    public function connexion(Request $request){

        $rules=[
            'email'=> 'required',
            'passwords'=> 'required',
        ];
        $messages=[
            'email.required' => 'Ce champs est obligatoire.',
            'passwords.required' => 'Ce champs est obligatoire.',
        ];

        // dd($request);

        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return redirect('/')->withErrors($validate);
        }
        $user=Utilisateur::Where('email',$request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors("L'adresse mail est incorrect ou votre compte désactivé. Veuillez contacter l'administrateur.");
        }
        if($user->passwords==null){
            Auth::guard()->login($user);
            return redirect('/Changer-mot-de-passe');
        }else{
            if(!Hash::check($request->get('passwords'), $user->passwords)){
                return redirect()->back()->withErrors("Le mot de passe est incorrect.");
                //
            }else{
                Auth::guard()->login($user);
                return redirect('/gestion-de-mon-wallet');
            }
        }

    }

    public function changePassword(){
        $email=Auth::user()->email;
        return view('Utilisateur.changePassword',['email'=>$email]);

    }

    public function store(Request $request){
        $rules=[
            'passwords'=> 'required',
            'password-confirm'=>'same:passwords',
        ];
        $messages=[
            'passwords.required' => 'Ce champs est obligatoire.',
            'password-confirm.same' => 'Les mots de passes sont différents.',
        ];

        // dd($request);

        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $passwordCrypt=Hash::make($request->passwords);
            $user=Utilisateur::Where('email',$request->email)->first();
            if($user){
                $user->passwords=$passwordCrypt;
                $user->password_default=null;
                $user->save();
                Auth::guard()->login($user);
                return redirect('/gestion-de-mon-wallet');

            }else return redirect()->back()->withErrors('Oops une erreur est survenu!');


    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
