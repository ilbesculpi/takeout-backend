<?php if( session('success') ): ?>
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p><?= session('success') ?></p>
</div>
<?php endif; ?>

<?php if( session('message') ): ?>
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p><?= session('message') ?></p>
</div>
<?php endif; ?>

<?php if( session('error') ): ?>
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p><?= session('error') ?></p>
</div>
<?php endif; ?>

<?php if( session('errors') ): ?>
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?php foreach( session('errors')->all() as $error ): ?>
	<p><?= $error ?></p>
	<?php endforeach; ?>
</div>
<?php endif; ?>