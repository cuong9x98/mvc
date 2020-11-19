<?php 
namespace MVC\Models;
use MVC\Models\TaskResoucreModel;
    class TaskReponsitory extends TaskResoucreModel{
    // function add
    public function add($model)
    {
        return parent::save($model);
    }
    // function delete
    public function delete($id)
    {
        return parent::delete($id);
    }
    // function index
    public function getAll()
    {
        return parent::getAll();
    }
    //function update
    public function edit($model){
        return parent::save($model);
    }
        
    }
