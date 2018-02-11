<?php
require_once ('/BaseModel.php');

class UpdateAndDeleteCompanyModel extends BaseModel
{
        public $CompId;

        public function GetCompany($CompId){
            $query = "SELECT Company_Name, Company_PhoneNum FROM company WHERE Company_Id = :id";
            $comp = $this->prepareQuery($query);
            $comp->bindParam(':id', $CompId);
            $this->executeQuery($comp);
            $result = $comp->fetch(PDO::FETCH_ASSOC);
            return $result;
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

        public function updateCompany($id, $name, $phoneNumber, $CityId, $Area_id){
            $City = $this->GetCityName($CityId);
            $area = $this->GetAreaName($Area_id);
            $query = "UPDATE company SET Company_Name = :name, Company_PhoneNum = :phoneNum, Company_City = :city, Company_Area = :area WHERE Company_Id = :id ";
            $Comp = $this->prepareQuery($query);
            $Comp->bindParam(':id', $id);
            $Comp->bindParam(':name', $name);
            $Comp->bindParam(':phoneNum', $phoneNumber);
            $Comp->bindParam(':city', $City);
            $Comp->bindParam(':area', $area);
            $this->executeQuery($Comp);

        }

        public function deleteCategoriesToCompany($comp_id){
            $query = "delete from company_categories WHERE Comp_Id = :id ";
            $row = $this->prepareQuery($query);
            $row->bindParam(':id', $comp_id);
            $this->executeQuery($row);
        }

        public function deleteCompanyImg($comp_id){
            $query = "delete from company_images where Comp_Id = :id ";
            $row = $this->prepareQuery($query);
            $row->bindParam(':id', $comp_id);
            $this->executeQuery($row);
        }

        public function deleteCompany($comp_id){
            $query = "delete from company where Company_Id = :id ";
            $row = $this->prepareQuery($query);
            $row->bindParam(':id', $comp_id);
            $this->executeQuery($row);
        }
}