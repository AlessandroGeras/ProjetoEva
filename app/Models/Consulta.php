<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [        
        'consulta',   
        'profissional',   
        'date',  
    ];  

    public function user(){
        return $this->belongsTo(User::class);
    }
}
