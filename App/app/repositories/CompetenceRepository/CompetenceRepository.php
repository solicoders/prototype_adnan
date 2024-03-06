<?php



namespace App\repositories\CompetenceRepository;
use App\repositories\BaseRepository\BaseRepository;
use App\Models\Competence\Competence;



 class CompetenceRepository extends BaseRepository
{

    public function __construct(Competence $Compentence){
        parent::__construct($Compentence);

    }



    public function getCompetences($query){
       return $competences = Competence::with('ModuleRelation')
            ->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                             ->orWhereHas('ModuleRelation', function($moduleQuery) use ($query) {
                                 $moduleQuery->where('Name', 'like', '%' . $query . '%');
                             });
            })->paginate(1); 

    }


















}



























