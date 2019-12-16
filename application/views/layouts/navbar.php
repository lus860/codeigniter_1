<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    
       <?php if(isset($_SESSION['user_id'])):?>
      <li class="nav-item">
        <a class="nav-link" style="color:red;" href="<?=site_url('profile/all_profile')?>">All profile</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" style="color:red;" href="<?=site_url('profile/album_name')?>">Album</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" style="color:red;" href="<?=site_url('profile/email')?>">Email</a>
      </li>
      <?php endif ?>
     
    </ul>
    <ul  class="navbar-nav ml-auto mt-2 mt-lg-0">
    <li class="nav-item">
       <?php if(isset($_SESSION['user_id'])){;?>
        <?php if(isset($user)):?> 
        
        <a class="nav-link" href="<?=site_url('profile?token='.$user[0]->random_link);?>">
        <?php if($user[0]->prof_img==null){?>
          <img src="<?=base_url()?>files/avatar.png" width="30px" class="mr-2">
         <?php }else{?>  
         <img src="<?=base_url()?>files/<?=$user[0]->prof_img ?>" width="30px" class="mr-2">
         <?php };?>
          <?php endif?>
          <?php };?>
         <?php if(isset($user)){;?>
         <?=$user[0]->firstname ?></a>
        <?php }else{;?>
        <a class="nav-link" href="<?=base_url()?>welcome/login"><?php echo 'Sign In'; ?></a>
        <?php }; ?>
      </li>
      <li class="nav-item">
       <?php if(isset($_SESSION['user_id'])){ ?>
        <a class="nav-link" href="<?=base_url()?>profile/logout"><?php echo 'Logout' ; ?></a>
        <?php } else{; ?>
        <a class="nav-link" href="<?=base_url()?>welcome"><?php echo 'Sign Up'; ?></a>
        <?php };?>
       
      </li>
    </ul>
  </div>
</nav>