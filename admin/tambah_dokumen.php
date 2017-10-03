<?php

session_start();

require "_header.php";
include "../koneksi.php";

?>


<section id="three" class="wrapper style1">
	<div class="container">
		<div class="row">
			<div class="11u">
				<section>
					<p><a href="#" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Tambah Dokumen</a></p>      
					<table id="mytable" class="table table-bordered">
						<thead>
							<th>No</th>
							<th>Kode Dokumen</th>
							<th>Judul</th>
							<th>Unit Kerja</th>
							<th>Aksi</th>			
						</thead>
						<?php 
							//menampilkan data mysqli
							$no = 0;
							$dokumen = mysqli_query($connect,"SELECT * FROM tbl_dokumen");
							if ($dokumen) {
								if ($dokumen->num_rows > 0) {
									while ($row = $dokumen->fetch_object()) {
										$no++;
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo  $row->kode_dokumen; ?></td>
							<td><?php echo  $row->judul_dokumen; ?></td>
							<td><?php echo  $row->unit_kerja; ?></td>			
							<td>
								<a href="#" class='open_modal' id='<?php echo  $row->kode_dokumen; ?>'>Ubah</a>
								<a href="#" onclick="confirm_modal('proses_delete.php?&kode_dokumen=<?php echo  $row->kode_dokumen; ?>');">Hapus</a>
							</td>
						</tr>

						<?php
									}
								}
							}
						?>
					</table>
				</div>

				<!-- Modal Popup untuk Add--> 
				<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title" id="myModalLabel">Tambah Dokumen</h4>
							</div>

							<div class="modal-body">
								<form action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">

									<div class="form-group" style="padding-bottom: 20px;">
										<label for="Tanggal Upload">Tanggal Upload</label>
										<input type="text" name="tanggal_upload"  class="form-control" value="<?php echo date('d-m-Y'); ?>" required/>
									</div>
									
									<div class="form-group" style="padding-bottom: 20px;">
										<label for="Kode Dokumen">Kode Dokumen</label>
										<input type="text" name="kode_dokumen"  class="form-control" placeholder="Kode Dokumen" required/>
									</div>

									<div class="form-group" style="padding-bottom: 20px;">
										<label for="Unit Kerja">Unit Kerja</label>
										<select class="form-control" name="unit_kerja" required="true">
											<option value="" disabled selected> - Pilih Unit Kerja - </option>
											<option class="other-option" value="PSTBM">PSTBM</option>
											<option class="other-option" value="UJM">UJM</option>
											<option class="other-option" value="BKKK">BKKK</option>
										</select>
									</div>

									<div class="form-group" style="padding-bottom: 20px;">
										<label for="Judul Dokumen">Judul Dokumen</label>
										<input type="text" name="judul_dokumen"  class="form-control" placeholder="Judul Dokumen" required/>
									</div>

									<div class="form-group" style="padding-bottom: 20px;">
										<label for="File">File</label>
										<input type="file" name="file"  class="form-control" required/>
									</div>

									<div class="modal-footer">
										<button class="btn btn-success" type="submit">
											Submit
										</button>
										<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
											Batal
										</button>
									</div>

								</form>
						</div> 
						</div>
					</div>
				</div>

				<!-- Modal Popup untuk Edit--> 
				<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

				</div>

				<!-- Modal Popup untuk delete--> 
				<div class="modal fade" id="modal_delete">
					<div class="modal-dialog">
						<div class="modal-content" style="margin-top:100px;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" style="text-align:center;">Anda Yakin Ingin Menghapus Dokumen Ini?</h4>
							</div>
							
							<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
								<a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
								<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Javascript untuk popup modal Edit--> 
				<script type="text/javascript">
				$(document).ready(function () {
					$(".open_modal").click(function(e) {
						var m = $(this).attr("id");
						$.ajax({
							url: "modal_edit.php",
							type: "GET",
							data : {kode_dokumen: m,},
							success: function (ajaxData){
								$("#ModalEdit").html(ajaxData);
								$("#ModalEdit").modal('show',{backdrop: 'true'});
							}
							});
						});
					});
				</script>

				<!-- Javascript untuk popup modal Delete--> 
				<script type="text/javascript">
					function confirm_modal(delete_url)
					{
					$('#modal_delete').modal('show', {backdrop: 'static'});
					document.getElementById('delete_link').setAttribute('href' , delete_url);
					}
				</script>
				
			</section>
		</div>
	</div>
</section>

<?php

require "_footer.php";

$connect->close();

?>