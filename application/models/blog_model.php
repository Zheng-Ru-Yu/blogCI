<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Blog_model extends CI_Model{
		public function get_article(){
			$query=$this->db->get('t_blogs');
			return $query->result();
		}
			public function up_sel($id){
				$this->db->set('CLICK_RATE','CLICK_RATE+1',false);
				$this->db->where('BLOG_ID',$id);
				$query=$this->db->update('t_blogs',$data);
				return $query;
			
		}
			public function select($id){
				$query=$this->db->get_where('t_blogs',array('BLOG_ID'=>$id));
				return $query->row();
			}
			public function update_id($id,$title,$content){
				$d=date('Y').'-'.date('m').'-'.date('d');
				$data=array(
					'TITLE'=>$title,
					'CONTENT'=>$content,
					'ADD_TIME'=>$d,
					'BLOG_ID'=>$id
					
				);
				$this->db->where('BLOG_ID',$id);
				$query=$this->db->update('t_blogs',$data);
				return $query;
			}
			public function delet($id){
				$query=$this->db->delete('t_blogs',array('BLOG_ID'=>$id));
				return $query;
				
			}
		
		
		
		}
		
	
?>