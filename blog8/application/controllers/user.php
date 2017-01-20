<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class User extends CI_Controller{
        public function __construct(){
            parent::__construct();
    }
        public function index(){
//            echo 123;
        }
        public function reg(){
            $this->load->view('reg.php');
        }
        public function login(){
            $this->load->view('login.php');

        }
        public function do_reg(){
//                echo 123;
            $ACCOUNT=$this->input->post('email');
            $NAME=$this->input->post('name');
            $PASSWORD = $this->input->post('pwd');
            $GENDER = $this->input->post('gender');
            if($GENDER==1){
                $gname = '男';
            }else{
                $gname ='女';
            }
            $arr=array(
                'ACCOUNT'=>$ACCOUNT,
                'NAME'=>$NAME,
                'PASSWORD'=>$PASSWORD,
                'GENDER'=>$gname
            );
            $this->load->model('user_model');
            $rs=$this->user_model->get_insert($arr);
            if ($rs){
                redirect('user/login');
            }else{
                redirect('user/reg');
            }

        }
        public function do_login(){
            $ACCOUNT=$this->input->post('email');
            $PASSWORD=$this->input->post('pwd');
            $this->load->model('user_model');
            $rs=$this->user_model->login_in($ACCOUNT,$PASSWORD);

            if ($rs){
                $newdata = array(
                    'id'=>$rs->USER_ID,
                    'name'=>$rs->NAME,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
                redirect('blog/index');

            }else{
                redirect('user/login');
            }
        }


    }
?>