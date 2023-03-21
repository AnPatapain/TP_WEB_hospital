<?php
   class Pages {
      public function about (){
         require_once(ROOT . "app/views/inc/about.php");
      }
      public function index (){
         //header('Location: /');
         require_once(ROOT . "app/views/inc/home.php");
         die;
      }
   }
?>
