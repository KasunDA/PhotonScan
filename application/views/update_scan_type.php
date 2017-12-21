<!-- Begin of #main -->
<div id="main" role="main">
	<!-- Begin of titlebar/breadcrumbs -->
	<div id="title-bar">
		<ul id="breadcrumbs">
			<li>
			<a href="<?php echo site_url('web/home'); ?>" title="Home"><span id="bc-home"></span></a>
			</li>
			<li>
				<a href="<?php echo site_url('web/scan_types'); ?>"> Scan Types</a>
			</li>
			<li class="no-hover">
				Update
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
						<h1>Scan Type Details</h1><span></span>
					</div>
					<form id="validate-form" class="block-content form" action="<?php echo site_url('web/update_scan_type_done') ?>" method="post" enctype="multipart/form-data">
						<div class="_100">
							<p>
								<label for="textfield">Scan Type</label>
								<input id="name" name="type" class="required" type="text" value="<?php echo $scan_type['type']?>" />
							</p>
						</div>
						<?php foreach($scan_types as $type): ?>
						<div class="_25">
							<p>
								<label for="textfield"><?php echo $type['payment_type'] ?></label>
								<input id="name" name="<?php echo $type['payment_type_id'] ?>" class="required" type="text" value="<?php echo $type['amount'] ?>" />
							</p>
						</div>
						<?php endforeach; ?>
						<div class="clear"></div>
						<div class="block-actions">
							<ul class="actions-right">
								<li>
									<input type="hidden" name="id" value="<?php echo $scan_type['id']?>" />
									<input type="submit" class="button" value="Update">
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