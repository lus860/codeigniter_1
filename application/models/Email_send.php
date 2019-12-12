<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Email_send extends CI_Model {

	
	public function __construct() 
    {
        parent:: __construct();
        $this->load->database();
        $this->load->library('email');
        $this->load->model('user');
    } 

    function sendEmail($hash, $email)
        
    {
        $from_email = 'lusinehovhannisyan280@gmail.com';
        $subject = 'Verify Your Email Address';
        $message = "http://codeigniter/welcome/verify?hash=$hash ";
        
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; 
        $config['smtp_port'] = '465'; 
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = '112358lusya';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
       
        
       
        $this->email->from($from_email);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
    
    //activate user account
    function verifyEmailID($key)
        
    {
        $data = array('status'=>"1");
        $this->db->where('random_link', $key);
        return $this->db->update('users', $data);
    }

}




