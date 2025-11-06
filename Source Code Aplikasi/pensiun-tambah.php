<?php
$desa = $_POST['desa'];
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$tmt = $_POST['tmt'];
$bup = $_POST['bup'];

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/pensiun',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => array('id_desa' => $desa, 'nama' => $nama, 'nik' => $nik, 'alamat' => $alamat, 'tmt' => $tmt, 'bup' => $bup),
));
$response = curl_exec($curl);
curl_close($curl);

header('Location: pensiun.php');
die();