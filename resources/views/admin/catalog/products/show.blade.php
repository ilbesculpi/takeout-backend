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

		<div class="box">

			<div class="box-header with-border">

				<h3 class="box-title">Products</h3>

			</div>

			<div class="box-body">
				
				<?php dump($product); ?>
				
			</div>
			
		</div>
		
	</section>
	
</div>

@endsection