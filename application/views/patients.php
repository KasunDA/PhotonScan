<!-- Begin of #main -->
<div id="main" role="main">
	<!-- Begin of titlebar/breadcrumbs -->
	<div id="title-bar">
		<ul id="breadcrumbs">
			<li>
				<a href="home" title="Home"><span id="bc-home"></span></a>
			</li>
			<li class="no-hover">
				Patients
			</li>
		</ul>
	</div>
	<!--! end of #title-bar -->
	<div class="shadow-bottom shadow-titlebar">
	</div>
	<!-- Begin of #main-content -->
	<div id="main-content">
		<div class="container_12">
			<div class="grid_12">
				<h3>Select or add a new patient</h3>
			</div>
			<div class="grid_12">
				<div class="grid_12">
					<div class="block-border">
						<div class="block-header">
							<h1>Patients <a href="<?php echo site_url('web/add_patient'); ?>">[Add New Patient]<img src="http://zwlhost.com/jewelmenow/backend_includes/img/icons/packs/fugue/16x16/blog--plus.png"/></a></h1><span></span>
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
										<td class="center"><a href="<?php echo site_url("web/update_patient/$patient[id]"); ?>"><?php echo $patient['name'];?></a></td>
										<td class="center"><a href="<?php echo site_url("web/update_doctor/$patient[doctor_id]"); ?>"><?php echo $patient['doctor_name'];?></a></td>
										<td class="center"><?php echo $patient['gender'];?></td>
										<td class="center"><?php echo $patient['age'];?></td>
										<td class="center"><?php echo $patient['phone'];?></td>
										<td class="center"><?php echo $patient['address'];?></td>
										<td class="center"><?php echo $patient['date'];?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
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