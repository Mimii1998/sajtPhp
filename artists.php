<?php
	session_start();
	include "pages/head.php";
	include "pages/header.php";
?>
</div>
</div>
<div class="slider-bg slider2">
	<h2 class="sliderText2">artist</h2>
</div>
<div class="content-bg">
<div class="wrap">
<div class="main">
<div class="content">
	<h2>Our Artists</h2>
	<div id="prikaziArtist">
			<?php
				include "izvodjaci.php"
			?>
	</div>
</div>
<div class="sidebar">
			<?php
				include "survey.php"
			?>
</div>
<div class="clear"></div>
</div>
</div>
</div>
<div class="footer-bg">
	<?php
		include "pages/footer.php"
	?>
</div>
</body>
</html>