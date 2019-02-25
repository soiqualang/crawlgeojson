<?php
ini_set('max_execution_time', 0);

function writefile($fname,$data){
	$myfile = fopen("datajson/".$fname.".geojson", "w") or die("Unable to open file!");
	fwrite($myfile, $data);
	fclose($myfile);
}

$layers=array("vn_vung_ts_2005","vn_vung_ts_2016","vung_1","vung_full_dis","vung_line","vung_name","xuatkhau");

$ogrservice='http://geo12.casacam.net:8080/geoserver/a1/wms?service=WFS&version=1.0.0&request=GetFeature&outputFormat=application/json&typeName=';

$maxi=count($layers);
for($i=0;$i<$maxi;$i++){
	$fname=$layers[$i];
	echo $layers[$i].'<br>';
	$data=file_get_contents($ogrservice.urlencode($layers[$i]));
	writefile($layers[$i],$data);
}
?>