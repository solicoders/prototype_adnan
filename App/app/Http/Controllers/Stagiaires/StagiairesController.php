<?php

namespace App\Http\Controllers\Stagiaires;

use App\Models\User;
use App\Exports\UserExport;
// use App\Exports\MemberExport;
// use App\Imports\MemberImport;
use Illuminate\Http\Request;
use App\Exports\StagiaireExport;
use App\Imports\StagiaireImport;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use App\repositories\StagiaireRepository\StagiaireRepository;


class StagiairesController extends controller
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
            $stagiaires = $this->userRepository->getStagiaires($query);
        
            if ($request->ajax()) {
                return view('stagiaires.stagiairesTablePartial')->with('stagiaires', $stagiaires);
            } 
            return view('stagiaires.index')->with('stagiaires', $stagiaires);
      
    }



// ========= create ============

public function create()
{
    
    return view('stagiaires.create');
  
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
        // $user->assignRole('member');
        // $user->givePermissionTo('index-TasksController', 'index-ProjectController', 'show-ProjectController', 'show-TasksController');
    
        // Return a redirect response with a success message and the name of the user added
        return redirect()->route('stagiaires.index')->with('success', 'Utilisateur ajouté avec succès');
 
    }
    
    


// ========= destroy ============

    public function destroy($id)
{
    User::find($id)->delete();
    return redirect()->route('stagiaires.index')->with('success', 'ce membre deleted successfully');
} 


// ========= show ============
public function show($id){

    $stagiaire = User::find($id); 
    if($stagiaire) {

        return view('stagiaires.view', compact('stagiaire'));
    } else {
        abort(404);
    }
  

}

public function exportStagiaires() 
{
   return Excel::download(new StagiaireExport, 'User.xlsx');
}




public function importStagiaires(Request $request)
{


    $request->validate([
        'stagiaires' => 'required|mimes:xlsx,xls',
    ]);

    $import = new StagiaireImport;
    try {
        $importedRows = Excel::import($import, $request->file('stagiaires'));
    
        if($importedRows) {
      
            $successMessage = 'Fichier importé avec succès.';
        } else {
            $successMessage = 'Pas de nouvelles données à importer.';
        }

        return redirect('/stagiaires')->with('success', $successMessage);
    } catch (\Exception $e) {
        return redirect('/stagiaires')->with('error', 'une erreur a été acourd vérifier la syntaxe');
       
        // return redirect('/stagiaire')->with('error', $e->getMessage());
    }

}


}
