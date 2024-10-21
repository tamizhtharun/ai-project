<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Customers</h1>
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
									<th width="10">#</th>
									<th width="180">Name</th>
									<th width="180">Company Name</th>
									<th width="150">Email Address</th>
									<th width="150">GST</th>	
									<th width="180">Country, City, State</th>
									<th>Status</th>
									<!-- <th width="100">Action</th> -->
							</tr>
					</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT * 
														FROM tbl_seller_registration t1
							
													");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								?>
									<tr class="<?php if($row['seller_status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
											<td><?php echo $i; ?></td>
											<td><?php echo $row['seller_name']; ?></td>
											<td><?php echo $row['seller_cname']; ?></td>
											<td><?php echo $row['seller_email']; ?></td>
											<td><?php echo $row['seller_gst']; ?></td>
											<td>
													<?php echo $row['seller_name']; ?><br>
													<?php echo $row['seller_city']; ?><br>
													<?php echo $row['seller_state']; ?>
											</td>
											<td>
													<?php if($row['seller_status']==1) { ?>
															<a href="customer-change-status.php?id=<?php echo $row['seller_id']; ?>" class="btn btn-success btn-xs approve-btn">Approve</a>
													<?php } else { ?>
															<a href="customer-change-status.php?id=<?php echo $row['seller_id']; ?>" class="btn btn-danger btn-xs disapprove-btn">Disapprove</a>
													<?php } ?>
											</td>
											<!-- <td>
													<a href="#" class="btn btn-danger btn-xs" data-href="customer-delete.php?id=<?php echo $row['seller_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
											</td> -->
									</tr>
								<?php
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
<script>
    $(document).ready(function() {
        $('.approve-btn, .disapprove-btn').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var id = btn.attr('href').split('?id=')[1];
            $.ajax({
                type: 'GET',
                url: 'customer-change-status.php',
                data: {id: id},
                success: function(data) {
                    if (btn.hasClass('approve-btn')) {
                        btn.removeClass('btn-success approve-btn').addClass('btn-danger disapprove-btn').text('Disapprove');
                    } else {
                        btn.removeClass('btn-danger disapprove-btn').addClass('btn-success approve-btn').text('Approve');
                    }
                }
            });
        });
    });
</script>


<?php require_once('footer.php'); ?>