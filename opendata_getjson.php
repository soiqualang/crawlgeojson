<?php
ini_set('max_execution_time', 0);

function writefile($fname,$data){
	$myfile = fopen("opendata_json/".$fname.".geojson", "w") or die("Unable to open file!");
	fwrite($myfile, $data);
	fclose($myfile);
}

$layers=array("geonode:world_airports","geonode:world_borders","geonode:world_capitals","geonode:world_cities","geonode:world_heritages","geonode:world_majorrivers","geonode:world_ports","geonode:world_timezones","geonode:world_utmzones");

$ogrservice='http://opendata.hcmgis.vn/geoserver/wms?service=WFS&version=1.0.0&request=GetFeature&outputFormat=application/json&typeName=';

$maxi=count($layers);
for($i=0;$i<$maxi;$i++){
	$fname=str_replace("geonode:","",$layers[$i]);
	echo $layers[$i].'<br>';
	$data=file_get_contents($ogrservice.urlencode($layers[$i]));
	writefile($fname,$data);
}
?>