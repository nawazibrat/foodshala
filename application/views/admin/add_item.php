<?php include('partials/header.php'); ?>

<div class="jumbotron bg-default">
	<div class="text-center">
		<fieldset>
			<legend>Add New Menu Item</legend>
		</fieldset>
		<hr>
	</div>
	<div class="d-flex justify-content-center">
		<form action="<?= base_url('admin/store_item') ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="form-group">
					<label for="name">Menu Name</label>
					<input type="hidden" id="id" name="id" value="<?= $this->session->userdata('id') ?>" required>
					<input class="form-control " id="name" name="name" value="<?= set_value('name')?>" >
					<sapn class="text-danger"><?php echo form_error('name') ?></sapn>
				</div>
				<div class="form-group">
					<label for="price">Menu Price</label>
					<input class="form-control " id="price" name="price" title="Please provide the decimal value also" placeholder="e.g. 123.00" value="<?= set_value('price')?>" >
					<sapn class="text-danger"><?php echo form_error('price') ?></sapn>
				</div>
				<div class="form-group">
					<label for="description">Menu Description</label>
					<textarea class="form-control " id="description" name="description"
						rows="3"><?= set_value('description')?></textarea>
					<sapn class="text-danger"><?php form_error('description') ?></sapn>
				</div>
				<div class="form-group">
					<label for="exampleInputFile">Menu Image</label>
					<input type="file" class="form-control-file" id="image" name="image"
						value="<?= set_value('image')?>" aria-describedby="fileHelp">
					<sapn class="text-danger"><?php if(isset($upload_error)) echo $upload_error ?></sapn>
				</div>
			</fieldset>

			<fieldset class="form-group">
				<legend>Menu Type</legend>
				<label class="radio-inline">
                    <input type="radio" name="type" value="1" <?php echo set_value('type') == 1 ? "checked" : ""; ?> required>Veg
				</label>
				<label class="radio-inline">
					<input type="radio" name="type" value="2" <?php echo set_value('type') == 2 ? "checked" : ""; ?> required>Non-veg
				</label>
			</fieldset>
			<button type="submit" class="btn btn-primary">Add &nbsp;To &nbsp;Menu</button>
			<a href="<?= base_url('admin') ?>" class="btn btn-warning float-right">Cancel</a>
			</fieldset>
		</form>
	</div>

</div>

<?php include('partials/footer.php'); ?>
