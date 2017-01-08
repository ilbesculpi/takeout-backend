@extends('admin.layouts.default')

@section('title', 'Products')

<?php
	$form_action = $action === 'create' ? route('admin::products.store') : route('admin::products.update', compact('product'));
	$form_method = $action === 'create' ? 'post' : 'put';
?>

@section('content')

<div class="content-wrapper">
	
	<section class="content-header">
		<h1>
			<i class="fa fa-cubes"></i>
			Products
			<small><?= ucfirst($action) ?></small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?= route('admin::dashboard') ?>">
					<i class="fa fa-dashboard"></i>
					Dashboard
				</a>
			</li>
			<li>
				<a href="<?= route('admin::products.index') ?>">
					<i class="fa fa-cubes"></i>
					Products
				</a>
			</li>
			<li class="active">
				<?= ucfirst($action) ?>
			</li>
		</ol>
	</section>
	
	<form id="form-create-chapter" action="<?= $form_action ?>" method="post" enctype="multipart/form-data" role="form">
	
		<?= csrf_field() ?>
		<?= method_field($form_method) ?>
		
		<input type="hidden" name="id" value="<?= $product->id ?>" />
		
		<section class="content">

			<div class="box">

				<div class="box-header with-border">

					<h3 class="box-title">Products</h3>

				</div>
				
				<div class="box-body">
					
					<div class="form-group form-group-lg has-feedback">
						<label for="sku">SKU</label>
						<input type="text" id="sku" name="sku" class="form-control" 
							value="<?= $product->sku ?>" placeholder="SKU" maxlength="32" required>
					</div>
					
					<div class="form-group form-group-lg has-feedback">
						<label for="title">Title</label>
						<input type="text" id="title" name="title" class="form-control" 
							value="<?= $product->title ?>" placeholder="Product Title" maxlength="128" required>
					</div>
					
					<div class="form-group has-feedback">
						<label for="categories">Categories</label>
						<select id="categories" name="categories[]" class="form-control selectpicker" multiple>
							<?php foreach($categories as $category): ?>
							<option value="<?= $category->id ?>" <?= $product->categories->contains('id', $category->id) ? 'selected' : '' ?>><?= $category->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					
					<div class="form-group has-feedback">
						<label for="description">Description</label>
						<textarea id="description" name="description" class="form-control"><?= $product->description ?></textarea>
					</div>
					
					<div class="form-group has-feedback">
						<label for="price">Price</label>
						<input type="text" id="price" name="price" class="form-control" 
							value="<?= $product->price ?>" placeholder="0.00">
					</div>
					
					<div class="form-group has-feedback">
						<label for="image">Image</label>
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<img src="<?= $product->imageUrl ?>" width="100%" />
							</div>
							<div class="col-sm-12">
								<p class="help-block">
									Suggested image size: 640x480.<br>
									Valid files: jpg, jpeg and png files. Max file size: 500k.
								</p>
								<input type="file" id="image" name="image" accept="image/*" />
							</div>
						</div>
					</div>
					
				</div>
				
				<div class="box-footer">
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Save" />
						<a href="<?= route('admin::products.index') ?>" class="btn btn-default">Cancel</a>
					</div>
				</div>

			</div>

		</section>
		
	</form>
	
</div>

@endsection


@section('styles')
<link rel="stylesheet" href="/themes/admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
@endsection

@section('scripts')
<script src="/themes/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/themes/admin/vendor/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script>
	$( document ).ready(function() {
		console.log('ready');
		$('#price').inputmask('9{1,4}.99', { numericInput: true });    //123456  =>  $234.56
	});
</script>
@endsection
