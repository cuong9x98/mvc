<?php 
    namespace MVC\Core;
    use MVC\Core\ResourceModelInterface;
    use MVC\Core\Model;
    use MVC\Config\Database;
    class ResourceModel implements ResourceModelInterface{

        protected $id;
        protected $model;
        protected $table;
        //function _khoi tao
        public function _init($table, $id, $model)
        {
            $this->id = $id;
            $this->model = $model;
            $this->table = $table;
        }
        // function save
        public function save($model){

            $arrModel= $model->getProperties();

            $placeholder=[];
            $insert_key=[];
            $placeUpdate=[];
            if ($model->getId()===null){
                // get name colunm and value colunm
                foreach ($arrModel as $key=>$value){
                    $insert_key[] =$key;
                    array_push($placeholder, ':'.$key);
    
                }
                //Convert array to string
                $strKeyIns= implode(', ',$insert_key);
                $strPlaceholder=implode(', ',$placeholder);
                
                //insert
                $sql_insert="INSERT INTO $this->table ({$strKeyIns}) VALUES ({$strPlaceholder})";
                $obj_insert =Database::getBdd()->prepare($sql_insert);
                return $obj_insert->execute($arrModel);
            }else{
                foreach ($arrModel as $k=>$item){
                    array_push($placeUpdate, $k.' = :'.$k);
                }
    
                //update
                $strPlaceUpdate=implode(', ',$placeUpdate);
                $sql_update="UPDATE {$this->table} SET $strPlaceUpdate WHERE id=:id";
                $obj_update=Database::getBdd()->prepare($sql_update);
                return $obj_update->execute($arrModel);
            }

        }
        
       public function edit($model){
        $arrModel= $model->getProperties();

        $placeholder=[];
        $insert_key=[];
        $placeUpdate=[];

        foreach ($arrModel as $key=>$value){
            $insert_key[] =$key;
            array_push($placeholder, ':'.$key);

        }
        //Convert array to string
        $strKeyIns= implode(', ',$insert_key);
        $strPlaceholder=implode(', ',$placeholder);
        foreach ($arrModel as $k=>$item){
            array_push($placeUpdate, $k.' = :'.$k);
        }
        //update
        $strPlaceUpdate=implode(', ',$placeUpdate);
        $sql_update="UPDATE {$this->table} SET $strPlaceUpdate WHERE id=:id";
        $obj_update=Database::getBdd()->prepare($sql_update);
        return $obj_update->execute($arrModel);

       }

        //function delete data with $sql_delete is query sql and prepare is check name table and id, getBdd connect db,execute run query
        public function delete($id){
            $sql_delete = "DELETE FROM $this->table WHERE id=$id";
            $obj_delete = Database::getBdd()->prepare($sql_delete);

            return $obj_delete->execute();
        }
        public function getAll()
        {
            $sql_select = "SELECT * FROM $this->table";
            $obj_select = Database::getBdd()->prepare($sql_select);
            $obj_select->execute();
            return $obj_select->fetchAll();
        }
        public function find($id)
        {
            $sql_find = "SELECT * FROM $this->table WHERE id = $id";
            $obj_find = Database::getBdd()->prepare($sql_find);
    
            $obj_find->execute();
            return $obj_find->fetch();
        }
    }

?>
    