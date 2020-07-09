<?php include('partials/header.php'); ?>

<div class="jumbotron banner-image">
	<center>
		<div class="inner-banner-image">
			<div class="banner_content">
				<a class="navbar-brand" href="#"><span class="food-shala"> FOOD SHALA </span></a>
				<p class="slogan">Discover the best food & drinks</p>
				<a href="#food-list" class="btn-order">Order Now</a>
			</div>
		</div>
	</center>
</div>
<div class="jumbotron row" id="food-list">
	<?php foreach($items as $item): ?>
	<div class="col-md-4">
		<div class="card mb-3">
			<h3 class="card-header"><?= $item->food_name ?></h3>
			<img style="height: 200px; width: 100%; display: block;"
				src="<?= $item->image_relative_path ? $item->image_relative_path : base_url('assets/images/default.jpg') ?>"
				alt="Card image">
			<div class="card-body">
				<p class="card-text"> &#8377; <?= $item->food_price  ?></p>
			</div>
			<div class="card-body">
				<a href="<?= base_url('home/show_invidual/').$item->id ?>" class="card-link">More Details</a>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<div class="d-flex justify-content-center">
	<?= $this->pagination->create_links() ?>
</div>

<?php include('partials/footer.php'); ?>
