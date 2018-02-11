<?php
require_once ('/BaseModel.php');

class AddCategoryModel extends BaseModel
{
    public $name;

    public function addCategory(){
        $query = "insert into category(Category_Name) VALUES (:name)";
        $categ = $this->prepareQuery($query);
        $categ->bindParam(':name', $this->name);
        $this->executeQuery($categ);
    }

}