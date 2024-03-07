<?php

namespace App\Http\Controllers\Stagiaires;

use App\Models\User\User;
use Illuminate\Http\Request;
// use App\Exports\MemberExport;
// use App\Imports\MemberImport;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use App\repositories\StagiaireRepository\StagiaireRepository;


class StagiaireController extends controller
{

    
    private $userRepository;
    //

    public function __construct(StagiaireRepository $UserRepository)
    {
        $this->userRepository = $UserRepository;
    }


// ========= index ============
    public function index(Request $request)
    {
        
            $query = $request->input('query');
            $stagiaire = $this->userRepository->getUser($query);
        
            if ($request->ajax()) {
                return view('stagiaire.stagiaireTablePartial')->with('stagiaire', $stagiaire);
            } 
            return view('stagiaire.index')->with('stagiaire', $stagiaire);
      
    }



// ========= create ============

public function create()
{
    
    return view('stagiaire.create');
  
}

// ========= store ============


    public function store(Request $request): RedirectResponse
    {
   
        $request->validate([
            'name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => "member", // Set the role column to 'member'
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('member');
        $user->givePermissionTo('index-TasksController', 'index-ProjectController', 'show-ProjectController', 'show-TasksController');
    
        // Return a redirect response with a success message and the name of the user added
        return redirect()->route('stagiaire.index')->with('success', 'Utilisateur ajouté avec succès');
 
    }
    
    


// ========= destroy ============

    public function destroy($id)
{
    User::find($id)->delete();
    return redirect()->route('stagiaire.index')->with('success', 'ce membre deleted successfully');
} 


// ========= show ============
public function show($id){

    $stagiaire = User::find($id); 
    if($stagiaire) {

        return view('stagiaire.view', compact('stagiaire'));
    } else {
        abort(404);
    }
  

}
// ========= export ============

// public function export() 
// {
//    return Excel::download(new MemberExport, 'Member.xlsx');
// }


// ========= import ============

// public function import(Request $request)
// {


//     $request->validate([
//         'stagiaire' => 'required|mimes:xlsx,xls',
//     ]);

//     $import = new MemberImport;
//     try {
//         $importedRows = Excel::import($import, $request->file('stagiaire'));
    
//         if($importedRows) {
      
//             $successMessage = 'Fichier importé avec succès.';
//         } else {
//             $successMessage = 'Pas de nouvelles données à importer.';
//         }

//         return redirect('/stagiaire')->with('success', $successMessage);
//     } catch (\Exception $e) {
//         return redirect('/stagiaire')->with('error', 'une erreur a été acourd vérifier la syntaxe');
       
//         // return redirect('/stagiaire')->with('error', $e->getMessage());
//     }

// }


}
