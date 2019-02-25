<?php
ini_set('max_execution_time', 0);

$outputdir='portal_sld';
$urlwms='http://portal.hcmgis.vn/geoserver/wms?';

function writefile($fname,$data,$outputdir){
	$myfile = fopen($outputdir."/".$fname.".sld", "w") or die("Unable to open file!");
	fwrite($myfile, $data);
	fclose($myfile);
}

$layers=array("geonode:atm","geonode:ca_px","geonode:cauduong_1","geonode:cayxanh_bt_1","geonode:cayxanh_pn_1","geonode:cayxanh_q1","geonode:cayxanh_q10_1","geonode:cayxanh_q11_1","geonode:cayxanh_q3_1","geonode:cayxanh_q5_1","geonode:cho_1","geonode:coso_yte_2017_wgs84","geonode:cosogiaoduc_wgs84","geonode:cum_cong_nghiep","geonode:dansophuongxa_wgs84","geonode:dansoquanhuyen","geonode:duongsat","geonode:giaothong_polygon","geonode:huyencangio","geonode:huyencuchi","geonode:huyennhabe","geonode:khachsan_wgs84_1","geonode:metro_1","geonode:nhahang_wgs84","geonode:nhathuoc_2017_wgs84","geonode:pgd_nh_1","geonode:quan","geonode:quan10","geonode:quan12","geonode:quan2","geonode:quan3","geonode:quan6","geonode:quanbinhtan","geonode:quanbinhthanh","geonode:quanphunhuan","geonode:quantanbinh","geonode:quantanphu","geonode:quanthuduc","geonode:ranhphuong_1","geonode:ranht9","geonode:ranhthua11","geonode:ranhthua7","geonode:ranhthua8","geonode:ranhthuagv","geonode:thuyhe_line","geonode:thuyhe_polygon","geonode:timduonggiaothong_wgs84","geonode:tram_1","geonode:tramxangdau","geonode:tramxebus","geonode:truden_q5_1","geonode:trungtamthuongmai","geonode:tudieukhien_q5_1","geonode:tuyenxebus","geonode:uybannhandan","geonode:viahe");

$ogrservice=$urlwms.'request=GetStyles&service=wms&version=1.1.1&layers=';

$maxi=count($layers);
for($i=0;$i<$maxi;$i++){
	$fname=str_replace("geonode:","",$layers[$i]);
	echo $layers[$i].'<br>';
	$data=file_get_contents($ogrservice.urlencode($layers[$i]));
	writefile($fname,$data,$outputdir);
}
?>