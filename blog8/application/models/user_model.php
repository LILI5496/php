<?php defined('BASEPATH') OR exit('No direct script access allowed');
        class User_model extends CI_Model{
            public function get_insert($arr){
                return $this->db->insert('T_USERS', $arr);
            }
            public function login_in($ACCOUNT,$PASSWORD){
                $arr=array(
                    'ACCOUNT'=>$ACCOUNT,
                    'PASSWORD'=>$PASSWORD
                );
               $query= $this->db->get_where('T_USERS',$arr);
                return $query->row();
            }
        }

?>