<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('user_model');
        }
        public function index(){

        }
        public function reg(){
            $this->load->view('reg.php');
        }
        public function do_reg(){
            $name=$this->input->post('uname');
            $pass = $this->input->post('pass');


            $rs=$this->user_model->checkname($name);
            if ($rs){
                redirect('user/reg');
            }else{
//                echo "fff";
                $rs=$this->user_model->get_insert($name,$pass);
                if ($rs){
                    redirect('user/login');
                }
            }


        }
        public function checkname(){
            $name = $this->input->post('uname');
            $this->user_model;

        }
        public function login(){
        $this->load->view('login.php');
        }
        public function do_login(){
            $name = $this->input->post['uname'];
            $pass = $this->input->post['pass'];

            $this->load->model('user_model');
//            $rs=$this->;
        }
    }







?>