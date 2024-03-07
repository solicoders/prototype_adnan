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


class UserController extends controller
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
            $members = $this->userRepository->getUser($query);
        
            if ($request->ajax()) {
                return view('members.membersTablePartial')->with('members', $members);
            } 
            return view('members.index')->with('members', $members);
      
    }



// ========= create ============

public function create()
{
    
    return view('members.create');
  
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
        return redirect()->route('members.index')->with('success', 'Utilisateur ajouté avec succès');
 
    }
    
    


// ========= destroy ============

    public function destroy($id)
{
    User::find($id)->delete();
    return redirect()->route('members.index')->with('success', 'ce membre deleted successfully');
} 


// ========= show ============
public function show($id){

    $member = User::find($id); 
    if($member) {

        return view('members.view', compact('member'));
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
//         'members' => 'required|mimes:xlsx,xls',
//     ]);

//     $import = new MemberImport;
//     try {
//         $importedRows = Excel::import($import, $request->file('members'));
    
//         if($importedRows) {
      
//             $successMessage = 'Fichier importé avec succès.';
//         } else {
//             $successMessage = 'Pas de nouvelles données à importer.';
//         }

//         return redirect('/members')->with('success', $successMessage);
//     } catch (\Exception $e) {
//         return redirect('/members')->with('error', 'une erreur a été acourd vérifier la syntaxe');
       
//         // return redirect('/members')->with('error', $e->getMessage());
//     }

// }


}
