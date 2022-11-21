<?php

namespace App\Models;
use App\Models\Budget;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenu extends Model
{
    use HasFactory;
    protected $fillable = ['libelle','montant','date_revenu','budget_id','user_id','etat'];

    public function utilisateur(){

        return $this->belongsTo(Utilisateur::class,'user_id');
    }

    public function budget(){

        return $this->belongsTo(Budget::class,'budget_id');
    }
}
