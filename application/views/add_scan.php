<!-- Begin of #main -->
<div id="main" role="main">
	<!-- Begin of titlebar/breadcrumbs -->
	<div id="title-bar">
		<ul id="breadcrumbs">
			<li>
				<a href="home" title="Home"><span id="bc-home"></span></a>
			</li>
			<li>
				<a href="<?php echo site_url('web/patients') ?>"> Patients </a>
			</li>
			<li>
				<a href="<?php echo site_url("web/update_patient/$patient[id]") ?>"> <?php echo $patient['name'];?> </a>
			</li>
			<li class="no-hover">
				Add Scan
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
						<h1>Scan Details</h1><span></span>
					</div>
					<form id="validate-form" class="block-content form" action="<?php echo site_url('web/add_scan_done'); ?>" method="post" enctype="multipart/form-data">
						<div class="_25">
							<p>
								<label for="select">Scan Type</label>
								<select name="scan_type_id">
									<?php foreach ($scan_types as $type): ?>
										<option value="<?php echo $type['id']?>"> <?php echo $type['type']; ?> </option>
									<?php endforeach ?>
								</select>
							</p>
						</div>
						
						<div class="_25">
							<p>
								<label for="select">Payment Method</label>
								<select name="payment_type_id">
									<?php foreach ($payment_types as $type): ?>
										<option value="<?php echo $type['id']?>"> <?php echo $type['type']; ?> </option>
									<?php endforeach ?>
								</select>
							</p>
						</div>
						<div class="_25">
							<p>
								<label for="datepicker">Date</label>
								<input id="datepicker" name="date" class="required" type="text" value="" />
							</p>
						</div>
						<div class="clear"></div>
						<div class="block-actions">
							<ul class="actions-right">
								<li>
									<input type="hidden" name="patient_id" value="<?php echo $patient['id']; ?>" />
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