<?php
	session_start();
	include "pages/head.php";
	include "pages/header.php";
?>

	
	<div class="slider-bg" id="slider">
		<h2 class="sliderText">Music Box</h2>
	</div>
	<div class="content-bg">
		<div class="wrap">
			<div class="main">
				<div class="content">
					<h2>Featured Albums</h2>
					<div class="section group" id="prikazProizvoda">
						<?php
							include "features.php"
						?>
					</div>
					<h2 class="bg">Our Specials</h2>
					<div class="section group" id="prikazSpecial">
						<?php
							include "specialAlbums.php"
						?>
					</div>
				</div>
				<div class="surveyContainer">
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
			include "pages/footer.php";
		?>
	</div>


	<script src="assets/js/jquery.flipster.js"></script>
	<script>
		

		$(function () {
			$(".flipster").flipster({
				style: 'carousel',
				start: 0
			});
		});

		
	</script>
</body>

</html>