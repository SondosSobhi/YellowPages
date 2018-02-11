<?php
    require_once ('/BaseController.php');

class IndexController extends BaseController {
        public function defaultAction($name){
            $this->indexView($name);
        }

        public function addCategoryAction($name){
            require_once ('/../Model/AddCategoryModel.php');

            $cat = new AddCategoryModel();
            if(isset($_POST['submit'])){
                $cat->name = @$_POST['CategName'];
                $cat->addCategory();
                header('Refresh:0');
            }
            $this->indexView($name);
        }

        public function loginAction($name){
            require_once ('/../Model/LoginModel.php');

            $emp = new LoginModel();
            if(isset($_POST['submit'])){
                $emp->email = @$_POST['Email'];
                $emp->password = @$_POST['Password'];
                $emp->checkUser();
            }
            $this->indexView($name);
        }
        public function addCompanyAction($name){
            require_once ('/../Model/AddCompanyModel.php');

            $comp = new addCompanyModel();

            //to get all cities
            $i=0;
            $result = $comp->getCity();
            foreach ($result as $city){
                $this->data['CityId'][$i] = $result[$i]['City_Id'];
                $this->data['CityName'][$i] = $result[$i]['City_Name'];
                $i++;
            }

            //to add some data about company
            if(isset($_POST['next'])){
                $comp->addCompany($_POST['Cname'], $_POST['Cphone'], $_POST['city'], $_POST['area']);

                header('Location: addCompanyContinue');
            }
            $this->indexView($name);
        }

        public function selectAjaxAction($name){
            require_once ('/../Model/AddCompanyModel.php');
            $this->indexView($name);
        }


        public function addCompanyContinueAction($name){
            require_once ('/../Model/AddCompanyModel.php');

            $comp = new AddCompanyModel();

            //to display all categories in select tag in form
            $i=0;
            $result = $comp->getAllCAtegory();
            foreach ($result as $category){
                $this->data['CategoryId'][$i] = $result[$i]['Category_Id'];
                $this->data['CategoryName'][$i] = $result[$i]['Category_Name'];
                $i++;
            }

            //saving categories of company
            if(isset($_POST['save'])){
                //insert categories part
                $category = @$_POST['categ'];
                foreach ($category as $category){
                    $comp->addCategoriesToCompany($category, $comp->selectLastCompany());
                }

                //insert img part
                if($_FILES['files']){
                    $c=0;
                    foreach ($_FILES['files']['tmp_name'] as $key => $value){
                        $file_name = $_FILES['files']['name'];
                        $file_image = addslashes(file_get_contents($_FILES['files']['tmp_name'][$c]));
                        $comp->addCompanyImgs($file_name[$c], $file_image[$c]);
                        $c++;

                    }
                }
            }

            $this->indexView($name);
        }
}
?>