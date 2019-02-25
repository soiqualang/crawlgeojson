<?php
ini_set('max_execution_time', 0);

function writefile($fname,$data){
	$myfile = fopen("sld/".$fname.".sld", "w") or die("Unable to open file!");
	fwrite($myfile, $data);
	fclose($myfile);
}

$layers=array("bai_ca_f","h_chinh_name","hs_ts_dao","vung_thuysan_kt","1_phanvung_hc","1vn_gtcangbien","1vn_gtcuakhau","1vn_gthighway","1vn_gtother","1vn_gtquoclo","1vn_gtrailway","1vn_gtsanbay","1vn_gttinhlo","1vn_hientrang_sdd2015","1vn_hientrang_sdd2015_point","1vn_ranhgioitinh_chuan1","1vn_song","1vn_tinh_full_dis","1vn_tinh_hsts","1vn_ub","b_ca","b_tom","be tram tich","cac dut gay","cac tram bom_thuyloi_2","cac vung thuy trieu","cao_toc","cc_rung_vung","cocau_rung_15","cpha_15","dao_venbo","dat_vn","dia chat thuy van1","dia_danh","dl_diem_dl","dl_diem_dl_1","dl_gt_bien","dl_hkhong","dl_hkhong_1","dl_ksan","dl_ksan_1","dl_lehoi","dl_lehoi_1","dl_spdl","dl_spdl_1","dl_vhlichsu","dl_vhlichsu_1","dl_vungdl","dl_vungdl_1","do doc","dt_08","dt_15","duong binh do dh","duong dang sau_bien","duong_bien","duong_oto","duong_sat","dut gay_dia chat","gian_khoan_2","h_sa","he thong cong_thuyloi2","he thong de_thuyloi1","he thong ke_thuyloi2","hien trang sd dat1","kthac_15","luu vuc song2","mdo2016","mo khoang san vn_1","mo_daukhi_2","nhapkhau","nhiet do tb nam theo vung","phan bo do am tb","phan lo dau khi","phan vung khi hau","qmo2016","quoc_lo","song_chi_tiet","song_ho","song_ho_line","ten_hs_ts","tram do am chinh1","tram do am1","tram do khi hau1","tram do nhiet chinh1","tram do nhiet do kk2","trg_sa","tuoi dia chat","vien_bai_ca","vien_bai_tom","vn_biengioi","vn_boundary2","vn_coastline","vn_sl_ts_nt05","vn_slg_ts_kt05","vn_slg_ts_kthac","vn_slg_ts_kthac_2016","vn_slg_ts_ntr_05","vn_slg_ts_ntr_16","vn_tinh","vn_tinh_vung","vn_vung_nn_dis","vn_vung_nn_dis1","vn_vung_ts_2005","vn_vung_ts_2016","vung_1","vung_full_dis","vung_line","vung_name","xuatkhau");

$ogrservice='http://geo12.casacam.net:8080/geoserver/a1/wms?request=GetStyles&service=wms&version=1.1.1&layers=';

$maxi=count($layers);
for($i=0;$i<$maxi;$i++){
	$fname=$layers[$i];
	echo $layers[$i].'<br>';
	$data=file_get_contents($ogrservice.urlencode($layers[$i]));
	writefile($layers[$i],$data);
}
?>