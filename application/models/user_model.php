<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User_model extends CI_Model{
		public function insert($name,$pwd,$email,$gender,$province,$city){
			$data=array(
				'NAME'=>$name,
				'PASSWORD'=>$pwd,
				'ACCOUNT'=>$email,
				'GENDER'=>$gender,
				'PROVINCE'=>$province,
				'CITY'=>$city,
			);
			
			$query=$this->db->insert('t_users',$data);
			return $query;
		}
		 
		public function get_name_by_pass($email,$pwd){
			$data=array(
				'ACCOUNT'=>$email,//键名（数据库中名字）=>键值
				'PASSWORD'=>$pwd,
			);
			$query=$this->db->get_where('t_users',$data);
			return $query->row();
		}
		
		}
		
	
?>