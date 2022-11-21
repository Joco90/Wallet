<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\Budget;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title=str::upper('Mes depenses');
        $id=Auth::id();
        $budgets=Budget::where('etat',1)->where('user_id',$id)->get();
        return view('Depenses.index',['titre'=>$title,'budgets'=>$budgets]);
        // $depenses=Depense::where('etat',1)->where('user_id',$id)->get();
        // // $nombre=$depenses->count();
        // // dd($nombre);
        // if ($depenses->count()==0) {
        //     $budgets=Budget::where('etat',1)->where('user_id',$id)->get();
        //     return view('Depenses.index',['titre'=>$title,'budgets'=>$budgets]);
        // }else{

        //     return view('Depenses.index',['titre'=>$title,'depenses'=>$depenses]);
        // }



    }

    public function annulerDepense($id){

    }

    public function clotureDepense($id){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $user=Auth::id();
        $categorie=Categorie::where('userCreated',$user)->where('etat',1)->get();
        $title=str::upper('Mes depenses');
        $budget=Budget::find($id);
        return view('Depenses.ajout',['titre'=>$title,'budget'=>$budget,'categories'=>$categorie]);
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
        // dd($request);
        $rules=[
            'montant'=> 'required|numeric',
            'libelle'=> 'required|string',
            'categorie_id'=> 'required',
            'budget_id'=> 'required',
        ];
        $messages=[
            'montant.required' => 'Ce champs est obligatoire.',
            'libelle.required' => 'Ce champs est obligatoire.',
            'libelle.string' => 'Saisie incorrecte.',
            'montant.numeric' => 'Saisie incorrecte',
            'categorie_id.required' => 'Ce champs est obligatoire.',
            'budget_id.required' => 'Ce champs est obligatoire.',
        ];

        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $user=Auth::id();
        Depense::Create([
            'libelle' => $request->libelle,
            'montant' => $request->montant,
            'budget_id' => $request->budget_id,
            'categorie_id' => $request->categorie_id,
            'user_id' => $user,
            'etat' => 1,
        ]);
        return redirect()->back()->with(array('success'=>'La sauvegarde de la dépense a été effectué avec succès.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        echo 'ok';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function edit(Depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depense $depense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depense $depense)
    {
        //
    }
}
