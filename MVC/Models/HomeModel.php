<?php
    class HomeModel extends DModel {
        public function __construct() {
            parent::__construct();
        }
        public function getInformationAboutUs() {
            $sql = "select * from Bussiness";
            return $this->db->select($sql);
        }
        public function updateBussiness($data){
            $condition = "Bussiness_id = 1";
            return $this->db->update("Bussiness",$data,$condition);
        }
    }
?>