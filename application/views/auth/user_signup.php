<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Signup Page</title>
	<?=  link_tag('assets/css/bootstrap.min.css') ?>
	<?=  link_tag('assets/css/mdb.min.css') ?>
	<?=  link_tag('assets/css/style.css') ?>
</head>

<body class="signin">
	<nav class="navbar navbar-dark bg-primary">
		<a href="<?= base_url() ?>" class="text-white">FOOD SHALA</a>
		<ul class="navbar-nav my-2 my-lg-0 float-right">
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('login') ?>">Login</a>
			</li>
		</ul>
	</nav>
	
	<div class="row d-flex justify-content-center">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Are you a New User? Sign up now</h4>
					</div>
					<ul class="text-danger">
						<?php if(form_error('full_name')): ?>
						<li><?php echo form_error('full_name') ?></li>
						<?php endif; ?>

						<?php if(form_error('email')): ?>
						<li><?php echo form_error('email') ?></li>
						<?php endif; ?>

						<?php if(form_error('confirm_password')): ?>
						<li><?php echo form_error('confirm_password') ?></li>
						<?php endif; ?>
					</ul>

					<?php echo form_open('UserRegister/register_user') ?>
					<div class="modal-body mx-3">
						<div class="md-form mb-5">
							<i class="fa fa-user prefix grey-text"></i>
                            <input type="hidden" name="role" value="1">
							<input type="text" id="orangeForm-name" name="full_name"
								value="<?= set_value('full_name')?>" class="form-control validate">
							<label data-error="wrong" data-success="right" for="orangeForm-name">Your name </label>
						</div>
						<div class="md-form mb-5">
							<i class="fa fa-envelope prefix grey-text"></i>
							<input type="email" id="orangeForm-email" name="email" value="<?= set_value('email')?>"
								class="form-control validate">
							<label data-error="wrong" data-success="right" for="orangeForm-email">Your email </label>
						</div>

						<div class="md-form mb-4">
							<i class="fa fa-lock prefix grey-text"></i>
							<input type="password" id="orangeForm-pass" name="password" class="form-control validate">
							<label data-error="wrong" data-success="right" for="orangeForm-pass">Your
								password </label>
						</div>

						<div class="md-form mb-4">
							<i class="fa fa-lock prefix grey-text"></i>
							<input type="password" id="confirm_password" name="confirm_password"
								class="form-control validate">
							<label data-error="wrong" data-success="right" for="confirm_password">Confirm
								password </label>
						</div>

						<div class="form-group" id="type">
							<label class="radio-inline">Your Preference &nbsp;:&nbsp;
								<input type="radio" name="food_type" value="1"
									<?php echo set_value('food_type') == 1 ? "checked" : ""; ?> required> Veg
								&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label class="radio-inline">
								<input type="radio" name="food_type" value="2"
									<?php echo set_value('food_type') == 2 ? "checked" : ""; ?> required> Non-veg
							</label>
						</div>

					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button class="btn btn-deep-orange">Sign up</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/mdb.min.js') ?>"></script>
	<script src="https://use.fontawesome.com/28496ef631.js"></script>
</body>

</html>
