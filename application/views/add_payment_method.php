<!-- Begin of #main -->
<div id="main" role="main">
	<!-- Begin of titlebar/breadcrumbs -->
	<div id="title-bar">
		<ul id="breadcrumbs">
			<li>
				<a href="<?php echo site_url('web/home'); ?>" title="Home"><span id="bc-home"></span></a>
			</li>
			<li>
				<a href="<?php echo site_url('web/payment_methods'); ?>"> Payment Methods</a>
			</li>
			<li class="no-hover">
				Add New
			</li>
		</ul>
	</div>
	<!--! end of #title-bar -->
	<div class="shadow-bottom shadow-titlebar"></div>
	<!-- Begin of #main-content -->
	<div id="main-content">
		<div class="container_12">
			<div class="grid_12">
				<p>
					<h3>Please fill the following form</h3>
				</p>
			</div>
			<div class="grid_12">
				<div class="block-border">
					<div class="block-header">
						<h1>Payment Method Details</h1><span></span>
					</div>
					<form id="validate-form" class="block-content form" action="<?php echo site_url('web/add_payment_method_done') ?>" method="post" enctype="multipart/form-data">
						<div class="_100">
							<p>
								<label for="textfield">Payment Method</label>
								<input id="name" name="type" class="required" type="text" value="" />
							</p>
						</div>
						<?php foreach($scan_types as $type): ?>
						<div class="_25">
							<p>
								<label for="textfield"><?php echo $type['type'] ?></label>
								<input id="name" name="<?php echo $type['id'] ?>" class="required" type="text" value="" />
							</p>
						</div>
						<?php endforeach; ?>
						<div class="clear"></div>
						<div class="block-actions">
							<ul class="actions-right">
								<li>
									<input type="submit" class="button" value="Add">
								</li>
							</ul>
						</div>
					</form>
				</div>
			</div>
			<div class="clear height-fix"></div>
		</div>
	</div>
	<!--! end of #main-content -->
</div>
<!--! end of #main -->