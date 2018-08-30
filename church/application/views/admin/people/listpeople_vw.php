
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
				 
				</div>
            </div>  <!-- /.row -->
        </div>
        <!-- /.container-fluid --> 
    </div>
    <!-- /#page-wrapper --> 
</div>
<!-- /#wrapper -->
 
<?php $this->load->view('admin/parts/footer_vw'); ?>