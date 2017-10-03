<?php

include "_header.php";

?>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>SISTEM INFORMASI JAMINAN MUTU</h2>
					<p>Pusat Informasi Unit Jaminan Mutu - PSTBM</p>
					<ul class="actions">
						<li class="special box">
							<h3>Form LOGIN</h3>
							<form action="cek_login.php" method="POST">
								<input type="text" name="username" required="true" placeholder="Username Anda" />
								<input type="password" name="pass" required="true" placeholder="Password Anda" />
								<input type="submit" class="button big special" value="LOGIN" />
							</form>
						</li>
					</ul>
				</div>
			</section>	
			
<?php

include "_footer.php";

?>