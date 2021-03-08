<?php
	session_start();
	include "pages/head.php";
	include "pages/header.php";
?>
<div class="slider-bg slider2">
	<h2 class="sliderText2">specials</h2>
</div>
<div class="content-bg">
<div class="wrap">
<div class="main">
<div class="content">
	<h2>Our Products</h2>
	<div class="select" id="sortiranje">
		<div id="filters">
			<select id="selectPrductSort">
				<option value="0">Sort</option>
				<option value="1">Year: Low to High</option>
				<option value="2">Year: High to Low</option>
				<option value="3">Product Name: A to Z</option>
				<option value="4">Product Name: Z to A</option>
			</select>
		</div>

	<div id="prikazProizvoda">
		<?php
			include "ispisAlbuma.php";
		?>
	</div>
		<div id='paginacija'>
			<?php
				include "paginacija.php";
			?>
		</div>	
	<div class="clear"></div>
</div>
</div>
<div class="sidebar">
<div class="sidebar-list">
	<h2>Filter By Categories</h2>
		<ul id="prikazKategorije">
			<?php
				include "kategorije.php"
			?>
	</ul>
</div>
</div>
<div class="clear"></div>
</div>
</div>
</div>
<div class="footer-bg">
		<?php
			include "pages/footer.php";
		?>
	</div>
</div>
<script src="assets/js/special.js" type="text/javascript"></script>
</body>
</html>