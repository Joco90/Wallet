<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests\UtilRequest;
use App\Mail\SendPasswordDefault;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title=Str::upper('les utilisateurs');
        $users=Utilisateur::where('ETAT',1)->paginate(20);
        return view('Utilisateur.index',compact('users'),['titre'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $int=0;
        $title=Str::upper('Création d\'un utilisateur');
        return view('Utilisateur.create',['titre'=>$title,'activefile'=>$int]);
    }



    public function store(UtilRequest $request)
    {
        $password_defautl=$this->password_default();
        if ($request->file('photo')) {
            $pp=$request->photo;
            $nompp="photo_profile_".date('YmdHis');
            if (is_dir(public_path('photo_profile'))) {
                $estDeplace=$pp->move(public_path('photo_profile'),$nompp);
            }else {
                $verif=mkdir(public_path('photo_profile'));
                if ($verif) {
                    $estDeplace=$pp->move(public_path('photo_profile'),$nompp);
                }
            }


           if ($estDeplace) {
                Utilisateur::create([
                    'name' => $request->name,
                    'firstnames' => $request->firstnames,
                    'email' => $request->email,
                    'telephone' => $request->telephone,
                    'photo' => $nompp,
                    'ETAT' => 1,
                    'password_default' =>Hash::make($password_defautl) ,

                ]);
                Mail::to($request->email)->send(new SendPasswordDefault($request->name,$request->email,$password_defautl));
                return redirect()->back()->with(array('success'=>'Félicitation!! Votre opération a été effectué avec succès.'));

           }else {
            return redirect()->back()->withErrors("Une erreur est survenue. Veuillez rééssayer ultérieurement.");

           }
        }else {
            Utilisateur::create([
                'name' => $request->name,
                'firstnames' => $request->firstnames,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'ETAT' => 1,
                'password_default' =>Hash::make($password_defautl) ,

            ]);
            Mail::to($request->email)->send(new SendPasswordDefault($request->name,$request->email,$password_defautl));
            return redirect()->back()->with(array('success'=>'Félicitation!! Votre opération a été effectué avec succès.'));

        }
        // echo mkdir(public_path('photo_profile'));
        // echo $this->password_default();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $int=1;
        $title=Str::upper('Modification d\'un utilisateur');
        $users=Utilisateur::where('id',$id)->where('ETAT',1)->first();

        return view('Utilisateur.edit',['users'=>$users,'titre'=>$title,'activefile'=>$int]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
//Cette methode génère n mot de passe par défaut
    public function password_default(){
        $nbr=0;
        $init=str::random(1);
        for ($i=1; $i <4 ; $i++) {
            $nbr.=random_int(0,9);
        }
        $password_defautl=$nbr.strtoupper($init);
        return $password_defautl;
    }
}
