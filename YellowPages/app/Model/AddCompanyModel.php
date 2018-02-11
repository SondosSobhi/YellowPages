<?php
require_once ('/BaseModel.php');

class AddCompanyModel extends BaseModel
{
    public $selectedCityId;
    public $areanum;
    public $img;

    public function getCity(){
        $query = "Select * from city";
        $city = $this->prepareQuery($query);
        $this->executeQuery($city);
        $result = $city->fetchAll();
        return $result;
    }

    public function getArea($id){
        $query = "Select * from area where Area_City_Id = :id";
        $area = $this->prepareQuery($query);
        $area->bindParam(':id', $id);
        $this->executeQuery($area);
        $result = $area->fetchAll();
        $this->areanum = $area->rowCount();
        return $result;
    }

    public function addCompany($name, $phoneNumber, $CityId, $Area_id){
        $City = $this->GetCityName($CityId);
        $area = $this->GetAreaName($Area_id);
        $query = "insert into company(Company_Name, Company_PhoneNum, Company_City, Company_Area) VALUES (:name, :phoneNum, :city, :area)";
        $Comp = $this->prepareQuery($query);
        $Comp->bindParam(':name', $name);
        $Comp->bindParam(':phoneNum', $phoneNumber);
        $Comp->bindParam(':city', $City);
        $Comp->bindParam(':area', $area);
        $this->executeQuery($Comp);

    }

    public function GetCityName($CityId){
        $query = "select City_Name from city where City_Id = :id";
        $city = $this->prepareQuery($query);
        $city->bindParam(':id',$CityId);
        $this->executeQuery($city);
        $result = $city->fetch(pdo::FETCH_ASSOC);
        return $result['City_Name'];
    }

    public function GetAreaName($AraeId){
        $query = "Select Area_Name from area WHERE Area_Id = :id";
        $area = $this->prepareQuery($query);
        $area->bindParam(':id', $AraeId);
        $this->executeQuery($area);
        $result = $area->fetch(pdo::FETCH_ASSOC);
        return $result['Area_Name'];
    }

    public function selectLastCompany(){
        $query = "select Company_Id FROM company ORDER BY Company_Id DESC LIMIT 1";
        $comp = $this->prepareQuery($query);
        $this->executeQuery($comp);
        $result = $comp->fetch();
        return $result['Company_Id'];
    }

    public function getAllCAtegory(){
        $query = "Select * from category";
        $category = $this->prepareQuery($query);
        $this->executeQuery($category);
        $result = $category->fetchAll();
        return $result;
    }

    public function addCategoriesToCompany($cat_id, $comp_id){
        $query = "insert into company_categories(Categ_Id, Comp_Id) VALUES (:CateroryID, :CompanyID)";
        $row = $this->prepareQuery($query);
        $row->bindParam(':CateroryID', $cat_id);
        $row->bindParam(':CompanyID', $comp_id);
        $this->executeQuery($row);
    }

    public function addCompanyImgs($imgName, $img){
        $query = "Insert into company_images (Comp_Id, Image_name ,Image) VALUES (:compId, :imgName, :img)";
        $image = $this->prepareQuery($query);
        $CompanyId = $this->selectLastCompany();
        $image->bindParam(':compId', $CompanyId);
        $image->bindParam(':imgName', $imgName);
        $image->bindParam(':img', $img);
        $this->executeQuery($image);
    }

//    public function GetCompanyImg(){
//        $query = "Select Image from company_images where Img_Comp_Id = 22 ";
//        $img = $this->prepareQuery($query);
//        $this->executeQuery($img);
//        $result = $img->fetch(pdo::FETCH_ASSOC);
//        return $result;
//    }
}