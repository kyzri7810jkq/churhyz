
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
                    <a href="<?php echo base_url('people/add'); ?>" class="btn btn-success pull-right">+ Add New</a>
                	<form action="<?php echo base_url('people/search'); ?>" method="GET"  class="form-inline"> 
					    <input class="form-control form-control-md ml-4 w-100" type="text" placeholder="Firstname or lastname" aria-label="Search" value="<?php echo $this->input->get('s'); ?>" name="s">
					    <button class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form> 
                    <h4 class="page-header">
                        People &raquo; List
                    </h4>  
                </div> 
				<div class="col-md-12"> 
				 <table class="table table-striped table-hover">
				 	<thead>
				 		<th>ID</th>
				 		<th>Complete Name</th> 
				 		<th>Birthday</th>
				 		<th>Address</th>
				 		<th>Contact</th>
				 		<th>Spouse</th>
				 		<th>Date Added</th>
				 		<th>EDIT</th>
				 		<th>TRASH</th>
				 	</thead>
				 	<?php 
					$this->peoplemdl->limit  = TRUE;
					$this->peoplemdl->offset = ($this->input->get('per_page')) ? (int) $this->input->get('per_page') : 0; 
					$items = $this->peoplemdl->listAll();
					if( $items->num_rows()) :
				   	foreach($items->result() as $p): ?>
					<tr>
						<td><?php echo $p->people_id; ?></td>
						<td style="text-transform: capitalize;"><?php echo $p->firstname .' '. $p->middlename .' '. $p->lastname; ?></td>
						<td><?php echo $p->birthday; ?></td>
						<td><?php echo $p->address; ?></td>
						<td><?php echo $p->contact; ?></td>
						<td><?php echo $p->spouse; ?></td>
						<td><?php echo $p->date_added; ?></td>
						<td><a href="<?php echo base_url('people/edit?pid=' . $p->people_id); ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a></td>
						<td>
						<?php if( array_key_exists($this->session->userdata('roleid'), 
								can_delete_people())) : ?>
							<?php echo form_open(base_url('people/remove')); ?>
							<input type="hidden" name="hidid" value="<?php echo $p->people_id;  ?>">
							<button type="submit" data-info="ID # <?php echo $p->people_id; ?>" class="btn btn-sm btn-danger deleteme" name="trash"><i class="fa fa-trash"></i></button>
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
				 <?php
				 $this->peoplemdl->limit = FALSE;  
					$config['base_url']   = base_url($this->uri->segment(1) . '/' . $this->uri->segment(2). '/?'); 
					$config['total_rows'] =  $this->peoplemdl->listAll()->num_rows();
					$config['per_page']   = $this->peoplemdl->per_page;  
					$config['page_query_string'] = TRUE;
					$config['num_tag_open']    = '<li>';
					$config['num_tag_close']   = '</li>';
					$config['last_link']       = '&raquo;';
					$config['first_link']      = '&laquo;';
					$config['first_tag_open']  = '<li>';
					$config['first_tag_close'] = '</li>';
					$config['last_tag_open']   = '<li>';
					$config['last_tag_close']  = '</li>';
					$config['cur_tag_open']    = '<li><a href="#" style="font-weight:bold; background:#f0f0f0;">';
					$config['cur_tag_close']   = '</a></li>';
					$config['next_link']       = 'Next';
					$config['next_tag_open']   = '<li>';
					$config['next_tag_close']  = '</li>';
					$config['prev_link']       = 'Prev';
					$config['prev_tag_open']   = '<li>';
					$config['prev_tag_close']  = '</li>';
					$config['num_links']      = 5;
			
					$this->pagination->initialize($config);  
					?>
					<div style="clear:both;"></div><br>
					<ul class="pagination"> 
					  <?php   echo $this->pagination->create_links(); ?> 
					</ul> 	 
				</div>
            </div>  <!-- /.row -->
        </div>
        <!-- /.container-fluid --> 
    </div>
    <!-- /#page-wrapper --> 
</div>
<!-- /#wrapper -->
 
<?php $this->load->view('admin/parts/footer_vw'); ?>