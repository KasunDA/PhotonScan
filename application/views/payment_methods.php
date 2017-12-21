<!-- Begin of #main -->
<div id="main" role="main">
	<!-- Begin of titlebar/breadcrumbs -->
	<div id="title-bar">
		<ul id="breadcrumbs">
			<li>
				<a href="<?php echo site_url('web/home') ?>" title="Home"><span id="bc-home"></span></a>
			</li>
			<li class="no-hover">
				Payment Methods
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
				<h3>Select or add a new Payment Method</h3>
			</div>
			<div class="grid_12">
				<div class="grid_12">
					<div class="block-border">
						<div class="block-header">
							<h1>Payment Methods <a href="<?php echo site_url('web/add_payment_method'); ?>">[Add New Method]<img src="http://zwlhost.com/jewelmenow/backend_includes/img/icons/packs/fugue/16x16/blog--plus.png"/></a></h1><span></span>
						</div>
						<div class="block-content">
							<table id="table-example" class="table">
								<thead>
									<tr>
										<th>Payment Method</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($payment_types as $type): ?>
									<tr class="gradeX">
										<td class="center"><a href="<?php echo site_url("web/update_payment_method/$type[id]"); ?>"><?php echo $type['type']?></a></td>
									</tr>
									<?php endforeach ?>
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