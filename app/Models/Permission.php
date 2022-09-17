<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Model
{
    use HasFactory;
    use HasRoles;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [        
        'permission',        
    ];  

    public function users(){
        return $this->hasMany(User::class);
    }
}
