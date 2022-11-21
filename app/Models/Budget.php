<?php

namespace App\Models;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    protected $fillable=['libelle','dateDeb','dateFin','user_id','etat'];

    public function utilisateur(){

        return $this->belongsTo(Utilisateur::class,'user_id');
    }
}
