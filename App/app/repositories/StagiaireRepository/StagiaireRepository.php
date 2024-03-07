<?php



namespace App\repositories\StagiaireRepository;
use App\Models\User\User;
use App\repositories\BaseRepository\BaseRepository;


 class StagiaireRepository extends BaseRepository
{

    public function __construct(User $User){
        parent::__construct($User);

    }




    public function paginatedData($perpage, $query = null){
        if ($query) {
            return $this->model->where('name', 'like', '%' . $query . '%')->paginate($perpage);
        } else {
            return $this->model->paginate($perpage);
        }
    }
    



    public function find($id){

        $module = User::findOrFail($id);
        return $module;
   }










}



















