<?php if(isset($_SESSION['verify_msg'])):?>
<div class = "row">
     <div class = "col-md-6 col-md-offset-3">
         <?=$this->session->flashdata('verify_msg');?>
     </div>
</div>
<?php endif?> 
  <div class="limiter">
		<div class="container-login">
		   <div class="wrap-login">
				<?php echo form_open('welcome/register'); ?>
					<span class="login-form-title pb-4">Welcome</span>
					<div class="wrap-input">
						<input class="input" type="text" name="firstname"  value="<?php echo set_value('firstname'); ?>">
						<span class="focus-input" data-placeholder="Firstame"></span>
				    </div>
					<div class="error">
                    <?php echo form_error('firstname'); ?>
                    </div>
                   <div class="wrap-input">
						<input class="input" type="text" name="lastname"  value="<?php echo set_value('lastname'); ?>">
						<span class="focus-input" data-placeholder="Lastame"></span>
						
					</div>
                   <div class="error">
                   <?php echo form_error('lastname'); ?>
                   </div>
                   <div class="wrap-input">
						<input class="input" type="text" name="email" value="<?php echo set_value('email'); ?>" >
						<span class="focus-input" data-placeholder="Email"></span>
					</div>
                  
                    <div class="error">
                         <?php echo form_error('email'); ?>
                    </div>
					<div class="wrap-input">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input" type="password" name="password" value="<?php echo set_value('password'); ?>">
						<span class="focus-input" data-placeholder="Password"></span>
					</div>
					 <?php echo form_error('password'); ?>
					<div class="error">
                    </div>
					<div class="wrap-input">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>">
						<span class="focus-input" data-placeholder="Confirm Password"></span>
					</div>
                    <div class="error">
                     <?php echo form_error('passconf'); ?>
                   </div>
					<div class="container-login-form-btn">
						<div class="wrap-login-form-btn">
							<div class="login-form-bgbtn"></div>
							<button class="login-form-btn" name="submit">
								Register
							</button>
						</div>
					</div>

					<div class="text-center pt-5">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="nav-link" href="<?=base_url()?>welcome/login">Sign In</a>
					</div>
				<?php echo form_close(); ?>
				<?php if(isset($_SESSION['msg_success'])):?>
				   <div class="alert alert-success text-center"><?=$this->session->flashdata('msg_success');?></div>
				<?php endif?>
				<?php if(isset($_SESSION['msg_error'])):?>
				   <div class="alert alert-danger text-center"><?=$this->session->flashdata('msg_error');?></div>
				<?php endif?>
			</div>
		</div>
	</div>
	
	<div class="alert"><?php if(isset($_SESSION['success'])){ echo $_SESSION['success'];}?></div>