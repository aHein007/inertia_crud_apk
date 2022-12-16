<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIndex extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'email',
        'password'
    ];


    public function scopesearchFilter($query ,$filter){//this method is so important
    return $query->when($filter ?? "",function($query, $search){
            $query->where('name','like',"%".$search."%")
                  ->orwhere('email','like',"%".$search."%");
        });
    }
}
