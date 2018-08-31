
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
            <a href="<?php echo base_url('track'); ?>" class="pull-right">&laquo;Go back to List</a>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">
                        CC8 Track &raquo; Add New <i class="fa fa-plus"></i>
                    </h4>  
                </div> 
				<div class="col-md-12"> 
					<?php echo form_open(base_url('track/add')); ?>
					 
					<div class="row">
						<div class="col-md-5">
							<label>* Title : </label>
							<input type="text" name="title" class="form-control" required><br>
							<label for="description">* Description</label><br>
							<textarea name="description" class="form-control" rows="10"></textarea><br>

							<input type="submit" value="Submit" class="btn btn-primary" name="submit">
						</div> 
					</div> 
					<?php echo form_close(); ?><hr>
					<small class="text-muted">Note: Fields with asterisk are required</small>
				</div>
            </div>  <!-- /.row -->
        </div>
        <!-- /.container-fluid --> 
    </div>
    <!-- /#page-wrapper --> 
</div>
<!-- /#wrapper -->
 
<?php $this->load->view('admin/parts/footer_vw'); ?>