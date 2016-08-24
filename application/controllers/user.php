<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
		}
		public function Y(){
			redirect('blog/indexY');
			
		}
		public function reg(){
			$this->load->view('reg.php');
			
		}
		public function create(){
			$email=$this->input->post('email');
			$name=$this->input->post('name');
			$pwd=$this->input->post('pwd');
			$gender=$this->input->post('gender');
			$province=$this->input->post('province');
			$city=$this->input->post('city');
			$result=$this->user_model->insert($name,$pwd,$email,$gender,$province,$city);
			if($result){
					redirect('user/login');
				}else{
					echo "false";
					//redirect('user/reg');
					
				}
		}
		public function login(){
			$this->load->view('login.php');
		}
		
		public function do_login(){
			$email=$this->input->post('email');
			$pwd=$this->input->post('pwd');
			$result=$this->user_model->get_name_by_pass($email,$pwd);
			// var_dump($result);//(对象类型)
			// die();
			if($result){
					//文件session
					$arr=array(
					'id'=>$result->USER_ID,
					'account'=>$result->ACCOUNT,
					'name'=>$result->NAME,
					);
					$this->session->set_userdata($arr);
						redirect('blog/index');//调到blog控制器
					}else{
						echo "false";
						
					}
					
			
		}
	
	
	
	
	
	
	
	
	
	
	
	
	}
?>