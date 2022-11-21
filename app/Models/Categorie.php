<?php

namespace App\Models;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['libelle','userCreated','etat'];

    public function utilisateur(){

        return $this->belongsTo(Utilisateur::class,'userCreated');
    }

}
