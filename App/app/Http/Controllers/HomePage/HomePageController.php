<?php 
 
namespace App\Http\Controllers\HomePage;

use App\Models\User;
use App\Models\Module\Module;
use App\Http\Controllers\Controller;
use App\Models\Competence\Competence;

class HomePageController extends Controller {



    public function __invoke(){

        $competences = Competence::count();
        


    

        $stagiaires = User::whereHas('roles', function ($query) {
            $query->where('name', 'formateur');
        })->count();

        $modules = Module::count();



        return view('home.index', compact('competences', 'stagiaires', 'modules'));

    }





}


