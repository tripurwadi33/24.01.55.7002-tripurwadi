<?php
	include 'menu.html';
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/kosong',
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

	$curl4 = curl_init();
	curl_setopt_array($curl4, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/jabatan',
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
	$jabatan = json_decode($response4);

	$curl5 = curl_init();
	curl_setopt_array($curl5, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/desa',
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
	$desa = json_decode($response5);
?>

<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalTambah">Tambah</button>
<h3>Jabatan Kosong</h3>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Jabatan</th>
			<th>Desa</th>
			<th>Tanggal Kosong</th>
			<th>Keterangan</th>
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
							CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/desa/'.$x->id_desa,
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
				<td><?= $x->tgl ?></td>
				<td><?= $x->ket ?></td>
				<td>
					<button type="button" class="btn btn-sm btn-info ubah" data-toggle="modal" data-target="#modalUbah"
						data-id="<?= $x->id ?>"
						data-jabatan="<?= $x->id_jabatan ?>"
						data-desa="<?= $x->id_desa ?>"
						data-tgl="<?= $x->tgl ?>"
						data-ket="<?= $x->ket ?>"
					>
						Ubah
					</button>
					<a href="kosong-hapus.php?id=<?= $x->id ?>" class="btn btn-sm btn-danger">
						Hapus
					</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="kosong-tambah.php">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Jabatan Kosong</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Jabatan</label>
					<select name="jabatan" class="form-control" required>
						<?php foreach ($jabatan->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Desa</label>
					<select name="desa" class="form-control" required>
						<?php foreach ($desa->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Tanggal Kosong</label>
					<input type="date" name="tgl" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<input type="text" name="ket" class="form-control" required>
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
		<form class="modal-content" method="POST" action="kosong-ubah.php">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Jabatan Kosong</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="id">
				<div class="form-group">
					<label>Jabatan</label>
					<select name="jabatan" class="form-control" id="jabatan" required>
						<?php foreach ($jabatan->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Desa</label>
					<select name="desa" class="form-control" id="desa" required>
						<?php foreach ($desa->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Tanggal Kosong</label>
					<input type="date" name="tgl" class="form-control" id="tgl" required>
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<input type="text" name="ket" class="form-control" id="ket" required>
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
		$('#jabatan').val($(this).data('jabatan'))
		$('#desa').val($(this).data('desa'))
		$('#tgl').val($(this).data('tgl'))
		$('#ket').val($(this).data('ket'))
	})
</script>

</div>
</body>
</html>