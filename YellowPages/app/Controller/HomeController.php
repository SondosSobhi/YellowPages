<?php
if(!isset($_SESSION))
{session_start();}
require_once ('/BaseController.php');

class HomeController extends BaseController
{
    //function to get all company then display them
        public function mainAction($name){
            require_once ('/../Model/DisplayCompanyModel.php');

            $comp = new DisplayCompanyModel();
            $company = $comp->getCompany();
            $i = 0;
            while($i < $comp->CompNum){
                $CompName[] = $company[$i]['Company_Name'];
                $CompPhone[] = $company[$i]['Company_PhoneNum'];
                $CompCity[] = $company[$i]['Company_City'];
                $CompArea[] = $company[$i]['Company_Area'];
                $CompId[] = $company[$i]['Company_Id'];
                $i++;
            }
            $this->data['CompanyId'] = $CompId;
            $this->data['CompNum'] = $comp->CompNum;
            $this->data['CompName'] = $CompName;
            $this->data['CompPhone'] = $CompPhone;
            $this->data['CompCity'] = $CompCity;
            $this->data['CompArea'] = $CompArea;
            $comp->CompID = $CompId;
            $CompanyId = $comp->CompID;

            //to get all categories that related with every company
            $m = 0;
            while ($m < $comp->CompNum){
                $Category[$m] = $comp->getCompanyCategoryID($CompanyId[$m]);
                $Cat_Len[$m] = count($Category[$m]);
                    for($s = 0; $s < $Cat_Len[$m]; $s++){
                        $categ[$m][$s] = $Category[$m][$s]['Categ_Id'];
                        $categoryName[$m][$s] = $comp->getCompanyCategoryName($categ[$m][$s]);
                    }
                $CategLength[$m] = $Cat_Len[$m];
                unset($Cat_Len);
                $m++;
            }
            $this->data['CompanyCategory'] = $categoryName;
            $this->data['CategLen'] = $CategLength;
            $this->homeView($name);
        }

        public function selectAjaxAction($name){
            require_once ('/../Model/UpdateAndDeleteCompanyModelpanyModel.php');
            $this->homeView($name);
        }

        public function updateAction($name){
            require_once ('/../Model/UpdateAndDeleteCompanyModel.php');
            require_once ('/../Model/AddCompanyModel.php');
            //to get name and phone of company
            if(isset($_GET['compId'])) {
                $comp = new UpdateAndDeleteCompanyModel();
                $this->data['Company'] = $comp->GetCompany($_GET['compId']);
                $comp->CompId = $_GET['compId'];

                $company = new AddCompanyModel();

                //to display all categories
                $i = 0;
                $result = $company->getAllCAtegory();
                foreach ($result as $category) {
                    $this->data['CategoryId'][$i] = $result[$i]['Category_Id'];
                    $this->data['CategoryName'][$i] = $result[$i]['Category_Name'];
                    $i++;
                }

                //to display all cities and areas
                //to get all cities
                $y = 0;
                $result = $company->getCity();
                foreach ($result as $city) {
                    $this->data['CityId'][$y] = $result[$y]['City_Id'];
                    $this->data['CityName'][$y] = $result[$y]['City_Name'];
                    $y++;
                }

                if (isset($_POST['update'])) {
                    $comp->updateCompany($_GET['compId'], $_POST['Cname'], $_POST['Cphone'], $_POST['city'], $_POST['area']);
                    $comp->deleteCategoriesToCompany($_GET['compId']);
                    $category = $_POST['categ'];
                    foreach ($category as $category) {
                        $company->addCategoriesToCompany($category, $_GET['compId']);
                    }
                    var_dump($_SESSION['userId']);
                    header('Location: /home/main/?id=' . $_SESSION['userId']);
                }
            }else{
                header('Location: /home/main');
            }
            $this->homeView($name);
        }

        public function deleteAction($name){
            require_once ('/../Model/UpdateAndDeleteCompanyModel.php');

            $comp = new UpdateAndDeleteCompanyModel();
            $comp->deleteCompanyImg($_GET['compId']);
            $comp->deleteCategoriesToCompany($_GET['compId']);
            $comp->deleteCompany($_GET['compId']);
            $this->homeView($name);
        }
}