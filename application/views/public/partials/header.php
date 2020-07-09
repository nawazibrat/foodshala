<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food Shala</title>
	<!-- <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>"> -->
	<!-- link_tag in only for loading css -->
	<?=  link_tag('assets/css/bootstrap.min.css') ?>
	<?=  link_tag('assets/css/style.css') ?>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
			aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
			</ul>

			<ul class="navbar-nav my-2 my-lg-0">
				<?php if($this->session->userdata('logged_in') != TRUE): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('login') ?>">Login</a>
				</li>
				
				<li class="nav-item dropdown show">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
						aria-haspopup="true" aria-expanded="true"> Register
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?= base_url('userRegister') ?>">As User</a>
						<a class="dropdown-item" href="<?= base_url('AdminRegister') ?>">As Restaurant</a>
					</div>
				</li>
				<?php else: ?>

				<li class="nav-item dropdown show">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
						aria-haspopup="true" aria-expanded="true">
						<i class="fa fa-user-circle-o"></i>&nbsp; Hello <?= $this->session->userdata('full_name') ?>
					</a>
					<div class="dropdown-menu" x-placement="bottom-start"
						style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
						<a class="dropdown-item" href="<?= base_url('cart') ?>">My Cart</a>
						<a class="dropdown-item" href="<?= base_url('order') ?>">My Orders</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i
								class="fa fa-sign-out"></i>&nbsp;Logout</a>
					</div>
				</li>

				<?php endif; ?>

			</ul>

			<!-- <form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search">
				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			</form> -->
		</div>
	</nav>
