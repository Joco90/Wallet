<?php

namespace App\Http\Controllers;

use App\Models\Revenu;
use App\Models\Budget;
use App\Models\Utilisateur;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RevenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id=Auth::id();

    // dd($maxDate);
        $title=str::upper('Mes entrées de');

        $revenu=Revenu::where('etat',1)->where('user_id',$id)->paginate(6);
        return view('Revenus.index',['titre'=>$title,'revenus'=>$revenu]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $budget=Budget::Where('user_id',Auth::id())->where('etat',1)->get();

        $title=str::upper('saisie revenu');
        $titre='Ma saisie du jour';
        return view('Revenus.create',['titre'=>$title,'title'=>$titre,'budgets'=>$budget]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $id=Auth::id();
        // $rules=[
        //     'montant'=> 'required|numeric',
        //     'libelle'=> 'required|string',
        //     'budget_id'=> 'required',
        //     'date_revenu'=> 'required|date',
        // ];
        // $messages=[
        //     'montant.required' => 'Ce champs est obligatoire.',
        //     'libelle.required' => 'Ce champs est obligatoire.',
        //     'libelle.string' => 'Saisie incorrecte.',
        //     'montant.numeric' => 'Saisie incorrecte',
        //     'budget_id.required' => 'Ce champs est obligatoire.',
        //     'date_revenu.required' => 'Ce champs est obligatoire.',
        //     'date_revenu.date' => 'Le format saisie est incorrect.',
        // ];

        // $validate=Validator::make($request->all(),$rules,$messages);
        // if ($validate->fails()) {
        //     return response()->json(['error' => $validate->errors()->all()]);
        // }
        $user=Utilisateur::where('id',$request->user)->first();
        if($user){
           Revenu::Create([
                'libelle' => $request->libelle_revenu,
                'montant' => $request->montant_revenu,
                'date_revenu' => $request->date_revenu,
                'budget_id' => $request->budget,
                'user_id' => $request->user,
                'etat' => 1,
            ]);
            // $this->chargeDroit();
            return response()->json(['success'=>'La sauvegarde a été effectué avec succès.',
        'data'=>$request->montant_revenu]);
        }else return response()->json([['error'=>'Impossible de stocker.'],'data'=>[$request]]);

        // return redirect()->back()->with(array('success'=>'La sauvegarde a été effectué avec succès.'));

    }

    public function chargeDroit(){
        $a = apache_request_headers();
        $user = $a["user"];
        $revenu=Revenu::where('etat',1)->where('user_id',$user)->latest()->first();
        $budget= Budget::find($revenu->budget_id);
        $title='une chose';
        return response()->json([['budget'=>$budget->libelle],'revenu'=>[$revenu]]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revenu  $revenu
     * @return \Illuminate\Http\Response
     */
    public function show(Revenu $revenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revenu  $revenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Revenu $revenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revenu  $revenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revenu $revenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revenu  $revenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revenu $revenu)
    {
        //
    }
}
