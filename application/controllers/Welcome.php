<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
        $this->load->model('email_send');
        $this->load->model('user');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
    
	public function index()
        
	{   if(!isset($_SESSION['user_id'])){
            $this->load->view('layouts/header');
            $this->load->view('layouts/navbar');
            $this->load->view('signup');
            $this->load->view('layouts/footer');
        } else {
            $result = $this->user->get_random_link($_SESSION['user_id']);
            redirect("profile?token=$result");
        }
    }
    
    public function login()
        
    {   if(!isset($_SESSION['user_id'])){
           $this->load->view('layouts/header');
           $this->load->view('layouts/navbar');
           $this->load->view('signin');
           $this->load->view('layouts/footer');
        } else {
            $result = $this->user->get_random_link($_SESSION['user_id']);
            redirect("profile?token=$result");
        }
    }   
    
    public function register()
        
	{   
        $this->form_validation->set_rules('firstname', 'Firstname',  'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        if ($this->form_validation->run() == FALSE) {
            //redirect('welcome');
        }   else {
                $hash = md5(uniqid(rand(), TRUE));
                $data=array(
                    'firstname'=> $this->input->post('firstname'),
                    'lastname'=> $this->input->post('lastname'), 
                    'email'=> $this->input->post('email'), 
                    'password'=>md5($this->input->post('password')),
                    'random_link'=>$hash,
                    );
            
                 //$data = $this->security->xss_clean($data);
                if($this->user->register($data)){
             
                    if ($this->email_send->sendEmail($hash, $this->input->post('email'))){
                    // successfully sent mail
                    $this->session->set_flashdata('msg_success','You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!');
                    redirect('welcome');
                    } else {
                    // error
                    $this->session->set_flashdata('msg_error','Oops! Error.  Please try again later1!!!');
                    redirect('welcome');
                    }
                } else {
                // error
                $this->session->set_flashdata('msg_error','Oops! Error.  Please try again later2!!!');
                redirect('welcome');
                }
      
            }
            
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('signup');
        $this->load->view('layouts/footer');
    }
    
    
    function verify()
    {  
        $hash=$_GET['hash'];
        if ($this->email_send->verifyEmailID($hash)){
           $this->session->set_flashdata('verify_msg_success','Your Email Address is successfully verified! Please login to access your account!');
            redirect('welcome/signin');
        }
        else
            
        {
            $this->session->set_flashdata('verify_msg_error','Sorry! There is error verifying your Email Address!');
            redirect('welcome/signin');
        }
    }
    
    public function signin() 
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            //redirect( 'welcome/login');
            } else {
                $email=$this->input->post('email'); 
                $password=md5($this->input->post('password'));
                $results = $this->user->login($email,$password);
                if ($results==false){
                      $this->session->set_flashdata('verify_msg_error','Sorry! Incorrect login or password');
                     redirect( 'welcome/login');
                } elseif($results=="1") {
                    $this->session->set_flashdata('verify_msg_error','Sorry! Check your email address problem with email address verification!');
                    redirect( 'welcome/login');
                } else { 
                    $this->session->set_userdata(array('userid'=>$results));
                    $_SESSION['user_id']=$results;
                    $result = $this->user->get_random_link($results);
                    $this->session->set_flashdata('result',$result);
                    redirect("profile?token=$result");
                }
    
            }
            
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('signin');
        $this->load->view('layouts/footer');
    }
    
}