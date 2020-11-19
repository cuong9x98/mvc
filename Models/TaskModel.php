<?php 
    namespace MVC\Models;
    use MVC\Core\Model;

class TaskModel extends Model
{
    // Khai bao protected de lop con co the dung bien lop cha
    protected $title;
    protected $description;
    protected $id;
    protected $updated_at;
    protected $created_at;
    
    //Get set Id
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    //Get set Title
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    //Get set description
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    //Get set Create
    public function getCreate_at()
    {
        return $this->created_at;
    }
    public function setCreate_at($created_at)
    {
        $this->created_at=$created_at;
    }
    //Get set Update
    public function getUpdate_at()
    {
        return $this->updated_at;
    }
    public function setUpdate_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}