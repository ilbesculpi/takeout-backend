@extends('admin.layouts.default')

@section('title', 'Categories')

@section('content')

<div class="content-wrapper">
	
	<section class="content-header">
		<h1>
			<i class="fa fa-tags"></i>
			Categories
			<small>Listing</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?= route('admin::dashboard') ?>">
					<i class="fa fa-dashboard"></i>
					Dashboard
				</a>
			</li>
			<li class="active">
				<i class="fa fa-tags"></i>
				Categories
			</li>
		</ol>
	</section>
	
	<section class="content">
		
		<div class="row margin-bottom">
			<div class="col-xs-12">
				<a href="<?= route('admin::categories.create') ?>" class="btn btn-default btn-flat">
					Add New Category
				</a>
			</div>
		</div>
		
		<div class="box">
			
			<div class="box-header with-border">
				
				<h3 class="box-title">Category Listing</h3>
				
			</div>
			
			<div class="box-body">
				
				<?php if( $categories->count() ): ?>
				<table class="table table-striped">
					<tr>
						<th>Name</th>
						<th>Status</th>
					</tr>
					<?php foreach($categories as $category): ?>
					<tr>
						<td>
							<a href="<?= route('admin::categories.show', ['category' => $category]) ?>">
								<?= $category->name ?>
							</a>
						</td>
						<td class="<?= $category->isEnabled() ? 'text-success' : 'text-danger' ?>"><?= $category->status ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				<?php else: ?>
				<div class="alert alert-warning">No categories found.</div>
				<?php endif; ?>
				
			</div>
			
		</div>
		
	</section>
	
</div>

@endsection