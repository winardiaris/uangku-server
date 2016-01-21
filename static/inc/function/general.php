<?php
//db function
function select_tbl($tbl_name,$field_name=null,$where=null,$limit=null,$debug=null){
	$DB=DB();
	if(isset($tbl_name)){
		$sql = "SELECT";
		
		if(isset($field_name)){
			$sql .=" ".$field_name." ";
		}
		else{
			$sql .=" * ";
		}
		
		$sql .="FROM `$tbl_name` ";
		
		if(isset($where)){
			$sql .=" WHERE $where ";
		}
		
		if(isset($limit)){
			$sql .=" LIMIT $limit ";
		}
		
		if(empty($debug)){
			$q = mysqli_query($DB,$sql);
			$count = mysqli_num_fields($q);
			$datas = array();
						
			while($d=mysqli_fetch_array($q)){
				$fname = array();
				$dataa = array();
				for($i=0;$i<$count;$i++){
					array_push($dataa,balikin($d[$i]));
				}
				$finfo = mysqli_fetch_fields($q);
				foreach ($finfo as $val) {
					array_push($fname,$val->name);
				}
				$combine = array_combine($fname,$dataa);
				array_push($datas,$combine);
			}
			$data = array("data"=>$datas);
			return $data;
		}	
		else{
			return $sql.PHP_EOL;
		}
	}
	else{
		return status(0);
	}
}
function insert_to_tbl($tbl_name,$field_name,$value_data,$debug=null){
	$DB=DB();
	if(isset($tbl_name)){
		if(isset($field_name) and isset($value_data)){
			$sql = "INSERT INTO `$tbl_name`";
			$sql .=" ($field_name,`c_at`)";
			$sql .=" VALUES($value_data,'".__NOW__."')";
			
			if(isset($where)){
				$sql .=" WHERE $where ";
			}
			
			if(empty($debug)){
				$q = mysqli_query($DB,$sql);
				if($q){
					return status("success");
				}
			}	
			else{
				return $sql.PHP_EOL;
			}
			
		}
		else{
			return status("error");
		}
	}
	else{
		return status("error");
	}
}
function update_tbl($tbl_name,$set_data,$where,$debug=null){
	$DB=DB();
	if(isset($tbl_name)){
		if(isset($set_data)){
			$sql = "UPDATE `$tbl_name` SET $set_data ";
			$sql .= ",`u_at`='".__NOW__."' ";
			if(isset($where)){
				$sql .=" WHERE $where ";
			}
			
			if(empty($debug)){
				$q = mysqli_query($DB,$sql);
				if($q){
					return status("success");
				}
			}	
			else{
				return $sql.PHP_EOL;
			}
		}
		else{
			return status("error");
		}
	}
	else{
		return status("error");
	}
}
function select_tbl_qry($query,$debug=null){
	$DB=DB();
	if(isset($query)){
		$sql = $query;
		if(empty($debug)){
			$q = mysqli_query($DB,$sql);
			$count = mysqli_num_fields($q);
						
			$datas = array();
			while($d=mysqli_fetch_array($q)){
				$fname = array();
				$dataa = array();
				for($i=0;$i<$count;$i++){
					array_push($dataa,balikin($d[$i]));
				}
				$finfo = mysqli_fetch_fields($q);
				foreach ($finfo as $val) {
					array_push($fname,$val->name);
				}
				$combine = array_combine($fname,$dataa);
				array_push($datas,$combine);
			}
			$data = array("data"=>$datas);
			return $data;
		}	
		else{
			return $sql.PHP_EOL;
		}
	}
	else{
		return status("error");
	}
}
function count_on_tbl($tbl_name,$where){
	if(isset($tbl_name) and isset($where)){
		$count = array_sum(array_map("count",select_tbl($tbl_name,null,$where)));
		return $count;
	}
	else{
		return status("error");
	}
}

?>
