<?php include('partials/header.php'); ?>

<div class="jumbotron bg-default">
	<div class="text-center">
		<fieldset>
			<legend>Edit Menu Item</legend>
		</fieldset>
		<hr>
	</div>
	<div class="d-flex justify-content-center">
		<form action="<?= base_url('admin/update_item/').$menu->id ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="form-group">
					<label for="name">Menu Name</label>
					<input class="form-control " id="name" name="name" value="<?= set_value('name',$menu->food_name)?>" required>
					<sapn class="text-danger"><?php echo form_error('name') ?></sapn>
				</div>
				<div class="form-group">
					<label for="price">Menu Price</label>
					<input type="number" class="form-control " id="price" name="price" title="Please provide the decimal value also"
						placeholder="e.g. 123.00" value="<?= set_value('price',$menu->food_price)?>" required>
					<sapn class="text-danger"><?php echo form_error('price') ?></sapn>
				</div>
				<div class="form-group">
					<label for="description">Menu Description</label>
					<textarea class="form-control " id="description" name="description"
						rows="3"><?= set_value('description',$menu->food_desc)?></textarea>
					<sapn class="text-danger"><?php form_error('description') ?></sapn>
				</div>
				<div class="form-group">
					<label for="exampleInputFile">Menu Image</label>
					<input type="file" class="form-control-file" id="image" name="image"
						value="<?= set_value('image')?>" aria-describedby="fileHelp">
					<sapn class="text-danger"><?php form_error('image') ?></sapn>
				</div>
			</fieldset>

			<fieldset class="form-group">
				<legend>Menu Type</legend>
				<label class="radio-inline">
					<input type="radio" name="type" value="1" <?php echo set_value('type',$menu->type) == 1 ? "checked" : ""; ?>
						required>Veg
				</label>
				<label class="radio-inline">
					<input type="radio" name="type" value="2" <?php echo set_value('type',$menu->type) == 2 ? "checked" : ""; ?>
						required>Non-veg
				</label>
			</fieldset>
			<button type="submit" class="btn btn-primary">Update &nbsp;Menu</button>
			<a href="<?= base_url('admin') ?>" class="btn btn-warning float-right">Cancel</a>
			</fieldset>
		</form>
	</div>

</div>

<?php include('partials/footer.php'); ?>
