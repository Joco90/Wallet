<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::id();
        $categories=Categorie::where('etat',1)->where('userCreated',$user)->get();
        $title=Str::upper('Liste de catégorie');
        return view('Admin.categorie',['categories'=>$categories,'titre'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title=Str::upper('Création de catégorie');
        return view('Admin.createCategorie',['titre'=>$title]);
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
        $rules=[
            'libelle'=> 'required|string|max:60',
        ];
        $messages=[
            'libelle.required' => 'Ce champs est obligatoire.',
            'libelle.string' => 'Saisie incorrecte',
            'libelle.Max' => 'saisie trop longue',
        ];
        $validate=Validator::make($request->all(),$rules,$messages);
        if ($validate->fails()) {
            return redirect('/create-categorie')->withErrors($validate);
        }
        $user=Auth::id();
        $categorie=Categorie::where('libelle',$request->libelle)->where('userCreated',$user)->first();
        if (!$categorie) {
            Categorie::create([
                'libelle'=> $request->libelle,
                'userCreated'=>$user,
                'etat'=> 1,
            ]);
            return redirect()->back()->with(array('success'=>'Félicitation!! Votre opération a été effectué avec succès.'));
        }else return redirect()->back()->withErrors("Cette catégorie existe déjà");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($categorie)
    {
        //  echo $categorie;
        $categorie=Categorie::find($categorie);
        $title=str::upper('Modification de Categorie');

        return view('Admin.updateCategorie',['categorie'=>$categorie,'titre'=>$title]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
        if ($request->libelle==null) {

            return view('Admin.categorie');
        }

        $categorie=Categorie::find($request->id);
        if($categorie){
            $categorie->libelle=$request->libelle;
            $categorie->save();

            return redirect('/categorie')->with(array('success'=>'Modification effectuée avec succès.'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($categorie)
    {
        //

        $categorie=Categorie::destroy($categorie);
        if($categorie){
            // $categorie->delete();
            return redirect('/categorie')->with(array('success'=>'Suppression effectuée avec succès.'));
        }
        echo "ok";
    }
}
