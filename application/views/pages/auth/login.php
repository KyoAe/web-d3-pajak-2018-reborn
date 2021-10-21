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
					<h2 class="title-head">Login to your <span>Account</span></h2>
					<!-- <p>Don't have an account? <a href="register.html">Create one here</a></p> -->
				</div>	
				<form class="contact-bx" method="post">
					<small class="text-danger"><?php echo $this->aauth->print_errors() ?></small>
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<?php echo form_error('email') ?>
								<div class="input-group">									
									<label>Email</label>
									<input name="email" type="text" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<?php echo form_error('pass') ?>
								<div class="input-group"> 
									<label>Password</label>
									<input name="pass" type="password" class="form-control" required="" id="pass">
								</div>								
							</div>
							<div class="show-password" data-target="pass">
								<input type="checkbox">Show Password
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group form-forget">
								<a href="<?= site_url(); ?>auth/forgot_password" class="ml-auto">Forgot Password?</a>
							</div>
						</div>
						<div class="col-lg-12 m-b30 text-center">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
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