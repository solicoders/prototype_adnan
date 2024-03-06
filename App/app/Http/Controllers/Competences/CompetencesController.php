<?php


namespace App\Http\Controllers\Competences;


use Illuminate\Http\Request;
use App\Models\Module\Module;
use App\Http\Controllers\Controller;
use App\Models\Competence\Competence;
use App\Http\Requests\createCompetencesRequest;
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
            return view('competences.competencesTablePartial', compact('competences'));
        } else {
            $modules = Module::all();
            return view('competences.index', compact('competences', 'modules', 'ModuleName'));       
        }
    }
    



  // ======= create =========
  public function create(Request $request)
  {

          $modules = Module::all();
          return view('competences.create', ['modules' => $modules]);

  }

  // ======= store =========

//   public function store(createCompetencesRequest $request)
//   {
//       $input = $request->all();
//       $this->competenceRepository->create($input);
//       return redirect()->route('competences.index')->with('success', 'produit ajouté avec succès');
//   }




  // ======= edit =========

  public function edit($id){
      $modules = Module::all();
      $competence = Competence::find($id);
      // ===================== i used belongsto Competences belong to Module to here  =========
      $selectedModule = $competence->ModuleRelation;
      return view('Competences.update', compact('competence', 'selectedModule', 'modules'));
   }

  // ======= update =========

  public function update(Request $request, $id)
  {
  
      $task = Competence::find($id);
      if (!$task) {
          return redirect()->route('Competences.index')->with('error', 'tâche introuvable');
      }

      $request->validate([
          'title' => 'required|unique:competences,title,' . $id,
          'description' => 'nullable|string|max:1000',
          'module_id' => 'required|integer',
         
      ]);

      $input = $request->all();
      $task->update($input);
      return redirect()->route('competences.index')->with('success', 'tâche mise à jour avec succès');
  }


  // ======= show =========
  public function show($id){
      $Competence = Competence::find($id);
      if($Competence){
          // ============== relation belongsto ===============
          $moduleName = $Competence->ModuleRelation->Name;
          return view('Competences.view', compact('moduleName', 'Competence'));
      }else {
          return abort(404);
      }
  }
  


  // ======= destroy =========

  public function destroy($id)
{
  Competence::find($id)->delete();
  return redirect()->route('competences.index')->with('success', 'tâche supprimée avec succès');

}






}
