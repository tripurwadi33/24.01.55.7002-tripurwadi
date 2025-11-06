<?php
	include 'menu.html';
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/arsip',
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

	$curl3 = curl_init();
	curl_setopt_array($curl3, array(
		CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/perangkat',
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
	$perangkat = json_decode($response3);
?>

<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalTambah">Tambah</button>
<h3>Arsip</h3>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Perangkat</th>
			<th>Nama Arsip</th>
			<th>Tahun</th>
			<th>Link Dokumen</th>
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
							CURLOPT_URL => 'https://andriyanti.site/tri/api.php/records/perangkat/'.$x->id_perangkat,
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
				<td><?= $x->nama ?></td>
				<td class="text-center"><?= $x->tahun ?></td>
				<td><a href="<?= $x->link ?>" target="_blank"><?= $x->link ?></a></td>
				<td>
					<button type="button" class="btn btn-sm btn-info ubah" data-toggle="modal" data-target="#modalUbah"
						data-id="<?= $x->id ?>"
						data-perangkat="<?= $x->id_perangkat ?>"
						data-nama="<?= $x->nama ?>"
						data-tahun="<?= $x->tahun ?>"
						data-link="<?= $x->link ?>"
					>
						Ubah
					</button>
					<a href="arsip-hapus.php?id=<?= $x->id ?>" class="btn btn-sm btn-danger">
						Hapus
					</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="arsip-tambah.php">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Arsip</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Perangkat</label>
					<select name="perangkat" class="form-control" required>
						<?php foreach ($perangkat->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Nama Arsip</label>
					<input type="text" name="nama" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Tahun</label>
					<input type="number" name="tahun" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Link Dokumen</label>
					<input type="text" name="link" class="form-control" required>
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
		<form class="modal-content" method="POST" action="arsip-ubah.php">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Arsip</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="id">
				<div class="form-group">
					<label>Perangkat</label>
					<select name="perangkat" class="form-control" id="perangkat" required>
						<?php foreach ($perangkat->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Nama Arsip</label>
					<input type="text" name="nama" class="form-control" id="nama" required>
				</div>
				<div class="form-group">
					<label>Tahun</label>
					<input type="number" name="tahun" class="form-control" id="tahun" required>
				</div>
				<div class="form-group">
					<label>Link Dokumen</label>
					<input type="text" name="link" class="form-control" id="link" required>
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
		$('#perangkat').val($(this).data('perangkat'))
		$('#nama').val($(this).data('nama'))
		$('#tahun').val($(this).data('tahun'))
		$('#link').val($(this).data('link'))
	})
</script>

</div>
</body>
</html>