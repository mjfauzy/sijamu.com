<?php

session_start();

require "_header.php";

?>


		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>SISTEM INFORMASI JAMINAN MUTU</h2>
					<p>Welcome <?php echo  $_SESSION['nama']." (".$_SESSION['id'].")"; ?></p>
				</div>
			</section>			

<?php

require "_footer.php";

?>