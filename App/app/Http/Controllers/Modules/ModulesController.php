<?php


namespace App\Http\Controllers\Modules;


use Illuminate\Http\Request;
use App\Exports\ModuleExport;
use App\Imports\ModuleImport;
use App\Models\Module\Module;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\createModuleRequest;
use App\Repositories\ModuleRepository\ModuleRepository;



class ModulesController extends Controller
{
    
    protected $moduleRepository;

    public function __construct(ModuleRepository $ModuleRepository)
    {
        $this->moduleRepository = $ModuleRepository;
    }



    public function index(Request $request)
{
    $query = $request->input('query');
    $modules = $this->moduleRepository->get_Allmodules(10, $query); // Assuming 10 items per page
    
    if ($request->ajax()) {
        return view('modules.moduleTablePartial')->with('modules', $modules);
    } 
    return view('modules.index')->with('modules', $modules);
}




//  =========== Create Function ====
public function create()
{
    return view('modules.create');
}


// ===== store ==========
public function store(createModuleRequest $request)
{
   $input = $request->all();
   $this->moduleRepository->create($input);
   return redirect()->route('modules.index')->with('success', 'module ajouté avec succèss');
}




// ======= edit modules ==========

public function edit($id){
   $module = Module::findOrFail($id);
       return view('modules.update', compact('module')); 
}




// ======= update modules ==========
public function update(Request $request, $id)
{

 $competence = $this->moduleRepository->find($id);
  if (!$competence) {
    return redirect()->route('modules.index')->with('error', 'Tâche introuvable');
}
  $request->validate([
      'name' => 'required|unique:modules,name,' . $id,
      'description' => 'nullable|string|max:1000',
      'start_date' => 'required|date',
      'end_date' => 'required|date|after:start_date',
  ]);

  $validatedData = $request->all();
  $this->moduleRepository->update($validatedData, $id);


  return redirect()->route('modules.index')->with('success', 'module mis à jour avec succès');
}





public function show($id){

    $module = $this->moduleRepository->find($id);

   return view('modules.view', compact('module'));
}


// ========== destroy ========
public function destroy($id)
{
$this->moduleRepository->find($id)->destroy($id);
return redirect()->route('modules.index')->with('success', 'module supprimé avec succès');
}




public function exportModules() 
{

    return Excel::download(new ModuleExport, 'modules.xlsx');


}






public function importModules(Request $request)
{

    $request->validate([
        'modules' => 'required|mimes:xlsx,xls',
    ]);

    $import = new ModuleImport;

    try {
        $importedRows = Excel::import($import, $request->file('modules'));
    
        if($importedRows) {
            $successMessage = 'Fichier importé avec succès.';
        } else {
            $successMessage = 'Pas de nouvelles données à importer.';
        }

        return redirect('/modules')->with('success', $successMessage);
    } catch (\Exception $e) {
        return redirect('/modules')->with('error', 'une erreur a été commise, veuillez vérifier les données dublicate');
    }
}









}
