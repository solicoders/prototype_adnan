<?php



namespace App\repositories\StagiaireRepository;
use App\Models\User\User;
use App\repositories\BaseRepository\BaseRepository;


 class StagiaireRepository extends BaseRepository
{

    public function __construct(User $User){
        parent::__construct($User);

    }




    public function getUser($query){
        return User::with('ModuleRelation')
             ->where(function($queryBuilder) use ($query) {
                 $queryBuilder->where('name', 'like', '%' . $query . '%');
             })->paginate(1); 
    }
    



    public function find($id){

        $module = User::findOrFail($id);
        return $module;
   }



}



















