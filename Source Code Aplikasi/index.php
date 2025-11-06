<?php
	include 'menu.html';
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/perangkat',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$response = curl_exec($curl);
	curl_close($curl);
	$data = json_decode($response);

	$curl6 = curl_init();
	curl_setopt_array($curl6, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/desa',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$response6 = curl_exec($curl6);
	curl_close($curl6);
	$desa = json_decode($response6);

	$curl7 = curl_init();
	curl_setopt_array($curl7, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/jabatan',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$response7 = curl_exec($curl7);
	curl_close($curl7);
	$jabatan = json_decode($response7);

	$curl8 = curl_init();
	curl_setopt_array($curl8, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/agama',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$response8 = curl_exec($curl8);
	curl_close($curl8);
	$agama = json_decode($response8);

	$curl9 = curl_init();
	curl_setopt_array($curl9, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/pendidikan',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$response9 = curl_exec($curl9);
	curl_close($curl9);
	$pendidikan = json_decode($response9);
?>

<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalTambah">Tambah</button>
<h3>Perangkat Desa</h3>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>NIK</th>
			<th>Alamat</th>
			<th>Jabatan</th>
			<th>Agama</th>
			<th>Pendidikan</th>
			<th>TMT Awal Menjabat</th>
			<th>BUP</th>
			<th>Desa</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 1;
			foreach ($data->records as $x) {
		?>
			<tr>
				<td class="text-center"><?= $no++ ?></td>
				<td><?= $x->nama ?></td>
				<td><?= $x->nik ?></td>
				<td><?= $x->alamat ?></td>
				<td>
					<?php
						$curl2 = curl_init();
						curl_setopt_array($curl2, array(
							CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/jabatan/'.$x->id_jabatan,
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => '',
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => true,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => 'GET',
						));
						$response2 = curl_exec($curl2);
						curl_close($curl2);
						$data2 = json_decode($response2);
						echo $data2->nama;
					?>
				</td>
				<td>
					<?php
						$curl3 = curl_init();
						curl_setopt_array($curl3, array(
							CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/agama/'.$x->id_agama,
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => '',
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => true,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => 'GET',
						));
						$response3 = curl_exec($curl3);
						curl_close($curl3);
						$data3 = json_decode($response3);
						echo $data3->nama;
					?>
				</td>
				<td>
					<?php
						$curl4 = curl_init();
						curl_setopt_array($curl4, array(
							CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/pendidikan/'.$x->id_pendidikan,
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => '',
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => true,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => 'GET',
						));
						$response4 = curl_exec($curl4);
						curl_close($curl4);
						$data4 = json_decode($response4);
						echo $data4->nama;
					?>
				</td>
				<td><?= $x->tmt ?></td>
				<td><?= $x->bup ?></td>
				<td class="text-center">
					<?php
						$curl5 = curl_init();
						curl_setopt_array($curl5, array(
							CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/desa/'.$x->id_desa,
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => '',
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => true,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => 'GET',
						));
						$response5 = curl_exec($curl5);
						curl_close($curl5);
						$data5 = json_decode($response5);
						echo $data5->nama;
					?>
				</td>
				<td>
					<button type="button" class="btn btn-sm btn-info ubah" data-toggle="modal" data-target="#modalUbah"
						data-id="<?= $x->id ?>"
						data-nama="<?= $x->nama ?>"
						data-nik="<?= $x->nik ?>"
						data-alamat="<?= $x->alamat ?>"
						data-jabatan="<?= $x->id_jabatan ?>"
						data-agama="<?= $x->id_agama ?>"
						data-pendidikan="<?= $x->id_pendidikan ?>"
						data-tmt="<?= $x->tmt ?>"
						data-bup="<?= $x->bup ?>"
						data-desa="<?= $x->id_desa ?>"
					>
						Ubah
					</button>
					<a href="perangkat-hapus.php?id=<?= $x->id ?>" class="btn btn-sm btn-danger">
						Hapus
					</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="perangkat-tambah.php">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Perangkat Desa</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" required>
				</div>
				<div class="form-group">
					<label>NIK</label>
					<input type="text" name="nik" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Jabatan</label>
					<select name="jabatan" class="form-control" required>
						<?php foreach ($jabatan->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Agama</label>
					<select name="agama" class="form-control" required>
						<?php foreach ($agama->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Pendidikan</label>
					<select name="pendidikan" class="form-control" required>
						<?php foreach ($pendidikan->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>TMT Awal Menjabat</label>
					<input type="date" name="tmt" class="form-control" required>
				</div>
				<div class="form-group">
					<label>BUP</label>
					<input type="date" name="bup" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Desa</label>
					<select name="desa" class="form-control" required>
						<?php foreach ($desa->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="modalUbah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="perangkat-ubah.php">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Perangkat Desa</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="id">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" id="nama" required>
				</div>
				<div class="form-group">
					<label>NIK</label>
					<input type="text" name="nik" class="form-control" id="nik" required>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" id="alamat" required>
				</div>
				<div class="form-group">
					<label>Jabatan</label>
					<select name="jabatan" class="form-control" id="jabatan" required>
						<?php foreach ($jabatan->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Agama</label>
					<select name="agama" class="form-control" id="agama" required>
						<?php foreach ($agama->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Pendidikan</label>
					<select name="pendidikan" class="form-control" id="pendidikan" required>
						<?php foreach ($pendidikan->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>TMT Awal Menjabat</label>
					<input type="date" name="tmt" class="form-control" id="tmt" required>
				</div>
				<div class="form-group">
					<label>BUP</label>
					<input type="date" name="bup" class="form-control" id="bup" required>
				</div>
				<div class="form-group">
					<label>Desa</label>
					<select name="desa" class="form-control" id="desa" required>
						<?php foreach ($desa->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
</div>

<script>
	$(document).on('click', '.ubah', function () {
		$('#id').val($(this).data('id'))
		$('#nama').val($(this).data('nama'))
		$('#nik').val($(this).data('nik'))
		$('#alamat').val($(this).data('alamat'))
		$('#jabatan').val($(this).data('jabatan'))
		$('#agama').val($(this).data('agama'))
		$('#pendidikan').val($(this).data('pendidikan'))
		$('#tmt').val($(this).data('tmt'))
		$('#bup').val($(this).data('bup'))
		$('#desa').val($(this).data('desa'))
	})
</script>

</div>
</body>
</html>