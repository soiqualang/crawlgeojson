<?php
ini_set('max_execution_time', 0);

function writefile($fname,$data){
	$myfile = fopen("opendata_sld/".$fname.".sld", "w") or die("Unable to open file!");
	fwrite($myfile, $data);
	fclose($myfile);
}

$layers=array("geonode:district3_hospitals","geonode:district3_roads","geonode:district3_wards","geonode:global_landslide","geonode:global_weather_stations","geonode:ground_control_points","geonode:hcm_department","geonode:hcm_historicalsite","geonode:hcm_industrialzone","geonode:hcm_peoplecommittee","geonode:hcm_police","geonode:mekongdelta","geonode:submarine_cables","geonode:submarine_landingpoints","geonode:vietnam_border","geonode:vietnam_bottollstation","geonode:vietnam_districts","geonode:vietnam_golfcourses","geonode:vietnam_intangibleculturalheritage","geonode:vietnam_lighthouses","geonode:vietnam_nationalfestival","geonode:vietnam_nationalpark","geonode:vietnam_nationaltreasures","geonode:vietnam_placesofworship_point","geonode:vietnam_provinces","geonode:vietnam_railways","geonode:vietnam_rivers_polyline","geonode:vietnam_wards","geonode:world_airports","geonode:world_borders","geonode:world_capitals","geonode:world_cities","geonode:world_heritages","geonode:world_majorrivers","geonode:world_ports","geonode:world_timezones","geonode:world_utmzones");

$ogrservice='http://opendata.hcmgis.vn/geoserver/wms?request=GetStyles&service=wms&version=1.1.1&layers=';

$maxi=count($layers);
for($i=0;$i<$maxi;$i++){
	$fname=str_replace("geonode:","",$layers[$i]);
	echo $layers[$i].'<br>';
	$data=file_get_contents($ogrservice.urlencode($layers[$i]));
	writefile($fname,$data);
}
?>