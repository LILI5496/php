<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Blog extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $this->load->view('index_logined.php');
        }

        public function uloginIndex()
        {
            $this->load->view('index.php');
        }

        public function center()
        {
            $this->load->view('adminindex.php');
        }

        public function publish_paper()
        {
            $this->load->view('newBlog.php');



        }
        public function publish(){
            $this->load->model('blog_model');
            $name=$this->input->post('name');
            $content=$this->input->post('content');
            $rs=$this->blog_model->do_publish($name,$content);
            if ($rs){
                redirect('blog/publish_paper');
            }
        }
        public function blogCatalogs(){
            $this->load->model('blog_model');
            $rs=$this->blog_model->search();
            $ar['blog']=$rs;

            $this->load->view('blogCatalogs',$ar);
        }
        public function addblogCatalogs(){
            $this->load->model('blog_model');
            $name=$this->input->post('name');
            $pxz=$this->input->post('sort_order');
            $rs=$this->blog_model->addblogCatalogs($pxz,$name);
            if ($rs){
                redirect('blog/blogCatalogs');
            }
        }


    }
?>