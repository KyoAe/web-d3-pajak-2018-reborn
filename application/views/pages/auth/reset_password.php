<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= $this->load->view('layouts/auth_header', NULL, true); ?>

	<div class="mt-5">
		<div class="text-center my-5">
			<a href="<?= site_url(); ?>"><img src="<?= base_url(); ?>public/images/logo-white.png" alt="" width="211px"></a>
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Reset <span>Password</span></h2>
					<!-- <p>Don't have an account? <a href="register.html">Create one here</a></p> -->
				</div>	
				<form class="contact-bx" method="post">
					<small class="text-danger"><?php echo $this->aauth->print_errors() ?></small>
					<p>Password must be between 8 to 13 characters</p>
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<?php echo form_error('newpass') ?>
								<div class="input-group"> 
									<label>New Password</label>
									<input name="newpass" type="password" class="form-control" required="" id="newpass">
								</div>								
							</div>							
							<div class="form-group">
								<?php echo form_error('newpassconf') ?>
								<div class="input-group"> 
									<label>Confirm New Password</label>
									<input name="newpassconf" type="password" class="form-control" required="" id="newpassconf">
								</div>								
							</div>
							<div class="show-password" data-target="newpass">
								<input type="checkbox">Show New Password
							</div>
							<div class="show-password" data-target="newpassconf">
								<input type="checkbox">Show Confirm New Password
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group form-forget">
								<a href="<?= site_url(); ?>auth/login" class="ml-auto">Login</a>
							</div>
						</div>
						<div class="col-lg-12 m-b30 text-center">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Submit</button>
						</div>
					</div>
                </form>
            </div>            
		</div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    D III Pajak 2018 PKN STAN
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <a target="_blank" href="https://instagram.com/gio_kyo">GA</a>
                </div>
            </div>
        </div>
    </div>

<?= $this->load->view('layouts/auth_footer', NULL, true); ?>