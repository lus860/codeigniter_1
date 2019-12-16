public function uploadImage() { 
   
      $data = [];
   
      $count = count($_FILES['files']['name']);
    
      for($i=0;$i<$count;$i++){
    
        if(!empty($_FILES['files']['name'][$i])){
    
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
  
          $config['upload_path'] = 'uploads/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '5000';
          $config['file_name'] = $_FILES['files']['name'][$i];
   
          $this->load->library('upload',$config); 
    
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
   
            $data['totalFiles'][] = $filename;
          }
        }
   
      }
   
      $this->load->view('imageUploadForm', $data); 
   }
   
  }
  
 


<?php 
          
public function upload()
    { 
        $data = [];
        $count = count($_FILES['files']['name']);
        $album_name=$this->input->post('album_name');
        if($count===0){
           $this->session->set_flashdata('msg_error_upload','Image(s) not found...!!!'); 
           redirect("profile/uploadview");
        } elseif(!$count==0){
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
        
    }
     }
          
          
          
public function upload_pr()
        
{  
if (isset($_FILES['file_pr'])) {
    $config['upload_path'] = 'files/'; 
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['max_size'] = '5000';
    $config['file_name'] = $_FILES['file_pr']['name'];
    $this->load->library('upload', $config); 
    $this->upload->initialize($config); 
    if ($this->upload->do_upload('file')){
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];
        $this->files->add($filename, $album_name);
        //$data['totalFiles'][] = $filename;
        } else{
            $this->session->set_flashdata('msg_error_upload','Some problem occurred, please try again!!!');
            redirect('profile?token='.$random_link);
        }
    redirect('profile?token='.$random_link); 
    } else{
        $this->session->set_flashdata('msg_error_upload','Image not found...!!!');  
        redirect('profile?token='.$random_link);
    } 
        
}
    
