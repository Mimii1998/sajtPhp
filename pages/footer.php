<?php
include "config/konekcija.php";
$upit = "SELECT * FROM informacija";
$rezultat = $konekcija->query($upit);

echo "<div class='wrap'>
			<div class='footer'>
				<div class='section group'>
					<div class='grid_1_of_4 images_1_of_4'>
						<h3>About Us</h3>
						<p>We love music - There is plenty to choose in our huge selection of CD albums including rock, pop, dance, reggae, jazz and much more. Customers who appreciate good music, will find on The Free Music-Box a pleasurable experience.</p>
					</div>
					<div class='grid_1_of_4 images_1_of_4'>
					<h3>Recent Posts</h3>
					<ul class='f-nav'>
						<li>
							<a href='https://www.facebook.com/' target='_blank'>
								<img src='assets/images/facebook.png' alt='' />Facebook</a>
						</li>
						<li>
							<a href='https://twitter.com/'target='_blank'>
								<img src='assets/images/twitter.png' alt='' />Twitter</a>
						</li>
						<li>
							<a href='https://plus.google.com/discover'target='_blank'>
								<img src='assets/images/gplus.png' alt='' />Google+</a>
						</li>
					</ul>
				</div>

					<div class='grid_1_of_4 images_1_of_4'>
						<h3>Information</h3>
                        <ul class='f-nav'>";
                        foreach($rezultat as $rez){
							echo "<li>
								<a href='$rez->putanja' target='_blank'>$rez->naziv</a>
                            </li>";
                        };
						echo "</ul>
					</div>
					<div class='grid_1_of_4 images_1_of_4'>
						<h3>Latest Music</h3>
						<p>
							<a href='models/specials.html'>
								<img src='assets/images/art-pic1.jpg' alt='' />Back to Black is the second and latest final studio album by English singer B. Robson. It was released on 27. February 2019.</a>
						</p>
						<p class='top'>
							<a href='models/specials.html'>
								<img src='assets/images/art-pic2.jpg' alt='' />Love Metal is the fourth studio album by Finnish gothic rock band HIM</a>
						</p>
					</div>
				</div>
			</div>
		</div>";