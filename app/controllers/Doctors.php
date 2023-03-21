<?php
require_once('/home/kean/work/semester_6/web_engineering/TP_web_auth_ver3/app/models/Doctor.php');

class Doctors extends Controller {

    public function __construct() {

        $this->UserModel = $this->loadModel("Doctor");
    }

    public function login() {
        // echo $_SERVER['REQUEST_METHOD'];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(isset($_POST['email'])&&isset($_POST['password'])){
                if ($this->UserModel->findDoctorByEmail($_POST['email'])){
                    $doctor=$this->UserModel->login($_POST['email'],$_POST['password']);
                    if($doctor){
                        $this->createDoctorSession($doctor);
                        header('Location: /');
                        die;
                    }
                    else {
                        header('Location: /doctors/login');
                        echo 'wrong password';
                        die;
                    }
                }else{
                    header('Location: /doctors/login');
                    echo 'email not found';
                    die;
                }
            }

        }else if($_SERVER['REQUEST_METHOD']==='GET')  {
            $this->render("login", []);
        }
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if( isset($_POST['name']) &&isset($_POST['gender']) &&isset($_POST['email']) && isset($_POST['password']) && isset($_POST['specialist']) ){
            
                $data = array(
                    'name' => $_POST['name'],
                    'gender' => $_POST['gender'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'specialist' => $_POST['specialist']
                );
                // var_dump($data);
                $result = $this->UserModel->create($data);
                
                if($result) {
                    header('Location: /');
                    die;
                }else {
                    echo "error";
                }
            }
        }
        else if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->render("register", []);
        } 
    }

    public function createDoctorSession($doctor){
        $_SESSION['doctor_id']=$doctor['id'];
        $_SESSION['doctor_name']=$doctor['name'];
        $_SESSION['doctor_email']=$doctor['email'];
        /**
         * TODO : direct('patient.php')
         */
    }
}

?>