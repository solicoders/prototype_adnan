<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'start_date', 'end_date'];
    public static $rules = [

        'name' => 'required|unique:projects,name',
        'description' => 'nullable|string|max:1000',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        
    ];

  
    

}
