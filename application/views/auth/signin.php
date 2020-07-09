<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Signin Page</title>
	<?=  link_tag('assets/css/bootstrap.min.css') ?>
	<?=  link_tag('assets/css/mdb.min.css') ?>
	<?=  link_tag('assets/css/style.css') ?>
</head>

<body class="signin">
	<nav class="navbar navbar-dark bg-primary">
		<a href="<?= base_url() ?>" class="text-white">FOOD SHALA</a>
		<ul class="navbar-nav nav float-right">
			<li class="nav-item dropdown show">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
					aria-expanded="true"> Register
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="<?= base_url('userRegister') ?>">As User</a>
					<a class="dropdown-item" href="<?= base_url('AdminRegister') ?>">As Restaurant</a>
				</div>
			</li>
		</ul>
	</nav>
	<?php if( $success=$this->session->flashdata('success') ): ?>
	<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?= $success ?>
	</div>
	<?php endif; ?>

	<div class="row d-flex justify-content-center">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Already an User? Sign in</h4>
					</div>
					<?php if( $error=$this->session->flashdata('login_failed') ): ?>
					<br>
					<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?= $error ?>
					</div>
					<?php endif; ?>
					<!-- <form action="" method="post"> -->
					<?php echo form_open('login/auth') ?>
					<div class="modal-body mx-3">
						<div class="md-form mb-5">
							<i class="fa fa-envelope prefix grey-text"></i>
							<input type="email" id="defaultForm-email" class="form-control validate" name="email"
								required>
							<label data-error="wrong" data-success="right" for="defaultForm-email">Your
								email</label>
						</div>

						<div class="md-form mb-4">
							<i class="fa fa-lock prefix grey-text"></i>
							<input type="password" id="defaultForm-pass" class="form-control validate" name="password"
								required>
							<label data-error="wrong" data-success="right" for="defaultForm-pass">Your
								password</label>
						</div>

					</div>
					<div class="modal-footer d-flex justify-content-center">
						<input type="submit" class="btn btn-default" value="Sign in">
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
