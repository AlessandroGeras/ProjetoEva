<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [        
        'role',        
    ];  

    public function users(){
        return $this->hasMany(User::class);
    }
}
