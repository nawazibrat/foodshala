<?php include('partials/header.php'); ?>

<div class="jumbotron">
	<?php if( $info=$this->session->flashdata('info') ): 
		$info_class=$this->session->flashdata('info_class');
	?>
	<div class="alert alert-dismissible <?= $info_class ?>">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?= $info ?>
	</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-md-6">
			<h3>MENU ITEMS</h3>
		</div>
		<div class="col-md-6">
			<a href="<?= base_url('admin/add_item') ?>" class="btn btn-info float-right" title="Edit"> <i
					class="fa fa-plus" aria-hidden="true"></i>&nbsp; ADD NEW MENU ITEM</a>
		</div>
	</div>
	<br>
	<div class="table-responsive">
		<table class="table table-hover" id="myTable">
			<thead>
				<tr>
					<th scope="col" style="width:20%">#</th>
					<th scope="col" style="width:30%">Name</th>
					<th scope="col" style="width:20%">Type</th>
					<th scope="col" style="width:15%">Price</th>
					<th scope="col" style="width:15%"> </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($items as $item): ?>
				<tr>
					<th scope="row"><?= $item->id ?></th>
					<td><?= $item->food_name ?></td>
					<td><?= $item->type == 1 ? 'Veg' : 'Non-veg' ?></td>
					<td>&#8377; <?= $item->food_price ?></td>
					<td>
						<div class="row">
							<div class="col-md-4">
								<a href="<?= base_url('admin/edit_item/').$item->id ?>" class="btn btn-info"
									title="Edit"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
							</div>

							<div class="col-md-4">
								<form action="<?= base_url('admin/delete_item') ?>" method="post">
									<input type="hidden" name="id" value="<?= $item->id ?>">
									<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
								</form>
							</div>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal" id="add-item">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add New Menu Item</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Modal body text goes here.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal" id="edit-item">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Modal body text goes here.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<?php include('partials/footer.php'); ?>
