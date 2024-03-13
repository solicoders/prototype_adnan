<?php



namespace App\repositories\StagiaireRepository;
use App\Models\User;
use App\repositories\BaseRepository\BaseRepository;


 class StagiaireRepository extends BaseRepository
{

    public function __construct(User $User){
        parent::__construct($User);

    }




    public function getStagiaires($query){
        return User::where(function($queryBuilder) use ($query) {
                 $queryBuilder->where('name', 'like', '%' . $query . '%');
             })->paginate(10); 
    }
    



    public function find($id){

        $module = User::findOrFail($id);
        return $module;
   }



}



















