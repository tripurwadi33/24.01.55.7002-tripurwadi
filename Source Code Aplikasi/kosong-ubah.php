<?php
$id = $_POST['id'];
$jabatan = $_POST['jabatan'];
$desa = $_POST['desa'];
$tgl = $_POST['tgl'];
$ket = $_POST['ket'];

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/kgb/'.$id,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'PUT',
	CURLOPT_POSTFIELDS => 'id_jabatan='.$jabatan.'id_desa='.$desa.'&tgl='.$tgl.'&ket='.$ket,
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/x-www-form-urlencoded'
	),
));
$response = curl_exec($curl);
curl_close($curl);

header('Location: kgb.php');
die();