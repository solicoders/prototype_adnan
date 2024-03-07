<?php



namespace App\repositories\ModuleRepository;
use App\Models\Module\Module;
use App\repositories\BaseRepository\BaseRepository;



 class ModuleRepository extends BaseRepository
{

    public function __construct(Module $Module){
        parent::__construct($Module);

    }




    public function paginatedData($perpage, $query = null){
        if ($query) {
            return $this->model->where('Name', 'like', '%' . $query . '%')->paginate($perpage);
        } else {
            return $this->model->paginate($perpage);
        }
    }
    



    public function find($id){

        $module = Module::findOrFail($id);
        return $module;
   }










}

















