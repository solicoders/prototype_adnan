<?php

namespace App\repositories\BaseRepository;

use Illuminate\Database\Eloquent\Model;


abstract class BaseRepository {
    protected $model;

    public function __construct(Model $Model){
        $this->model = $Model;
    }


    public function store(array $validatedata){
        return $this->model->create($validatedata);
      }
    
      public function update($validatedata, $id){
        $findItem = $this->model->find($id);
        return $findItem->update($validatedata);
      }
    
      public function paginatedData($perpage){
         return $this->model->paginate($perpage);
      }
       
      public function destroy($id){
        $toDelete = $this->model->find($id);
        return $toDelete->delete();
    }


}

  

