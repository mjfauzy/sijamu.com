<?php

include "../koneksi.php";

$kode_dokumen = $_GET['kode_dokumen'];
$result = mysql_query("SELECT * FROM tbl_dokumen WHERE kode_dokumen = '$kode_dokumen'");
while($row = mysql_fetch_array($result)){

?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Show Details Dokumen</h4>
        </div>

        <div class="modal-body">
        	<div class="form-group" style="padding-bottom: 20px;">
                <label for="Modal Name">Kode Dokumen</label>
                <input type="text" name="kode_dokumen"  class="form-control" value="<?php echo $row['kode_dokumen']; ?>" />
            </div>

            <div class="form-group" style="padding-bottom: 20px;">
                <label for="Modal Name">Judul Dokumen</label>
                <input type="text" name="judul_dokumen"  class="form-control" value="<?php echo $row['judul_dokumen']; ?>" />
            </div>

	        <div class="modal-footer">
                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Close
                </button>
	        </div>

        <?php } ?>

        </div>

           
        </div>
    </div>