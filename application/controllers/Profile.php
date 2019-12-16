<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
        $this->load->model('user');  
        $this->load->model('files');
        $this->load->library('upload');
        $this->userid = $this->session->userdata('userid');
        if (!isset($this->userid) or $this->userid=='') redirect('login');
    }
     
    public function index()
        
    {   $token = $_GET["token"];
        $data['user'] = $this->user->get_user_token($token);
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('profile', $data);
        $this->load->view('layouts/footer');
        
    }
    
    public function logout()
        
    {
        $this->session->unset_userdata( $this->userid);
        $this->session->sess_destroy();
        redirect('welcome/login');
        
    }
    
    
    public function gallery()
        
    {  $album_name=$_GET['album_name'];
       $data['user'] = $this->user->get_user($this->userid);
       $data['files_img'] = $this->files->get($this->userid);
       $data['album']= $album_name;
       $this->load->view('layouts/header');
       $this->load->view('layouts/navbar',$data);
       $this->load->view('gallery', $data);
       $this->load->view('layouts/footer');
        
    }
    
    /*public function upload()
        
    {
        
    if(isset($_FILES['files'])){
        //$config['allowed_types'] = 'jpg|jpeg|png|gif';
        //$this->load->library('upload',$config);
        $album_name=$_POST['album_name'];
        $myFile = $_FILES['files'];
        $fileCount = count($myFile["name"]);
        for ( $i=0; $i < $fileCount; $i++ ) {
            $file = read_file($myFile['tmp_name'][$i]);
            $name = basename($myFile['name'][$i]);
            write_file('files/'.$name, $file);
            $this->files->add($name, $album_name);
        }
        redirect('profile/album_name');        
    } else $this->load->view('profile/uploadview');
        
    }*/
    
    
    public function upload()
    { 
        $data = [];
        $count = count($_FILES['files']['name']);
        $album_name=$this->input->post('album_name');
        if($_FILES['files']['name'][0]!==""){
            for($i=0;$i<$count;$i++){
                if (!empty($_FILES['files']['name'][$i])){
                    $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['files']['size'][$i];
  
                    $config['upload_path'] = 'files/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $_FILES['files']['name'][$i];
            
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config);  
    
                    if ($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $this->files->add($filename, $album_name);
                        //$data['totalFiles'][] = $filename;
                    } else {
                        $this->session->set_flashdata('msg_error_upload','Some problem occurred, please try again!!!');
                        redirect("profile/uploadview");
                        }
                }
   
            }
           
            redirect('profile/album_name');        
        } else{
           $this->session->set_flashdata('msg_error_upload','Image(s) not found...!!!'); 
           redirect("profile/uploadview");
        } 
        
    }
  
    public function album_name()
        
    {  
       $data['user'] = $this->user->get_user($this->userid);
       $data['files'] = $this->files->get_album($this->userid);
       $this->load->view('layouts/header');
       $this->load->view('layouts/navbar',$data);
       $this->load->view('gallery', $data);
       $this->load->view('layouts/footer');   
   
    }
    
    
    public function delete()
        
    {
        $id=$_GET['fileid'];
        $album=$_GET['album'];
        $name = $this->files->delete($id, $album);
        unlink('files/'.$name);
        redirect('profile/album_name');
        
    }
    
    public function deleteall()
         
    {
        $album=$_GET['album'];
        $names = $this->files->deleteall('files',$album);
        foreach ( $names as $name) {
            if(file_exists('files/'.$name)){
               unlink('files/'.$name);
            }
        }
            redirect('profile/album_name');
         
    }
    
    public function uploadview()
        
    {   
        $data['user'] = $this->user->get_user($this->userid);
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('upload');
        $this->load->view('layouts/footer');
        
    }
    
   /* public function upload_pr()
        
    {
        if (isset($_FILES['file_pr'])) {
           
           $file   = read_file($_FILES['file_pr']['tmp_name']);
           $name   = basename($_FILES['file_pr']['name']);
           write_file('files/'.$name, $file);
           $random_link=$this->files->add_pr($name);
        
        }
        redirect('profile?token='.$random_link);        
    } //else $this->load->view('profile/uploadview');*/
    
    public function upload_pr()
        
    {  
    $token=$this->input->post('token');
    if (!empty($_FILES['file_pr']['name'])) {
        $config['upload_path'] = 'files/'; 
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES['file_pr']['name'];
        $this->load->library('upload', $config); 
        $this->upload->initialize($config); 
        if ($this->upload->do_upload('file_pr')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
            $random_link=$this->files->add_pr($filename);
            redirect('profile?token='.$random_link); 
        } else{
            $this->session->set_flashdata('msg_error_upload','Some problem occurred, please try again!!!');
             redirect('profile?token='.$token); 
        }
    redirect('profile/uploadview'); 
    } else{
        $this->session->set_flashdata('msg_error_upload','Image not found...!!!');  
        redirect('profile?token='.$token); 
    } 
        
    }
    
    
     public function all_profile()
        
    {   $data['user'] = $this->user->get_user($this->userid);
        $data['userid'] =$this->userid;
        $data['users'] = $this->user->all_user();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('all_profile', $data);
        $this->load->view('layouts/footer');
              
    } 
    
    public function email()
        
    {
        $data['user'] = $this->user->get_user($this->userid);
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('email');
        $this->load->view('layouts/footer');
              
    } 
    
    public function chat()
        
    {   $first_id=$_GET['userid'];
        $second_id=$_GET['profid'];
        $results=$this->files->get_chat($first_id,$second_id);
        $data['user'] = $this->user->get_user($this->userid);
        $data['results'] = $results;
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('chat',$data);
        $this->load->view('layouts/footer');
              
    } 
    
    public function add_chat()
        
    {   $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $user_first=$this->userid;
        $message=$_POST['message'];
        $user_second=$_POST['us_second'];
        
        $data=array(
                'user_first'=>$user_first, 
                'user_second'=>$user_second, 
                'message'=>$message, 
               );
        $this->files->add_chat($data);
        redirect("profile/chat?userid=$user_first&profid=$user_second");
    } 
    
   
}
   
