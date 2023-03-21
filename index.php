<?php

// On génère une constante contenant le chemin vers la racine publique du projet
// define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// require_once('/home/kean/work/semester_6/web_engineering/TP_web_auth_ver3/app/config/config.php');
// // import the Controller and Database at root to let the child controller and child model can extend
// require_once(ROOT . 'app/libraries/Controller.php');
// require_once(ROOT . 'app/libraries/Database.php');

require_once('/home/kean/work/semester_6/web_engineering/TP_web_auth_ver3/bootstrap.php');


$url = $_SERVER['REQUEST_URI'];

$route = explode("?", $url);
echo "route: " . $route[0];
echo "<br>";

// Router
switch ($route[0]) {
    case '/':
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_SESSION['isLogout'])) {
                echo "Log out successfully !";
                unset($_SESSION['isLogout']);
            }
            if(isset($_SESSION['doctor_email'])){
                echo $_SESSION['doctor_email'];
                // echo 'tototiti';
            }
            require_once(ROOT . 'public/index.php');
        };
        break;

    case '/doctors/login':
        
        require_once(ROOT . 'app/controllers/Doctors.php');
        $doctorController = new Doctors();
        $doctorController->login();
        
        break;

    case '/doctors/register':
        require_once(ROOT . 'app/controllers/Doctors.php');
        $doctorController = new Doctors();
        $doctorController->register();
        
        break;
    
    case '/doctors/logout':
        unset($_SESSION['doctor_id']);
        unset($_SESSION['doctor_email']);
        unset($_SESSION['doctor_name']);

        $_SESSION['isLogout'] = true;
        header('Location: /');
        die;

        break;
    case '/about':
        require_once(ROOT. 'app/controllers/Pages.php');
        $pageController =new Pages();
        $pageController->about();
        break;

    case '/home':
        require_once(ROOT. 'app/controllers/Pages.php');
        $pageController =new Pages();
        $pageController->index();   
        break;

}
?> 

