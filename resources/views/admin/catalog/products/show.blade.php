@extends('admin.layouts.default')

@section('title', $product->title)

@section('content')

<div class="content-wrapper">
	
	<section class="content-header">
		<h1>
			<i class="fa fa-cubes"></i>
			Products
			<small><?= $product->sku ?></small>
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
				<?= $product->sku ?>
			</li>
		</ol>
	</section>
	
	<section class="content">
		
		<div class="row margin-bottom">
			<div class="col-xs-12">
				<a href="<?= route('admin::products.edit', compact('product')) ?>" class="btn btn-default btn-flat">
					Edit Product
				</a>
				<form action="<?= route('admin::products.destroy', compact('product')) ?>" method="post" style="display:inline;">
					<?= csrf_field() ?>
					<?= method_field('DELETE') ?>
					<button type="submit" class="btn btn-danger btn-flat">Delete</button>
				</form>
			</div>
		</div>

		<div class="box">

			<div class="box-header with-border">

				<h3 class="box-title"><?= $product->title ?></h3>
				
				<div class="box-tools pull-right">
					<a href="#" class="btn btn-box-tool">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-box-tool">
						<i class="fa fa-trash-o"></i>
					</a>
				</div>

			</div>

			<div class="box-body">
				
				<div class="row margin-bottom">
					<div class="col-xs-6 col-sm-3">
						<img class="img-responsive" src="<?= $product->imageUrl ?>" alt="<?= $product->title ?>" />
					</div>
					<div class="col-xs-6 col-sm-9">
						<table class="table">
							<tr>
								<th>Categories</th>
								<td><?= $product->categories->implode('name', ', '); ?></td>
							</tr>
							<tr>
								<th>SKU</th>
								<td><?= $product->sku ?></td>
							</tr>
							<tr>
								<th>Title</th>
								<td><?= $product->title ?></td>
							</tr>
							<tr>
								<th>Description</th>
								<td><?= $product->description ?></td>
							</tr>
							<tr>
								<th>Price</th>
								<td><?= $product->formatPrice ?></td>
							</tr>
							<tr>
								<th>Quantity</th>
								<td><?= $product->stock_quantity ?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td class="<?= $product->isEnabled() ? 'text-success' : 'text-danger' ?>"><?= $product->status ?></td>
							</tr>
						</table>
					</div>
				</div>
				
			</div>
			
		</div>
		
	</section>
	
</div>

@endsection