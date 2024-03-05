<?php



namespace App\repositories\CompetenceRepository;
use App\repositories\BaseRepository\BaseRepository;
use App\Models\Competence\Competence;



 class CompetenceRepository extends BaseRepository
{

    public function __construct(Competence $Compentence){
        parent::__construct($Compentence);

    }


    public function searchCompetences($query, $perPage = 2)
    {



        return Competence::with('ModuleRelation')
            ->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('Title', 'like', '%' . $query . '%')
                             ->orWhereHas('ModuleRelation', function($projectQuery) use ($query) {
                                 $projectQuery->where('Name', 'like', '%' . $query . '%');
                             });
            })
            ->paginate($perPage);
    }



    

}


























