<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
        $this->load->model('email_send');
        $this->load->model('user');
    }
    
	public function index()
        
	{   
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('signup');
        $this->load->view('layouts/footer');
    }
    
    public function login()
        
    {
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('signin');
        $this->load->view('layouts/footer');
    }   
    
    public function register()
        
	{   
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if(isset($_POST['submit'])){
        $this->form_validation->set_rules('firstname', 'Firstname',  'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        if ($this->form_validation->run() == FALSE) {
            //redirect('welcome');
        } else {
            $hash = md5(uniqid(rand(), TRUE));
            $data=array(
                'firstname'=>$_POST['firstname'], 
                'lastname'=>$_POST['lastname'], 
                'email'=>$_POST['email'], 
                'password'=>md5($_POST['password']),
                'random_link'=>$hash,
                );
            
            //$data = $this->security->xss_clean($data);
            if($this->user->register($data)){
             
                if ($this->email_send->sendEmail($hash, $_POST['email'])){
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
                    redirect('welcome');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later1!!!</div>');
                    redirect('welcome');
                }
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later2!!!</div>');
                redirect('welcome');
            }
      
        }
            
        }
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('signup');
        $this->load->view('layouts/footer');
        
    }
    
    //$hash=$this->csrf_hash;
    function verify()
    {  
        $hash=$_GET['hash'];
        if ($this->email_send->verifyEmailID($hash)){
           $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('welcome/signin');
        }
        else
            
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('welcome');
        }
    }
    
    public function signin() 
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if ( isset($_POST['submit'])) {
           $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
           $this->form_validation->set_rules('email', 'Email', 'required');
           if ($this->form_validation->run() == FALSE) {
            //redirect( 'welcome/login');
            } else {
                $email=$_POST['email']; 
                $password=md5($_POST['password']);
                $csrf_hash = $this->security->get_csrf_hash();
                $csrf_name = $this->security->get_csrf_token_name();
               
                $results = $this->user->login($email,$password);
                if ($results==false){
                      $this->session->set_flashdata('error','No such account..'); 
                     //redirect('login');
                }
                else
                { 
                      
                $this->session->set_userdata(array('userid'=>$results));
                $_SESSION['user_id']=$results;
                $result = $this->user->get_random_link($results);
                $this->session->set_flashdata('result',$result);
                redirect("profile?token=$result");
                      
                }
    
            }
            
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('signin');
        $this->load->view('layouts/footer');
    }
    
}