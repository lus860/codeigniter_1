<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <ul  class="navbar-nav ml-auto mt-2 mt-lg-0">
    <li class="nav-item">
       <?php if(isset($_SESSION['user_id'])){;?>
        <?php if(isset($user[0]->random_link)) :?> 
        <a class="nav-link" href="<?=site_url('profile?token='.$user[0]->random_link);?>">
        <?php endif ?>
         <?php if(isset($user[0]->prof_img)):?>
        <img src="<?=base_url()?>files/<?=$user[0]->prof_img?>" width="30px" class="mr-2"><?php endif ;?>
         <?php if(isset($user[0]->firstname)):?>
         <?=$user[0]->firstname ?> </a>
         <?php endif ;?>
        <?php } else{ ?>
        <a class="nav-link" href="welcome/login"><?php echo 'Sign In'; ?></a>
        <?php }; ?>
      </li>
      <li class="nav-item">
       <?php if(isset($_SESSION['user_id'])){ ?>
        <a class="nav-link" href="profile/logout"><?php echo 'Logout' ; ?></a>
        <?php } else{ ?>
        <a class="nav-link" href="welcome"><?php echo 'Sign Up'; ?></a>
        <?php } ?>
      </li>
    </ul>
  </div>
</nav>