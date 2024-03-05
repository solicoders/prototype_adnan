<?php


namespace App\Http\Controllers\Modules;


use Illuminate\Http\Request;
use App\Models\Module\Module;
use App\Http\Controllers\Controller;
use App\Repositories\CompetenceRepository\CompetenceRepository;


class ModulesController extends Controller
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
            return view('competences.taskTablePartial', compact('competences'));
        } else {
            $modules = Module::all();
            return view('competences.index', compact('competences', 'modules', 'query'));
        }
    }






}
