<?php

namespace App\Models\Competence;


use App\Models\Module\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description',  
        'module_id'
    ];


    public static $rules = [
        'title' => 'required|unique:competences,title',
        'description' => 'nullable|string|max:1000',
        'module_id' => 'required|integer',
    ];
    
    public function ModuleRelation()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
    
}
