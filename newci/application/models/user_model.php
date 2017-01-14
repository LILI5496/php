<?php  defined('BASEPATH') OR exit('No direct script access allowed');
    class User_model extends CI_Model{
        public function checkname($name){

            $query=$this->db->query("select * from user where uname='$name'");
//            $query=$this->db->get_where (array('user',uname=>'$name'));
            return $query->row();

        }
        public function get_insert($name,$pass){
           $query= $this->db->query("insert into user(uid,uname,pass) values(null,'$name','$pass')");
            return $query;

        }
        public function get_sel($name,$pass){
            $arr=array(
                'uname'=>$name,
                'pass'=>$pass
            );
            $query = $this->db->get_where('user',array());

        }

    }










?>