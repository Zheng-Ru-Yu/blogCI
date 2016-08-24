<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Blog extends CI_Controller{
		public function __construct(){
			parent::__construct();
			//$this->load->database();如果不配全局数据库这样加载
			$this->load->model('blog_model');
	}
		
	public function index(){
		$rs=$this->blog_model->get_article();
		$arr['blog']=$rs;
		$this->load->view('index.php',$arr);
		
	}
	public function indexY(){
		$rs=$this->blog_model->get_article();
		$arr['blog']=$rs;
		$this->load->view('indexY.php',$arr);
		
	}
	public function view(){
		$id=$this->uri->segment(3);
		$rs=$this->blog_model->up_sel($id);
		if($rs){
			$result=$this->blog_model->select($id);
		}
		else{
			echo "访客数更新失败";
		}
		$arr['blog']=$result;
		$this->load->view('viewPost_logined.php',$arr);
	}
	public function viewY(){
		$id=$this->uri->segment(3);
		$rs=$this->blog_model->up_sel($id);
		if($rs){
			$result=$this->blog_model->select($id);
		}
		else{
			echo "访客数更新失败";
		}
		$arr['blog']=$result;
		$this->load->view('viewPost_comment.php',$arr);
	}
	
	
	
	public function update(){
		$id=$this->uri->segment(3);
		$result=$this->blog_model->select($id);
		$arr['blog']=$result;
		$this->load->view('newBlog.php',$arr);
		
	}
		public function do_update(){
			$id=$this->input->post('hid');
			$title=$this->input->post('title');
			$content=$this->input->post('content');
			$result=$this->blog_model->update_id($id,$title,$content);
			if($result){
				redirect('blog/index');
			}else{
				echo "更新失败";
			}
		
	}
		public function delet(){
			$id=$this->uri->segment(3);
			$result=$this->blog_model->delet($id);
			if($result){
				//$this->index;
				redirect('blog/index');
				
			}else{
				echo "删除失败";
			}
			
		}
		
		
		

		
		
		
	}
?>	