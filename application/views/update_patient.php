<!-- Begin of #main -->
<div id="main" role="main">
	<!-- Begin of titlebar/breadcrumbs -->
	<div id="title-bar">
		<ul id="breadcrumbs">
			<li>
				<a href="<?php echo site_url('web/home') ?>" title="Home"><span id="bc-home"></span></a>
			</li>
			<li>
				<a href="<?php echo site_url('web/patients') ?>"> Patients </a>
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
						<h1>Patient Details</h1><span></span>
					</div>
					<form id="validate-form" class="block-content form" action="<?php echo site_url('web/update_patient_done'); ?>" method="post" enctype="multipart/form-data">
						<div class="_50">
							<p>
								<label for="textfield">Name</label>
								<input id="name" name="name" class="required" type="text" value="<?php echo $patient['name'] ?>" />
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="textfield">Age</label>
								<input id="age" name="age" class="required" type="text" value="<?php echo $patient['age'] ?>" />
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="select">Gender</label>
								<select name="gender">
									<?php if ($patient['gender'] == "male"): ?>
									<option value="male" selected="">Male</option>
									<option value="female">Female</option>
									<?php else: ?>
									<option value="male">Male</option>
									<option value="female" selected="">Female</option>
									<?php endif ?>
								</select>
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="textfield">Phone</label>
								<input id="phone" name="phone" class="required" type="text" value="<?php echo $patient['phone'] ?>" />
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="textfield">Address</label>
								<textarea id="address" name="address" class="required" type="text"> <?php echo $patient['address'] ?></textarea>
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="datepicker">Date</label>
								<input id="datepicker2" name="date" class="required" type="text" value="<?php echo $patient['date'] ?>" />
							</p>
						</div>
						<div class="_100">
						<?php foreach($doctors as $doctor):?>
							<?php if($patient['doctor_id'] == $doctor['id']): ?>
						<label for="radio">Doctor (<?php echo "current:".$doctor['name'] ?>)</label>
						<?php break; ?>
							<?php endif; ?>
						<?php endforeach; ?>
						<div class="block-content">
							<table id="table-example" class="table">
								<thead>
									<tr>
										<th>name</th>
										<th>Zone</th>
										<th>Phone</th>
										<th>date</th>
										<th>Choose</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($doctors as $doctor):?>
									<tr class="gradeX">
										<td class="center"><a href="#"><?php echo $doctor['name'];?></a></td>
										<td class="center"><?php echo $doctor['zone'];?></td>
										<td class="center"><?php echo $doctor['phone'];?></td>
										<td class="center"><?php echo $doctor['date'];?></td>
										<td> <input type="radio" name='doctor_id' id='doctor_id' value="<?php echo $doctor['id']; ?>" <?php if($patient['doctor_id'] == $doctor['id']) echo "checked";?>> </td>
									</tr>
									<?php endforeach; ?>
									</tbody>									
								</tbody>
							</table>
						</div>
						</div>
						<div class="_100">
						<br>
						<br>	
						</div>
						
						<div class="_100">
						<label for="radio">Scans <a href="<?php echo site_url("web/add_scan/$patient[id]"); ?>">[Add New Scan]<img src="http://zwlhost.com/jewelmenow/backend_includes/img/icons/packs/fugue/16x16/blog--plus.png"/></a></label>
						<div class="block-content">
							<table id="table-example2" class="table">
								<thead>
									<tr>
										<th>Scan Type</th>
										<th>Payment Method</th>
										<th>Amount</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($scans as $scan): ?>
									<tr class="gradeX">
										<td class="center"> <?php echo $scan['scan_type'] ?></td>
										<td class="center"><?php echo $scan['payment_type'] ?></td>
										<td class="center"><?php echo $scan['amount'] ?></td>
										<td class="center"> <?php echo $scan['date'] ?></td>										
									</tr>							
									<?php endforeach; ?>	
									</tbody>
							</table>
						</div>
						</div>
												
						<div class="_100">
						</br>
						</br>
						</div>
						<div class="clear"></div>
						<div class="block-actions">
							<ul class="actions-right">
								<li>
									<input type='hidden' name='id' value="<?php echo $patient['id']; ?>" />
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