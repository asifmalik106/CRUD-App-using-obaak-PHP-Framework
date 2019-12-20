<body>
	<a href="<?php echo BASE_URL; ?>"><h3 class="text-center">obaak CRUD</h3></a>
	<div class="container"> 
		<div class="row">
			<div class="col-md-offset-1 col-md-4">
				<h3 class="text-center">Submit Information</h3>
				<p class="success text-center"><?php echo (isset($data['form']['message']) ? $data['form']['message'] : '');?></p>
				<div class="panel panel-default">
					<div class="panel-body">
		    			<form action="<?php echo BASE_URL;?>home/submit" method="POST">
		    				<div class="form-group">
								<label>Name<small class="error"><?php echo (isset($data['form']['nameErr']) ? $data['form']['nameErr'] : '');?></small></label>
		    					<input type="text" name="name" class="form-control" value="<?php echo (isset($data['form']['name']) ? $data['form']['name'] : '');?>">
		    				</div>
		    				<div class="form-group">
		    					<label>Email<small class="error"><?php echo (isset($data['form']['emailErr']) ? $data['form']['emailErr'] : '');?></small></label>
		    					<input type="text" name="email" class="form-control" value="<?php echo (isset($data['form']['email']) ? $data['form']['email'] : '');?>">
		    				</div>
		    				<div class="form-group">
		    					<label>Phone<small class="error"><?php echo (isset($data['form']['phoneErr']) ? $data['form']['phoneErr'] : '');?></small></label>
		    					<input type="text" name="phone" class="form-control" value="<?php echo (isset($data['form']['phone']) ? $data['form']['phone'] : '');?>">
		    				</div>
		    				<button class="btn btn-primary">Submit</button>
		    			</form>
		  			</div>
				</div>
			</div>
			<div class="col-md-6">
				<h3 class="text-center">Information From Database</h3>
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
						</tr>
					</thead>
					<tbody>
						<?php
							
							while ($row = $data['data']->fetch_assoc()) {
								echo "<tr>";
								echo "<td>".$row['name']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['phone']."</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>