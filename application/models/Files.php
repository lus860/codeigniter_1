<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Files extends CI_Model {
    
    public function __construct() 
        
    {
        parent:: __construct();
        $this->load->database();
    }
    
    public function get($userid)
    
    {   
        $this->db->select('album.*, files.*')->from('album')->join('files', 'album.file_id = files.id', 'inner');
        $this->db->where(array('user_id'=>$userid));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function get_album($userid)
    
    { 
        $query = $this->db->get_where('album',array('us_id'=>$this->session->userdata('userid')));
        $result = $query->result();
        return $result;
    }
    
    public function add($file, $album_name)
    
    {
        $this->db->insert('files', array('user_id'=>$this->session->userdata('userid'),'img'=>$file ));
        $insert_id = $this->db->insert_id();
        $this->db->insert('album', array('us_id'=>$this->session->userdata('userid'), 'file_id'=> $insert_id , 'album_name'=>$album_name ));
    }
    
    public function add_pr($file)
    
    {
       
        $this->db->set('prof_img', $file);
        $this->db->where('id', $this->session->userdata('userid'));
        $this->db->update('users');
        $query = $this->db->get_where('users',array('id'=>$this->session->userdata('userid')));
        $result = $query->result();
        $random_link=$result[0]->random_link;
        return $random_link;

    }
    
    public function delete($id, $album)
    
    {   
        $query_album = $this->db->delete('album',array('us_id'=>$this->session->userdata('userid'),'album_name'=>$album, 'file_id'=>$id));
        $query = $this->db->get_where('files',array('id'=>$id,'user_id'=>$this->session->userdata('userid')));
        $result = $query->result();
        $query = $this->db->delete('files', array('id'=>$id, 'user_id'=>$this->session->userdata('userid')));
        return $result[0]->img;
    }
    
    public function deleteall($mytable,$album)
    
    {  
        $result=[];
        $query_album = $this->db->get_where('album',array('us_id'=>$this->session->userdata('userid'),'album_name'=>$album));
        
        foreach ($query_album->result() as $row) {
           $file_id=$row->file_id;
           $query = $this->db->get_where('files',array('id'=>$file_id));
           $res=$query->result();
           $result[]=$res[0]->img;
           $this->db->delete('files',array('id'=>$file_id));
        }
        
        $this->db->delete('album',array('us_id'=>$this->session->userdata('userid'),'album_name'=>$album));
        return $result;
    }
    
    
    
    
    public function get_chat($first_id,$second_id)
    
    {   
        $this->db->select('users.*, message.*')->from('users')->join('message', 'users.id = message.user_first', 'inner');
        $this->db->where(array('user_first'=>$first_id,'user_second'=>$second_id));
        $query = $this->db->get();
        $result_first = $query->result();
        $this->db->select('users.*, message.*')->from('users')->join('message', 'users.id = message.user_first', 'inner');
        $this->db->where(array('user_first'=>$second_id, 'user_second'=>$first_id));
        $query = $this->db->get();
        $result_second = $query->result();
        $results = array_merge($result_first, $result_second);
        $chat=[];
        foreach($results as $result){
        $id=$result->id;
        $firstname=$result->firstname;
        $lastname=$result->lastname;
        $prof_img=$result->prof_img;
        $user_first=$result->user_first;
        $user_second=$result->user_second;
        $message=$result->message;
        $time=$result->created_time;
        $chat["$id"]= array('firstname'=>$firstname, 'lastname'=>$lastname,'prof_img'=>$prof_img, 'user_first'=>$user_first,'user_second'=>$user_second, 'message'=>$message, 'time'=>$time);
          
        }
        
        ksort($chat);
        return $chat;
    }
    
    public function add_chat($data)
    
    {  
    
        $this->db->insert('message',$data);
        return true;
    
    }
    
    
}















