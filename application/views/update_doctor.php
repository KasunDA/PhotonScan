<!-- Begin of #main -->
<div id="main" role="main">
	<!-- Begin of titlebar/breadcrumbs -->
	<div id="title-bar">
		<ul id="breadcrumbs">
			<li>
				<a href="<?php echo site_url('web/home') ?>" title="Home"><span id="bc-home"></span></a>
			</li>
			<li>
				<a href="<?php echo site_url('web/doctors') ?>"> Doctors </a>
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
						<h1>Doctor Details</h1><span></span>
					</div>
					<form id="validate-form" class="block-content form" action="<?php echo site_url('web/update_doctor_done'); ?>" method="post" enctype="multipart/form-data">
						<div class="_50">
							<p>
								<label for="textfield">Name</label>
								<input id="name" name="name" class="required" type="text" value="<?php echo $doctor['name']; ?>" />
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="textfield">Phone</label>
								<input id="phone" name="phone" class="required" type="text" value="<?php echo $doctor['phone']; ?>" />
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="textfield">Zone</label>
								<input id="zone" name="zone" class="required" type="text" value="<?php echo $doctor['zone']; ?>" />
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="datepicker">Date</label>
								<input id="datepicker2" name="date" class="required" type="text" value="<?php echo $doctor['date']; ?>" />
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="select">Has Internet Service</label>
								<select name="has_internet_service">
									<?php if ($doctor['has_internet_service'] == "yes"): ?>
									<option value="yes" selected="">Yes</option>
									<option value="no">No</option>
									<?php else: ?>
									<option value="yes">Yes</option>
									<option value="no" selected="">No</option>
									<?php endif ?>
								</select>
							</p>
						</div>
						
						<div class="clear"></div>
						<div class="block-actions">
							<ul class="actions-right">
								<li>
									<input type='hidden' name='id' value="<?php echo $doctor['id']; ?>" />
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