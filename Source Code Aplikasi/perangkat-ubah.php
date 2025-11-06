<?php
$id = $_POST['id'];
$desa = $_POST['desa'];
$jabatan = $_POST['jabatan'];
$agama = $_POST['agama'];
$pendidikan = $_POST['pendidikan'];
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$tmt = $_POST['tmt'];
$bup = $_POST['bup'];

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/perangkat/'.$id,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'PUT',
	CURLOPT_POSTFIELDS => 'id_desa='.$desa.'&id_jabatan='.$jabatan.'&id_agama='.$agama.'&id_pendidikan='.$pendidikan.'&nama='.$nama.'&nik='.$nik.'&alamat='.$alamat.'&tmt='.$tmt.'&bup='.$bup,
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/x-www-form-urlencoded'
	),
));
$response = curl_exec($curl);
curl_close($curl);

header('Location: index.php');
die();