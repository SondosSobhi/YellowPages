<?php
require_once ('/BaseModel.php');

class DisplayCompanyModel extends BaseModel
{
        public $CompNum;
        public $CompID;
        public $categnum;

        public function getCompany(){
            $query = "Select * from company  ORDER BY Company_Id";
            $comp = $this->prepareQuery($query);
            $this->executeQuery($comp);
            $result = $comp->fetchAll();
            $this->CompNum = $comp->rowCount();
            return $result;
        }

        public function getCompanyCategoryID($comp_id){
            $query = "SELECT Categ_Id FROM company_categories WHERE Comp_Id = :companyId ORDER BY Categ_Comp_Id";
            $categ = $this->prepareQuery($query);
            $categ->bindParam(':companyId', $comp_id);
            $this->executeQuery($categ);
            $result = $categ->fetchAll();
            $this->categnum = $categ->rowCount();

            return $result;
        }

        public function getCompanyCategoryName($categID){
            $query = "Select Category_Name from category where Category_Id = :id ORDER BY Category_Id";
            $Category = $this->prepareQuery($query);
            $Category->bindParam(':id', $categID);
            $this->executeQuery($Category);
            $result = $Category->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
}