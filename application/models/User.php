<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Model {

	
	public function __construct() {
        parent:: __construct();
        $this->load->database();
    }

	public function register($data)
        
    {
        
        $this->db->insert('users',$data);
        return true;
    }
    
    public function login($email, $password)
        
    {
 
        $query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
        if ($query->num_rows()==0) {
            return false;
        }
        else {
            $result = $query->row();
            //$first_row = $result[0];
            $userid = $result->id;
            $query = $this->db->get_where('users', array('id'=>$userid));
            $result_user = $query->row();
            $status=$result_user->status;
            if ($status==1){
              return $userid;
            } else { 
              return "1";
            } 
       
        }
    }
     
   
    public function get_user($userid)
        
    {
 
        $query = $this->db->get_where('users', array('id'=>$userid));
        $result = $query->result(); 
        return $result;
     
    }

    public function get_user_token($token)
         
    {
 
        $query = $this->db->get_where('users', array('random_link'=>$token));
        $result = $query->result(); 
        return $result;
     
    }

    public function get_random_link($id)
        
    {
        
        $query = $this->db->get_where('users', array('id'=>$id, 'status'=>"1"));
        $result = $query->row();
        $result=$result->random_link;
        return $result;
        
    }

    public function all_user()
        
    { 
        $query = $this->db->get('users');
        $result = $query->result();
        return $result;
    }
    
}









