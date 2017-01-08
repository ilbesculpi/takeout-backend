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
				<a href="<?= route('admin::products.create') ?>" class="btn btn-default btn-flat">
					Add New Product
				</a>
			</div>
		</div>
		
		<div class="box">
			
			<div class="box-header with-border">
				
				<h3 class="box-title">Product Catalog</h3>
				
			</div>
			
			<div class="box-body">
				
				<?php if( $products->count() ): ?>
				<table class="table table-striped">
					<tr>
						<th>Image</th>
						<th>SKU</th>
						<th>Title</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Status</th>
						<th>&nbsp;</th>
					</tr>
					<?php foreach($products as $product): ?>
					<tr>
						<td width="100">
							<a href="<?= route('admin::products.show', ['product' => $product]) ?>">
								<img src="<?= $product->imageUrl ?>" class="img-responsive" />
							</a>
						</td>
						<td><?= $product->sku ?></td>
						<td><?= $product->title ?></td>
						<td><?= $product->stock_quantity ?></td>
						<td><?= $product->format_price ?></td>
						<td class="<?= $product->isEnabled() ? 'text-success' : 'text-danger' ?>"><?= $product->status ?></td>
						<td>
							<a href="<?= route('admin::products.show', ['product' => $product]) ?>">
								View
							</a>
						</td>
					</tr>
					<?php endforeach; ?>
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