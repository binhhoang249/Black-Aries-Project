<?php
    class AboutUs extends Controller {
        static function index() {
           $result  = self::model("AboutUsModel");
           self::view("AboutUsPage",[]);
        }
    }
?>
