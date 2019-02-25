<?php
ini_set('max_execution_time', 0);

$outputdir='portal_json';
$urlwms='http://portal.hcmgis.vn/geoserver/wms?';

function writefile($fname,$data,$outputdir){
	$myfile = fopen($outputdir."/".$fname.".geojson", "w") or die("Unable to open file!");
	fwrite($myfile, $data);
	fclose($myfile);
}

$layers=array("geonode:huyencangio");

$ogrservice=$urlwms.'service=WFS&version=1.0.0&request=GetFeature&outputFormat=application/json&typeName=';

$maxi=count($layers);
for($i=0;$i<$maxi;$i++){
	$fname=str_replace("geonode:","",$layers[$i]);
	echo $layers[$i].'<br>';
	echo $ogrservice.urlencode($layers[$i]).'<br>';
	$data=file_get_contents($ogrservice.urlencode($layers[$i]));
	writefile($fname,$data,$outputdir);
}
?>