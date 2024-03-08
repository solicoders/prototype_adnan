<?php



namespace App\repositories\CompetenceRepository;
use App\Models\Module\Module;
use App\Models\Competence\Competence;
use App\repositories\BaseRepository\BaseRepository;



 class CompetenceRepository extends BaseRepository
{

    public function __construct(Competence $Compentence){
        parent::__construct($Compentence);

    }



    public function getCompetences($query)
    {
        return Competence::with('ModuleRelation')
            ->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                             ->orWhereHas('ModuleRelation', function($moduleQuery) use ($query) {
                                 $moduleQuery->where('Name', 'like', '%' . $query . '%');
                             });
            })->paginate(5); 
    }


 

public function getAllCompetences(){
   return Module::all();

}



public function find($id){

     $competence = Competence::findOrFail($id);
     return $competence;
}
















}



























