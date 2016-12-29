@extends('admin.layouts.default')

@section('title', 'Products')

@section('content')

<div class="content-wrapper">
	
	<section class="content-header">
		<h1>
			<i class="fa fa-cubes"></i>
			Products
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
				<i class="fa fa-cubes"></i>
				Products
			</li>
		</ol>
	</section>
	
	<section class="content">
		
		<div class="row margin-bottom">
			<div class="col-xs-12">
				<a href="<?= url('admin/catalog/products/create') ?>" class="btn btn-sm btn-flat btn-primary">
					Add New Product
				</a>
			</div>
		</div>
		
		<div class="box">
			
			<div class="box-header with-border">
				
				<h3 class="box-title">Products</h3>
				
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
				</div>
				
			</div>
			
			<div class="box-body">
				
				<?php if( $products->count() ): ?>
				<table class="table">
					<?php dump($products); ?>
				</table>
				<?php else: ?>
				<div class="alert alert-warning">No products found.</div>
				<?php endif; ?>
			</div>
			<div class="box-footer">
				Footer
			</div>
		</div>
		<!-- /.box -->

	</section>
	
</div>

@endsection