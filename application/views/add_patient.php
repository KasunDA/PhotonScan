<!-- Begin of #main -->
<div id="main" role="main">
	<!-- Begin of titlebar/breadcrumbs -->
	<div id="title-bar">
		<ul id="breadcrumbs">
			<li>
				<a href="<?php echo site_url('web/home');?>" title="Home"><span id="bc-home"></span></a>
			</li>
			<li>
				<a href="<?php echo site_url('web/patients');?>"> Patients </a>
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
						<h1>Patient Details</h1><span></span>
					</div>
					<form id="validate-form" class="block-content form" action="<?php echo site_url('web/add_patient_done')?>" method="post" enctype="multipart/form-data">
						<div class="_50">
							<p>
								<label for="textfield">Name</label>
								<input id="name" name="name" class="required" type="text" value="" />
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="textfield">Age</label>
								<input id="age" name="age" class="required" type="text" value="" />
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="select">Gender</label>
								<select name="gender">
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="textfield">Phone</label>
								<input id="phone" name="phone" class="required" type="text" value="" />
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="textfield">Address</label>
								<textarea id="address" name="address" class="required" type="text"></textarea>
							</p>
						</div>
						<div class="_50">
							<p>
								<label for="datepicker">Date</label>
								<input id="datepicker" name="date" class="required" type="text" value="" />
							</p>
						</div>
						<div class="_100">
						<label for="radio">Doctor</label>
						<div class="block-content">
							<table id="table-example" class="table">
								<thead>
									<tr>
										<th>id</th>
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
										<td class="center"><a href="#"><?php echo $doctor['id'];?></a></td>
										<td class="center"><a href="#"><?php echo $doctor['name'];?></a></td>
										<td class="center"><?php echo $doctor['zone'];?></td>
										<td class="center"><?php echo $doctor['phone'];?></td>
										<td class="center"><?php echo $doctor['date'];?></td>
										<td> <input type="radio" name='doctor_id' id='doctor_id' value="<?php echo $doctor['id']; ?>"> </td>
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