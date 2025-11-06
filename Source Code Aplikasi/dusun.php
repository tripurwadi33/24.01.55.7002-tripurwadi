<?php
	include 'menu.html';
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/dusun',
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

	$curl2 = curl_init();
	curl_setopt_array($curl2, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/desa',
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
	$desa = json_decode($response2);
?>

<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalTambah">Tambah</button>
<h3>Dusun</h3>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Dusun</th>
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
				<td>
					<?php
						$curl2 = curl_init();
						curl_setopt_array($curl2, array(
							CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/desa/'.$x->id_desa,
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
					<button type="button" class="btn btn-sm btn-info ubah" data-toggle="modal" data-target="#modalUbah"
						data-id="<?= $x->id ?>"
						data-nama="<?= $x->nama ?>"
						data-desa="<?= $x->id_desa ?>"
					>
						Ubah
					</button>
					<a href="dusun-hapus.php?id=<?= $x->id ?>" class="btn btn-sm btn-danger">
						Hapus
					</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="dusun-tambah.php">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Dusun</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Dusun</label>
					<input type="text" name="nama" class="form-control" required>
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
		<form class="modal-content" method="POST" action="dusun-ubah.php">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Dusun</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="id">
				<div class="form-group">
					<label>Nama Dusun</label>
					<input type="text" name="nama" class="form-control" id="nama" required>
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
		$('#desa').val($(this).data('desa'))
	})
</script>

</div>
</body>
</html>