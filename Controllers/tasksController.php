<?php
namespace MVC\Controllers;
use MVC\Core\Controller;
use MVC\Models\Task;
use MVC\Models\TaskModel;
use MVC\Models\TaskReponsitory;
class TasksController extends Controller
{
    function index()
    {
        // goi lop taskReponsitory va goi ham getAll
        $taskAll = new TaskReponsitory();
        $d['tasks'] = $taskAll->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            // require(ROOT . 'Models/Task.php');
            
            $taskSave = new TaskReponsitory();
            $task = new TaskModel();
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);
            $task->setCreate_at(date("Y-m-d H:i:s"));
           
            if ($taskSave->save($task))
            {
                
                // header("Location: " . WEBROOT . "Tasks/create");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $taskR= new TaskReponsitory();
        $d["task"] = $taskR->find($id);
        if (isset($_POST["title"]))
        {
            $taskM=new TaskModel();
            $taskM->setId($id);
            $taskM->setTitle($_POST['title']);
            $taskM->setDescription($_POST['description']);
            $taskM->setUpdate_at(date("Y-m-d H:i:s"));

            $taskR= new TaskReponsitory();

            if ($taskR->edit($taskM)){

               
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task = new TaskReponsitory();
        if ($task->delete($id))
        {
            
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>