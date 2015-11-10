<?php
function UbahSimbol($str){
	$str = trim(htmlentities(htmlspecialchars($str)));
	$search = array ("'\''",
						"'%'",
						"'@'",
						"'_'",
						"'1=1'",
						"'/'",
						"'!'",
						"'<'",
						"'>'",
						"'\('",
						"'\)'",
						"';'",
						"'-'",
						"'_'",
						"'\['",
						"'\]'",
						"'\,'"
					);

	$replace = array ("xpsijix",
						"xprsnx",
						"xtkeongx",
						"xgwahx",
						"x1smdgan1x",
						"xgmringx",
						"xpentungx",
						"xkkirix",
						"xkkananx",
						"xkkurix",
						"xkkurnanx",
						"xkommax",
						"xstrix",
						"xstripbwhx",
						"xsiku1x",
						"xsiku2x",
						"xkomax"
					);

	$str = preg_replace($search,$replace,$str);
	return $str;
	
}
function Balikins($str){
	$search = array ("'xpsijix'",
						"'xprsnx'",
						"'xtkeongx'",
						"'xgwahx'",
						"'x1smdgan1x'",
						"'xgmringx'",
						"'xpentungx'",
						"'xkkirix'",
						"'xkkananx'",
						"'xkkurix'",
						"'xkkurnanx'",
						"'xkommax'",
						"'xstrix'",
						"'xstripbwhx'",
						"'&quot;'",
						"'xsiku1x'",
						"'xsiku2x'",
						"'xkomax'");

	$replace = array ("'",
						"%",
						"@",
						"_",
						"1=1",
						"/",
						"!",
						"<",
						">",
						"(",
						")",
						";",
						"-",
						"_",
						"'",
						"[",
						"]",
						","
						);

	$str = preg_replace($search,$replace,$str);

	return $str;
 }
function Balikin($str){
	$str=Balikins($str);
	$str = htmlspecialchars_decode(htmlspecialchars_decode(html_entity_decode($str, ENT_NOQUOTES, 'UTF-8')));
	
	return $str;
}
 
function UbahXXX($str){
	$str = trim($str);
	$search = array ("'\''",
						"'%'",
						"'@'",
						"'_'",
						"'1=1'",
						"'/'",
						"'!'",
						"'<'",
						"'>'",
						"'\('",
						"'\)'",
						"'\{'",
						"'\}'",
						"'\*'",
						"'&'",
						"'\^'",
						"'\"'",
						"';'",
						"'-'",
						"'_'",
						"'\['",
						"'\]'",
						"'\.'",
						"':'",
						"'  '",
						"'\\$'",
						"'#'",
						"'~'",
						"'`'",
						"'\+'",
						"'='",
						"'\?'",
						"'\|'",
						"'\\\'",
						"'/'",
						"'\,'"
					);

	$replace = array (" ");

	$str = preg_replace($search,$replace,$str);
	return $str;
	
}
 
function UbahBulan1($str){
	$str = trim(htmlentities(htmlspecialchars($str)));
	$search = array ("'Januari'","'Februari'","'Maret'","'April'","'Mei'","'Juni'","'Juli'","'Agustus'","'September'","'Oktober'","'Nopember'","'Desember'");
	$replace = array ("01","02","03","04","05","06","07","08","09","10","11","12");
	$str = preg_replace($search,$replace,$str);
	return $str;
}
function UbahBulan2($str){
	$str = trim(htmlentities(htmlspecialchars($str)));
	$search = array ("'January'","'February'","'March'","'April'","'May'","'June'","'July'","'August'","'September'","'October'","'November'","'December'");
	$replace = array ("01","02","03","04","05","06","07","08","09","10","11","12");
	$str = preg_replace($search,$replace,$str);
	return $str;
}
function UbahBulan3($str){
	$str = trim(htmlentities(htmlspecialchars($str)));
	$search = array ("'Jan'","'Feb'","'Mar'","'Apr'","'May'","'Jun'","'Jul'","'Agu'","'Sep'","'Okt'","'Nov'","'Des'");
	$replace = array ("01","02","03","04","05","06","07","08","09","10","11","12");
	$str = preg_replace($search,$replace,$str);
	return $str;
}
function UbahBulan($str){
	$str=UbahBulan1($str);
	$str=UbahBulan2($str);
	$str=UbahBulan3($str);
	return $str;
	
}

function ifset($str){
	if(isset($_GET[$str])){
		return $_GET[$str];
	}
	elseif(isset($_POST[$str])){
		return $_POST[$str];
	}
	else{
		return null;
	}
}
function real_url($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$a = curl_exec($ch); // $a will contain all headers

	$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL
	return $url; // Voila
}

?>
