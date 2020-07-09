<?php include('partials/header.php'); ?>

<div class="jumbotron">
	<?php if( $success=$this->session->flashdata('success') ): ?>
		<div class="alert alert-dismissible alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?= $success ?>
		</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-md-6">
			<img class="img-responsive img-thumbnail"
				src="<?= $item->image_relative_path ? $item->image_relative_path : base_url('assets/images/default.jpg') ?>">
		</div>
		<div class="col-md-6">
			<h3><?= $item->food_name ?></h3>
			<p class="lead"><?= $item->food_desc ?></p>
			<p>For <?= $item->type ==1 ? 'Vegetarians lover' : 'For Non-veg lovers' ?></p>
			<hr class="my-4">
			<p> From <?= $item->food_price ?></p>
			<?php $this->session->set_userdata('unit_price',$item->food_price); ?>
			<p> &#8377; <?= $item->food_price ?></p>
			<?php if($this->session->userdata('is_in_cart')): ?>
				<p class="lead">
					<a class="btn btn-success btn-lg" href="<?= base_url('cart') ?>" role="button"><i class="fa fa-shopping-cart"
							aria-hidden="true"></i>&nbsp; Go to Cart</a>
				</p>
			<?php else :?>
				<p class="lead">
					<a class="btn btn-warning btn-lg" href="<?= base_url('cart/store/').$item->id ?>" role="button"><i class="fa fa-shopping-cart"
							aria-hidden="true"></i>&nbsp; Order Now</a>
				</p>
			<?php endif;?>
		</div>
	</div>


</div>

<?php include('partials/footer.php'); ?>
