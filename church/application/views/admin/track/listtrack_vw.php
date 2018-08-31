
<?php $this->load->view('admin/parts/header_vw'); ?>

<div id="wrapper">
 
	<?php $this->load->view('admin/parts/navigation_left_vw'); ?>
    <div id="page-wrapper"> 
        <div class="container-fluid"> 
        	<?php if(isset($message)): ?>
			<div class="alert alert-success"><?php echo $message; ?></div>
        	<?php endif; ?>
 
        	<?php if($this->session->userdata('success')): ?>
			<div class="alert alert-success"><?php echo $this->session->userdata('success'); ?></div>
			<?php $this->session->unset_userdata('success'); ?>
        	<?php endif; ?>

        	<?php if(validation_errors()): ?>
				<div class="alert alert-danger"><?php echo validation_errors() . $message; ?></div>
			<?php endif ?>
            <!-- Page Heading -->
            <br>
            <div class="row">
                <div class="col-lg-12">  
                    <a href="<?php echo base_url('track/add'); ?>" class="btn btn-success pull-right">+ Add New</a> 
                    <h4 class="page-header">
                        CC-8 Track &raquo; List
                    </h4>  
                </div> 
				<div class="col-md-12"> 
				 <table class="table table-striped table-hover">
				 	<thead>
				 		<th>ID</th>
				 		<th>Title</th> 
				 		<th>Description</th> 
				 		<th>Delete</th>
				 	</thead>
				 	<?php  
					$items = $this->track_mdl->listAll();
					if( $items->num_rows()) :
				   	foreach($items->result() as $p): ?>
					<tr>
						<td><?php echo $p->track_id; ?></td> 
						<td><?php echo $p->title; ?></td>
						<td><?php echo $p->description; ?></td>  
						<td> 
						<?php if( array_key_exists($this->session->userdata('roleid'), 
								can_delete_track())) : ?>
							<?php echo form_open(base_url('track/remove')); ?>
							<input type="hidden" name="hidid" value="<?php echo $p->track_id;  ?>">
							<button type="submit" data-info="<?php echo $p->title; ?>" class="btn btn-sm btn-danger deleteme" name="trash"><i class="fa fa-trash"></i></button>
							<?php echo form_close(); ?>
						<?php else: ?>
							<button class="disabled btn-default btn"><i class="fa fa-trash"></i></button>
						<?php endif; ?>
						</td>
					</tr>
				 	<?php endforeach; ?>
				 	<?php else: ?>
				 		<tr>
				 			<td colspan="10"> Sorry, no record found</td>
				 		</tr>
				 	<?php endif;?>
				 </table>  
				</div>
            </div>  <!-- /.row -->
        </div>
        <!-- /.container-fluid --> 
    </div>
    <!-- /#page-wrapper --> 
</div>
<!-- /#wrapper -->
 
<?php $this->load->view('admin/parts/footer_vw'); ?>