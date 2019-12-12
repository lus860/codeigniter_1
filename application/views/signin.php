 <?php if(isset($_SESSION['user_id'])): ?>
   <a class="alert" href="<?=site_url('profile?token='.$_SESSION['result']);?>" > <h2 style="color:red;">Welcome Profile</h2></a>
	<?php endif ?>
    <div class="limiter">
		<div class="container-login">
			<div class="wrap-login">
				<?php echo form_open('welcome/signin' ); ?>
					<span class="login-form-title pb-4">Welcome</span>
					
					<div class="wrap-input">
						<input class="input" type="text" name="email"  value="<?php echo set_value('email'); ?>">
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
                   
                    <div class="error">
                     <?php echo form_error('password'); ?>
                    </div>
					<div class="container-login-form-btn">
						<div class="wrap-login-form-btn">
							<div class="login-form-bgbtn"></div>
							<button class="login-form-btn" name="submit">
								Login
							</button>
						</div>
					</div>

					<div class="text-center pt-5">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="registration.php">
							Sign Up
						</a>
					</div>
				<?php echo form_close(); ?>
				<?php if(isset($_SESSION['verify_msg'])):?>
                   <?=$this->session->flashdata('verify_msg');?>
                <?php endif?> 
			</div>
		</div>
	</div>
