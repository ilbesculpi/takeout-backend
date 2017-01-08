@extends('admin.layouts.default')

@section('title', 'Categories')

<?php
	$form_action = $action === 'create' ? route('admin::categories.store') : route('admin::categories.update', compact('category'));
	$form_method = $action === 'create' ? 'post' : 'put';
?>

@section('content')

<div class="content-wrapper">
	
	<section class="content-header">
		<h1>
			<i class="fa fa-tags"></i>
			Categories
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
				<a href="<?= route('admin::categories.index') ?>">
					<i class="fa fa-tags"></i>
					Categories
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
		
		<input type="hidden" name="id" value="<?= $category->id ?>" />
		
		<section class="content">

			<div class="box">

				<div class="box-header with-border">

					<h3 class="box-title">Categories</h3>

				</div>
				
				<div class="box-body">
					
					<div class="form-group form-group-lg">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" class="form-control" 
							value="<?= $category->name ?>" placeholder="Category Name" maxlength="64" required>
					</div>
					
					<div class="form-group">
						<label for="description">Description</label>
						<textarea id="description" name="description" class="form-control"><?= $category->description ?></textarea>
					</div>
					
					<div class="form-group">
						<label for="status">Status</label>
						<select id="status" name="status" class="form-control">
							<option value="enabled" <?= $category->isEnabled() ? 'selected' : '' ?>>Enabled</option>
							<option value="disabled" <?= $category->isDisabled() ? 'selected' : '' ?>>Disabled</option>
						</select>
					</div>
					
				</div>
				
				<div class="box-footer">
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Save" />
						<a href="<?= route('admin::categories.index') ?>" class="btn btn-default">Cancel</a>
					</div>
				</div>

			</div>

		</section>
		
	</form>
	
</div>

@endsection
