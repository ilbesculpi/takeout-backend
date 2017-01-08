@extends('admin.layouts.default')

@section('title', $category->name)

@section('content')

<div class="content-wrapper">
	
	<section class="content-header">
		<h1>
			<i class="fa fa-tags"></i>
			Categories
			<small><?= $category->name ?></small>
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
				<?= $category->name ?>
			</li>
		</ol>
	</section>
	
	<section class="content">
		
		<div class="row margin-bottom">
			<div class="col-xs-12">
				<a href="<?= route('admin::categories.edit', compact('category')) ?>" class="btn btn-default btn-flat">
					Edit Category
				</a>
				<form action="<?= route('admin::categories.destroy', compact('category')) ?>" method="post" style="display:inline;">
					<?= csrf_field() ?>
					<?= method_field('DELETE') ?>
					<button type="submit" class="btn btn-danger btn-flat" data-confirm="Are you sure you want to delete this Category?">Delete</button>
				</form>
			</div>
		</div>

		<div class="box">

			<div class="box-header with-border">

				<h3 class="box-title"><?= $category->name ?></h3>
				
				<div class="box-tools pull-right">
					<a href="<?= route('admin::categories.edit', compact('category')) ?>" class="btn btn-box-tool">
						<i class="fa fa-edit"></i>
					</a>
					<form action="<?= route('admin::categories.destroy', compact('category')) ?>" method="post" style="display:inline;">
						<?= csrf_field() ?>
						<?= method_field('DELETE') ?>
						<button type="submit" class="btn btn-box-tool" 
								data-confirm="Are you sure you want to delete this Category?">
							<i class="fa fa-trash-o text-danger"></i>
						</button>
					</form>
				</div>

			</div>

			<div class="box-body">
				
				<div class="row margin-bottom">
					<div class="col-xs-12">
						<table class="table">
							<tr>
								<th>Name</th>
								<td><?= $category->name; ?></td>
							</tr>
							<tr>
								<th>Parent</th>
								<td><?= $category->parent ? $category->parent->name : '' ?></td>
							</tr>
							<tr>
								<th>Description</th>
								<td><?= $category->description ?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td class="<?= $category->isEnabled() ? 'text-success' : 'text-danger' ?>"><?= $category->status ?></td>
							</tr>
						</table>
					</div>
				</div>
				
			</div>
			
		</div>
		
	</section>
	
</div>

@endsection