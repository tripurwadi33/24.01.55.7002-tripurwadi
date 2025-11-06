<?php
$id = $_POST['id'];
$nama = $_POST['nama'];
$desa = $_POST['desa'];

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/dusun/'.$id,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'PUT',
	CURLOPT_POSTFIELDS => 'nama='.$nama.'&id_desa='.$desa,
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/x-www-form-urlencoded'
	),
));
$response = curl_exec($curl);
curl_close($curl);

header('Location: dusun.php');
die();