<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Blog_model extends CI_Model{
        public function publish_paper(){

        }
        public function addblogCatalogs($pxz,$name){
            $arr=array(
              'CATALOG_ID'=>$pxz,
                'NAME' =>$name

            );

            return $this->db->insert('T_BLOG_CATALOGS', $arr);
        }
        public function search(){
            $query = $this->db->get('T_BLOG_CATALOGS');
            return $query->result();
        }
    }




?>