<?php

namespace App\Models;
use App\Models\Utilisateur;
use App\Models\Categorie;
use App\Models\Budget;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;
    protected $fillable = ['libelle','montant','etat','user_id','categorie_id','budget_id'];

    public function utilisateur(){

        return $this->hasMany(Utilisateur::class,'user_id');
    }
    public function categorie(){

        return $this->hasMany(Categorie::class,'categorie_id');
    }

    public function budget(){

        return $this->hasMany(Budget::class,'budget_id');
    }
}
