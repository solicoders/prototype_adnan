<?php


namespace App\Http\Controllers\Competences;


use Illuminate\Http\Request;
use App\Models\Module\Module;
use App\Exports\CompetenceExport;
use App\Imports\CompetenceImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Competence\Competence;
use App\Http\Requests\createCompetencesRequest;
use App\Http\Controllers\AppBaseController\AppBaseController;
use App\Repositories\CompetenceRepository\CompetenceRepository;




class CompetencesController extends Controller
{
    
    protected $competenceRepository;

    public function __construct(CompetenceRepository $CompetenceRepository)
    {
        $this->competenceRepository = $CompetenceRepository;
    }



    public function index(Request $request)
    {
        $ModuleName = $request->input('query');
        $query = $request->input('query');
    
        $competences = $this->competenceRepository->getCompetences($query);
    
        if ($request->ajax()) {
            return view('competences.competenceTablePartial', compact('competences'));
        } else {
            $modules = Module::all();
            return view('competences.index', compact('competences', 'modules', 'ModuleName'));       
        }
    }
    
    // public function index(Request $request)
    // {

    //     $ModuleName = $request->input('query');
    //     $query = $request->input('query');

    //     // ===================== i used belongsto tasks belong to project to here  =========
    //     $competences = Competence::with('ModuleRelation')
    //         ->where(function($queryBuilder) use ($query) {
    //             $queryBuilder->where('title', 'like', '%' . $query . '%')
    //                          ->orWhereHas('ModuleRelation', function($projectQuery) use ($query) {
    //                              $projectQuery->where('Name', 'like', '%' . $query . '%');
    //                          });
    //         })
    //         ->paginate(2); 
        

    //     if ($request->ajax()) {
    //         return view('competences.competenceTablePartial', compact('competences'));
    //     } else {
    //         $modules = Module::all();
    //         return view('competences.index', compact('competences', 'modules', 'ModuleName'));       
    //     }
    // }


  // ======= create =========
  public function create(Request $request)
  {
       $modules = $this->competenceRepository->getAllCompetences();
          return view('competences.create', ['modules' => $modules]);

  }



  public function store(createCompetencesRequest $request)
  {
      $input = $request->all();
      $this->competenceRepository->create($input);
      return redirect()->route('competences.index')->with('success', 'produit ajouté avec succès');
  }




  // ======= edit =========

  public function edit($id){


      $modules = $this->competenceRepository->getAllCompetences();
      $competence = $this->competenceRepository->find($id);
     

      // ===================== i used belongsto Competences belong to Module to here  =========
      $selectedModule = $competence->ModuleRelation;
      return view('Competences.update', compact('competence', 'selectedModule', 'modules'));

   }

  // ======= update =========

  public function update(Request $request, $id)
  {
      $competence = $this->competenceRepository->find($id);


      if (!$competence) {
          return redirect()->route('Competences.index')->with('error', 'Tâche introuvable');
      }
  
      $request->validate([
          'title' => 'required|unique:competences,title,' . $id,
          'description' => 'nullable|string|max:1000',
          'module_id' => 'required|integer',
      ]);
  
      $validatedData = $request->all();
      $this->competenceRepository->update($validatedData, $id);
      
      return redirect()->route('competences.index')->with('success', 'Tâche mise à jour avec succès');
  }
  


  // ======= show =========
  public function show($id){
      $competence = $this->competenceRepository->find($id);
      $moduleName = $competence->ModuleRelation->Name;
      return view('competences.view', compact('moduleName', 'competence'));
  }
  


  // ======= destroy =========

  public function destroy($id)
{

  $this->competenceRepository->find($id)->destroy($id);
  return redirect()->route('competences.index')->with('success', 'tâche supprimée avec succès');

}




public function exportCompetences(){
    return Excel::download(new CompetenceExport, 'competences.xlsx');
}




public function importCompetences(Request $request)
{
    $request->validate([
        'competences' => 'required|mimes:xlsx,xls',
    ]);

    $import = new CompetenceImport;

    try {
        $importedRows = Excel::import($import, $request->file('competences'));
    
        if($importedRows) {
            $successMessage = 'Fichier importé avec succès.';
        } else {
            $successMessage = 'Pas de nouvelles données à importer.';
        }

        return redirect('/competences')->with('success', $successMessage);
    } catch (\Exception $e) {
        // Handle the exception, e.g., log the error or display an error message.
        return redirect('/competences')->with('error', 'une erreur a été acourd vérifier la syntaxe');
    }
}


}
