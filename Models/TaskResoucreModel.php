<?php 
    namespace MVC\Models;
    use MVC\Core\Model;
    use MVC\Core\ResourceModel;
    class TaskResoucreModel extends ResourceModel
    {   
        // function xac dinh table ,model,id
        function __construct()
        {
            $task =new TaskModel();
            parent::_init('tasks', 'id', $task );
        }
    }
?>