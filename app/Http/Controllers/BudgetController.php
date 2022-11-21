<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Affichage des budgets sauvegarde
        $title=Str::upper("liste des budgets");
        $user=Auth::id();
        $budget=Budget::Where('user_id',$user)->where('etat',1)->get();
        return view('Budget.index',['budgets'=>$budget,'titre'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title=str::upper("Création de budget");
        $budget= new Budget();

        return view('Budget.create',['titre'=>$title,'budget'=>$budget]);

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
        // exit;
         $rules=[
            'libelle'=> 'required|string|max:150',
            'dateDeb'=> 'required|date',
            'dateFin'=> 'required|date',
        ];
        $messages=[
            'libelle.required' => 'Ce champs est obligatoire.',
            'libelle.string' => 'Saisie incorrecte',
            'libelle.Max' => 'saisie trop longue',
            'dateDeb.required' => 'Ce champs est obligatoire.',
            'dateFin.required' => 'Ce champs est obligatoire.',
        ];
        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return redirect('/create-budget')->withErrors($validate);
        }
        $user=Auth::id();
        $budget=Budget::where('libelle',$request->libelle)->where('user_id',$user)->first();
        if (!$budget) {
            Budget::create([
                'libelle'=> $request->libelle,
                'dateDeb'=>$request->dateDeb,
                'dateFin'=>$request->dateFin,
                'user_id'=>$user,
                'etat'=> 1,
            ]);
            return redirect()->back()->with(array('success'=>'Félicitation!! Votre opération a été effectué avec succès.'));
        }else return redirect()->back()->withErrors("Cette catégorie existe déjà");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit($budget)
    {
        //
        $title=Str::upper("Modification de budget");
        $user=Auth::id();
        $budget=Budget::where('user_id',$user)->where('id',$budget)->first();
        // dd($budget);
        return view('Budget.edit',['budget'=>$budget,'titre'=>$title]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy($budget)
    {
        //
        $user=Auth::id();
        $budget=Budget::where('user_id',$user)->where('id',$budget)->first();

        if($budget){
            $budget->etat=0;
            $budget->save();

            return redirect()->back()->with(array('success'=>'Suppression effectué avec succès.'));

        }
    }
}
