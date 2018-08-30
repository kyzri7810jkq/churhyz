
<?php $this->load->view('admin/parts/header_vw'); ?>

<div id="wrapper">
 
	<?php $this->load->view('admin/parts/navigation_left_vw'); ?>
    <div id="page-wrapper"> 
        <div class="container-fluid"> 
        	<?php if(isset($message)): ?>
			<div class="alert alert-success"><?php echo $message; ?></div>
        	<?php endif; ?>
        	<?php if(validation_errors()): ?>
				<div class="alert alert-danger"><?php echo validation_errors() . $message; ?></div>
			<?php endif ?>
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">
                        People &raquo; List
                    </h4>  
                </div> 
				<div class="col-md-12"> 
				 <table class="table table-striped table-hovered">
				 	<thead>
				 		<th>ID</th>
				 		<th>Complete Name</th> 
				 		<th>Birthday</th>
				 		<th>Address</th>
				 		<th>Contact</th>
				 		<th>Spouse</th>
				 		<th>Date Added</th>
				 	</thead>
				 	<?php foreach($items->result() as $p): ?>
					<tr>
						<td><?php echo $p->people_id; ?></td>
						<td><?php echo $p->firstname . $p->middlename . $p->lastname; ?></td>
						<td><?php echo $p->birthday; ?></td>
						<td><?php echo $p->address; ?></td>
						<td><?php echo $p->contact; ?></td>
						<td><?php echo $p->spouse; ?></td>
						<td><?php echo $p->date_added; ?></td>
					</tr>
				 	<?php endforeach; ?>
				 </table>
				 <?php echo $this->pagination->create_links(); ?>
				</div>
            </div>  <!-- /.row -->
        </div>
        <!-- /.container-fluid --> 
    </div>
    <!-- /#page-wrapper --> 
</div>
<!-- /#wrapper -->
 
<?php $this->load->view('admin/parts/footer_vw'); ?>