<?php
if(isset($_REQUEST['op'])){
	$op 					= ifset('op');
	$uid					=	ifset('uid');
	$did					=	ifset('did');
	$username 		= ifset('username');
	$password 		= md5(ifset('password'));
	$realname 		= ifset('realname');
	$date					= ifset('date');
	$token				= ifset('token');
	$type					= ifset('type');
	$value				= ifset('value');
	$desc					= ifset('desc');
	$status				= ifset('status');
	$limit				= ifset('limit');
	$from					= ifset('from');
	$to						= ifset('to');
	$search				= ifset('search');
	$from_data		= ifset('from_data');
	$value_data		= ifset('value_data');
	$select_field	= ifset('select_field');
	$from_table		= ifset('from_table');
	
	if($op=='newuser'){
		echo save_new_user($username,$password,$realname);
	}
	elseif($op=='updateuser'){
		echo update_user($uid,$username,$password,$realname);
	}
	elseif($op=='login'){
		echo user_login($username,$password);
	}
	elseif($op=='viewuser'){
		echo view_user($username);
	}
	
	elseif($op=="newdata"){
		echo add_data($uid,$date,$token,$type,$value,$desc);
	}
	elseif($op=="viewdata"){
		echo list_data($uid,$date,$from,$to,$type,$status,$limit,$search);
	}
	elseif($op=="totaldata"){
		echo total_value_data($uid,$date,$from,$to,$type,$status,$limit,$search);
	}
	elseif($op=="saldodata"){
		$in = total_value_data($uid,$date,$from,$to,'in',$status,$limit,$search);
		$out = total_value_data($uid,$date,$from,$to,'out',$status,$limit,$search);
		
		echo $in-$out;
	}
	elseif($op=="deletedata"){
		echo delete_data($did,$desc);
	}
	elseif($op=="updatedata"){
		echo update_data($uid,$did,$date,$token,$type,$value,$desc);
	}
	elseif($op=="test"){
		include ("test.php");
	}

	elseif($op=='get'){
		echo get_data($from_data,$value_data,$select_field,$from_table);
	}
	else{
		header("location:index.php");
	}
}
else{
	view("help");
}



?>
