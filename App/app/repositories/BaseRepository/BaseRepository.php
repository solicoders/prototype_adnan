<?php

namespace App\repositories\BaseRepository;

use Illuminate\Database\Eloquent\Model;


abstract class BaseRepository {
    protected $model;

    public function __construct(Model $Model){
        $this->model = $Model;
    }


    public function create(array $validatedata){
        return $this->model->create($validatedata);
      }
    
      public function update($validatedata, $id){
        $findItem = $this->model->find($id);
         $findItem->update($validatedata);
         return $findItem;
      }
    
      public function paginatedData($perpage){
         return $this->model->paginate($perpage);
      }
       
      public function destroy($id){
        $toDelete = $this->model->find($id);
        return $toDelete->delete();
    }


}

  

