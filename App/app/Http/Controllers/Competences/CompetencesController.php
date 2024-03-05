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
        $query = $request->input('query');
        $competences = $this->competenceRepository->searchCompetences($query);

        if ($request->ajax()) {
            return view('competences.competencesTablePartial', compact('competences'));
        } else {
            $modules = Module::all();
            return view('competences.index', compact('competences', 'modules', 'query'));
        }
    }

    // public function index(){

    //     dd('app');
    //     return view('competences.index');
    // }

  // ======= create =========
  public function create(Request $request)
  {

          $competences = Module::all();
          return view('competences.create', ['competences' => $competences]);

  }

  // ======= store =========

  public function store(createCompetencesRequest $request)
  {
      $input = $request->all();
      $this->competenceRepository->create($input);
      return redirect()->route('competences.index')->with('success', 'produit ajouté avec succès');
  }




  // ======= edit =========

  public function edit($id){
      $Modules = Module::all();
      $Competence = Competence::find($id);
      // ===================== i used belongsto Competences belong to Module to here  =========
      $selectedModule = $Competence->Module;
      return view('Competences.update', compact('Competence', 'selectedModule', 'Modules'));
   }

  // ======= update =========

  public function update(Request $request, $id)
  {
  
      $task = Competence::find($id);
      if (!$task) {
          return redirect()->route('Competences.index')->with('error', 'tâche introuvable');
      }
      // dd($request);

      $request->validate([
          'title' => 'required|unique:tasks,title,' . $id,
          'description' => 'nullable|string|max:1000',
          'module_id' => 'required|integer',
         
      ]);

      $input = $request->all();
      $task->update($input);
      return redirect()->route('tasks.index')->with('success', 'tâche mise à jour avec succès');
  }


  // ======= show =========
  public function show($id){
      $Competence = Competence::find($id);
      if($Competence){
          // ============== relation belongsto ===============
          $moduleName = $Competence->module->Name;
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
