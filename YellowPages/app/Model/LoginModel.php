<?php
    require_once ('/BaseModel.php');

class LoginModel extends BaseModel
{
    public $email;
    public $password;

    public function checkUser(){
        $query = "Select User_Id from user where Email = :email and Password = :pass";
        $user = $this->prepareQuery($query);
        $user->bindParam(':email', $this->email);
        $user->bindParam(':pass', $this->password);
        $this->executeQuery($user);
        $result = $user->fetch(pdo::FETCH_ASSOC);
        if($result){
            header('Location: /home/main/?id=' . $result['User_Id']);
        }else{
            echo "
                <script>
                    alert(\"the username or pass isnot correct or there isnot user with this data, please try again\");
                </script>
            ";
        }
    }
}