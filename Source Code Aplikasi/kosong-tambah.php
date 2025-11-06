<?php
$jabatan = $_POST['jabatan'];
$desa = $_POST['desa'];
$tgl = $_POST['tgl'];
$ket = $_POST['ket'];

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/kosong',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => array('id_jabatan' => $jabatan, 'id_desa' => $desa, 'tgl' => $tgl, 'ket' => $ket),
));
$response = curl_exec($curl);
curl_close($curl);

header('Location: kosong.php');
die();