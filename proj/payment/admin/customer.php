<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Customers</h1>
	</div>
  <div class="content-header-right">
  <form action="test\generatePDF.php" method="post">

		<a type="submit" value="Generate PDF" href="test\generatePDF.php" class="btn btn-primary btn-sm">Export as PDF</a>
		<a href="customer-csv.php" class="btn btn-primary btn-sm">Export as CSV</a>
  </form>

	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
      <div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="10">S.N</th>
								<th width="180">Username</th>
								<th width="150">Email Address</th>
								<th width="180">Contact Number</th>
								<th width="100">Joining Date</th>
								<!-- <th width="100">Action</th> -->
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
              $count=1;
							$statement = $pdo->prepare("SELECT * FROM users t1");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
                  <td><?=$count?></td>
                  <td><?php echo $row['username']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['phone_number']; ?></td>
									<td><?php echo $row['registered_at']; ?></td>
                  
								</tr>
								<?php
                                $count=$count+1;
              
                              }
							
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>