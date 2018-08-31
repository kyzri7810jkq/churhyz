<?php 


function can_delete_track()
{
	return [
		1 => 'super admin', 
		2 => 'admin' 
	];
}

function can_delete_people()
{
	return [
		1 => 'super admin', 
		2 => 'admin' 
	];
}