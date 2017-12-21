<!-- Begin of #main -->
<div id="main" role="main">
	<!-- Begin of titlebar/breadcrumbs -->
	<div id="title-bar">
		<ul id="breadcrumbs">
			<li>
				<a href="<?php echo site_url('web/home');?>" title="Home"><span id="bc-home"></span></a>
			</li>
			<li class="no-hover">
				Income
			</li>
		</ul>
	</div>
	<!--! end of #title-bar -->
	<div class="shadow-bottom shadow-titlebar"></div>
	<!-- Begin of #main-content -->
	<div id="main-content">
		<div class="container_12">
			<div class="grid_12">
				<h3>Please fill the following form</h3>
			</div>
			<div class="grid_12">
				<div class="block-border">
					<div class="block-header">
						<h1>Filter by Date</h1><span></span>
					</div>
					<form id="validate-form" class="block-content form" action="<?php  echo site_url('web/income_done');?>" method="post" enctype="multipart/form-data">
						<div class="_25" style="margin-left: 150px">
							<p>
								<label for="datepicker">From Date</label>
								<input id="datepicker" name="from_date" class="required" type="text" value="<?php  if(isset($from_date))echo $from_date;?>" />
							</p>
						</div>
						<div class="_25">
							<p>
								<label for="datepicker">To Date</label>
								<input id="datepicker2" name="to_date" class="required" type="text" value="<?php  if(isset($to_date))echo $from_date;?>" />
							</p>
						</div>
						<div class="_25">
							<p>
								<label for="income"> income</label>
								<input id="text" name="income" class="" type="text" value="<?php  if(isset($income))echo $income;?>" readonly="" />
							</p>
						</div>
						<div class="clear"></div>
						<div class="block-actions">
							<ul class="actions-right">
								<li>
									<input type="submit" class="button" value="Filter">
								</li>
							</ul>
						</div>
					</form>
				</div>
			</div>
			<div class="grid_12">
				<div class="block-border">
					<div class="block-header">
						<h1>Patients</h1><span></span>
					</div>
					<div class="block-content">
						<table id="table-example" class="table">
							<thead>
								<tr>
									<th>name</th>
									<th>doctor</th>
									<th>Gender</th>
									<th>Age</th>
									<th>Phone</th>
									<th>Address</th>
									<th>date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($patients as $patient):?>
								<tr class="gradeX">
									<td class="center"><a href="<?php  echo site_url("web/update_patient/$patient[id]");?>"><?php   echo $patient['name'];?></a></td>
									<td class="center"><a href="<?php  echo site_url("web/update_doctor/$patient[doctor_id]");?>"><?php   echo $patient['doctor_name'];?></a></td>
									<td class="center"><?php   echo $patient['gender'];?></td>
									<td class="center"><?php   echo $patient['age'];?></td>
									<td class="center"><?php   echo $patient['phone'];?></td>
									<td class="center"><?php   echo $patient['address'];?></td>
									<td class="center"><?php   echo $patient['date'];?></td>
								</tr>
								<?php   endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="grid_12">
				<div class="block-border">
					<div class="block-header">
						<h1>Doctors</h1><span></span>
					</div>
					<div class="block-content">
						<table id="table-example2" class="table">
							<thead>
								<tr>
									<th>name</th>
									<th>phone</th>
									<th>Zone</th>
									<th>has internet service</th>
									<th>date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($doctors as $doctor):
								?>
								<tr class="gradeX">
									<td class="center"><a href="<?php  echo site_url("web/update_doctor/$doctor[id]");?>"><?php   echo $doctor['name'];?></a></td>
									<td class="center"><?php   echo $doctor['phone'];?></td>
									<td class="center"><?php   echo $doctor['zone'];?></td>
									<td class="center"><?php   echo $doctor['has_internet_service'];?></td>
									<td class="center"><?php   echo $doctor['date'];?></td>
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="clear height-fix"></div>
				<p></p>
			</div>
			<div class="clear height-fix"></div>
		</div>
	</div>
	<!--! end of #main-content -->
</div>
<!--! end of #main -->