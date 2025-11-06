<?php
$perangkat = $_POST['perangkat'];
$nama = $_POST['nama'];
$tahun = $_POST['tahun'];
$link = $_POST['link'];

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/arsip',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => array('id_perangkat' => $perangkat, 'nama' => $nama, 'tahun' => $tahun, 'link' => $link),
));
$response = curl_exec($curl);
curl_close($curl);

header('Location: arsip.php');
die();