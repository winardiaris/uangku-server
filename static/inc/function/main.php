<?php

function save_new_user($username,$password,$realname){
	$available_user = count_on_tbl("user","`username`='$username'");
	if($available_user >0){
		$output = 0;
	}
	else{
		$output = insert_to_tbl("user","`username`,`password`,`realname`","'$username','$password','$realname'");
	}
	return $output;
}
function update_user($uid,$username,$password,$realname){
	$output = update_tbl("user","`password`='$password',`realname`='$realname'","`username`='$username'","`uid`='$uid'");
	return $output;
}
function set_user_last_login($username){
	update_tbl("user","`lastlogin`='".__NOW__."'","`username`='$username'");	
}
function view_user($username){
	$data = select_tbl("user","`uid`,`username`,`realname`,`lastlogin`,`c_at`,`u_at`","`username`='$username'",1);
	$json = json_encode($data); 
		return $json;
}

//memvalidasi pengguna dengan username dan password
function user_login($username,$password){
	if(isset($username) and isset($password)){
		$available_user = count_on_tbl("user","`username`='$username' and `password`='$password'");
		if($available_user>0){
			set_user_last_login($username);
			return 1;
		}
		else{
			return 0;
		}
	}
	else{
		return 0;
	}
}

//untuk menambahkan data keuangan
function add_data($uid,$date,$token,$type,$value,$desc){
	if(isset($uid)){
		$token 				= UbahSimbol($token);
		$desc 				= UbahSimbol($desc);
		$check_token 	= count_on_tbl("data","`token`='$token' and `desc`='$desc'");
		if($check_token>0){
			$output 		= 0;
		}
		else{
			$check_user = count_on_tbl("user","`uid`='$uid'");
			if($check_user>0){
				$output 	= insert_to_tbl("data","`uid`,`date`,`token`,`type`,`value`,`desc`","'$uid','$date','$token','$type','$value','$desc'");
			}
		}
		return $output;
	}
	else{
		return 0;
	}
	
}

//menampilkan data dari database dengan output json
function list_data($uid,$date=null,$from=null,$to=null,$type=null,$status=null,$limit=null,$search=null){
	if(isset($uid)){
		
		if(isset($date) and empty($from) and empty($to)){
			$date = " and `date`='$date' ";
		}
		elseif(isset($from) and isset($to) and empty($date)){
			$date = " and (`date` BETWEEN '$from' and '$to') ";
		}
		
		if(isset($type)){
			$type = " and `type`='$type' ";
		}
		
		if(isset($search)){
			$search = " and `desc` like '%$search%' or `token` like '%$search%' ";
		}
		
		if(isset($status)){
			$status = " and `status`='$status' "; 
		}
		else{
			$status = " and `status`='1' ";
		}
		
		if(isset($limit)){
			$limit = " limit $limit ";
		}

		$qry	= "select * from `data` where `uid`='$uid' $date $type $status $search $limit";
		$data = select_tbl_qry($qry);
		
		$json = json_encode($data); 
		return $json;
	}
	else{
		return 0;
	}
}

//merubah status data menjadi 0 yang artinya data sudah dihapus
function delete_data($did,$desc){
	if(isset($did) and isset($desc)){	
		$desc_a = select_tbl("data","`desc`","`did`='$did'");
		$desc_a = $desc_a[0]['desc'];
		$desc_a = explode("|",$desc_a);
		$desc_a	= $desc_a[0];
		
		$output = update_tbl("data","`status`='0' , `desc`='".$desc_a." | ".UbahSimbol($desc)."'","`did`='$did'");
		return $output;
	}
	else{
		return 0;
	}
	
}

//menampilkan jumlah value(uang) baik untuk in/out
function total_value_data($uid,$date=null,$from=null,$to=null,$type=null,$status=null,$limit=null,$search=null){
	if(isset($uid)){
		
		if(isset($date) and empty($from) and empty($to)){
			$date = " and `date`='$date' ";
		}
		elseif(isset($from) and isset($to) and empty($date)){
			$date = " and (`date` BETWEEN '$from' and '$to') ";
		}
		
		if(isset($type)){
			$type = " and `type`='$type' ";
		}
		
		if(isset($search)){
			$search = " and `desc` like '%$search%' or `token` like '%$search%' ";
		}
		
		if(isset($status)){
			if($status!="all"){
				$status = " and `status`='$status' "; 
			}
			else{
				$status = "";
			}
		}
		else{
			$status = " and `status`='1' ";
		}
		
		if(isset($limit)){
			$limit = " limit $limit ";
		}
		
		$q = "select sum(`value`) as `total` from `data` where `uid`='$uid' $date $type $status $search $limit";
		$data = select_tbl_qry($q);
		$data = $data[0]['total'];
		
		return $data;		
	}
	else{
		return 0;
	}
}

//menampilkan sebuah data dari basisdata sesuai dengan data dasar
//contohnya ingin mengetahui data realname pada table user dengan uid
function get_data($from_data,$value_data,$select_field,$from_table){
	$qry = "SELECT `$select_field` as `data` FROM `$from_table` WHERE `$from_data`='$value_data'";
	$data = select_tbl_qry($qry);
	
	return Balikin($data[0]['data']);
}
?>
