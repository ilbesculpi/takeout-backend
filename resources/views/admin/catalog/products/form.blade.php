@extends('admin.layouts.default')

@section('title', 'Products')

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
				<a href="<?= url('admin/catalog/products') ?>">
					<i class="fa fa-cubes"></i>
					Products
				</a>
			</li>
			<li class="active">
				<?= ucfirst($action) ?>
			</li>
		</ol>
	</section>
	
	<form id="form-create-chapter" action="<?= url('admin/catalog/products/save') ?>" method="post" enctype="multipart/form-data" role="form">
	
		<?= csrf_field() ?>
		
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
						<select class="form-control selectpicker" multiple>
							<option>Breakfast</option>
							<option>Lunch</option>
							<option>Dinner</option>
							<option>Sweets</option>
						</select>
					</div>
					
					<div class="form-group has-feedback">
						<label for="description">Description</label>
						<textarea id="description" name="description" class="form-control"><?= $product->description ?></textarea>
					</div>
					
					<div class="form-group has-feedback">
						<label for="price">Price</label>
						<input type="number" id="price" name="price" class="form-control" 
							value="<?= $product->price ?>" placeholder="0.00">
					</div>
					
				</div>
				
				<div class="box-footer">
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Save" />
						<a href="<?= url('admin/catalog/products') ?>" class="btn btn-default">Cancel</a>
					</div>
				</div>

			</div>

		</section>
		
	</form>
	
</div>

@endsection