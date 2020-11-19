<?php
namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\Task;
use MVC\Models\TaskModel;
use MVC\Models\TaskReponsitory;
class TasksController extends Controller
{
    //function show all data task in screen
    function index()
    {
        // goi lop taskReponsitory va goi ham getAll
        $taskAll = new TaskReponsitory();
        $d['tasks'] = $taskAll->getAll();
        $this->set($d);
        $this->render("index");
    }
    //funcition create new data task
    function create()
    {
        if (isset($_POST["title"])) {
            $taskSave = new TaskReponsitory();
            $task = new TaskModel();
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);
            $task->setCreate_at(date("Y-m-d H:i:s"));
            if ($taskSave->save($task)){
                echo '<script type="text/javascript">alert("Add record to successful");</script>';
            }
        }

        $this->render("create");
    }
    // function update data
    function edit($id)
    {
        $taskR= new TaskReponsitory();
        $d["task"] = $taskR->find($id);
        if (isset($_POST["title"])) {
            $task=new TaskModel();
            $task->setId($id);
            $task->setTitle($_POST['title']);
            $task->setDescription($_POST['description']);
            $task->setUpdate_at(date("Y-m-d H:i:s"));
            $task->setCreate_at($task->setCreate_at($id));
            if ($taskR->save($task)) {
                header("Location: " . WEBROOT . "tasks/edit/");
            }
        }
        $this->set($d);
        $this->render("edit");
    }
    //function delete data
    function delete($id)
    {
        $task = new TaskReponsitory();
        if ($task->delete($id)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
