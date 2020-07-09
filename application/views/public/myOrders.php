<?php include('partials/header.php'); ?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php if( $success=$this->session->flashdata('success') ): ?>
<div class="alert alert-dismissible alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?= $success ?>
</div>
<?php endif; ?>
<div class="container">
	<?php if($items): ?>
	<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th style="width:50%">Menu Item</th>
				<th style="width:10%">Price</th>
				<th style="width:8%">Quantity</th>
				<th style="width:22%" class="text-center">Subtotal</th>
				<th style="width:10%"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($items as $item): ?>
			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-2 hidden-xs"><img
								src="<?= $item->image_relative_path ? $item->image_relative_path : base_url('assets/images/default.jpg') ?>"
								class="img-responsive" /></div>
						<div class="col-sm-10">
							<h4 class="nomargin"><?= $item->food_name ?></h4>
							<p><?= $item->food_desc ?></p>
						</div>
					</div>
				</td>
				<td data-th="Price"> &#8377; <?= $item->food_price ?></td>
				<td data-th="Quantity">
					<input type="number" class="form-control text-center" value="1">
				</td>
				<td data-th="Subtotal" class="text-center"><?= $item->sub_total ?></td>
				<td class="actions" data-th="">
					<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
					<a href="<?= base_url('order/drop/').$item->id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php else: ?>
	<div class="jumbotron">
		<h1 class="display-3">No Order!!!</h1>

		<p class="lead">
			<a class="btn btn-warning btn-lg" href="<?= base_url() ?>" role="button"> <i class="fa fa-angle-left"
					aria-hidden="true"></i> See Menu Items</a>
		</p>
	</div>
	<?php endif; ?>
</div>
<?php include('partials/footer.php'); ?>
