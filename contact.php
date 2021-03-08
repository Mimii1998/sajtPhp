<?php
	session_start();
	include "pages/head.php";
	include "pages/header.php";
?>
<div class="slider-bg slider2">
	<h2 class="sliderText2">contact</h2>
</div>
</div>
</div>
<div class="content-bg">
<div class="wrap">
<div class="main">
<div class="section group">				
		<div class="col span_1_of_3">
			<div class="contact_info">
			 	<h3>Find Us Here</h3>
				<div class="map">
					<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
				</div>
      		</div>
      		<div class="company_address">
			  	<h3>Company Information :</h3>	
			  	<h4>Album and Music store</h4>
				<p>20 avenue de bardanac</p>
				<p>France</p>
				<p>Phone:(00) 222 666 444</p>
				<p>Fax: (000) 000 00 00 0</p>
				<p>Email: <a href="mailto:info@example.com"><span>info@mycompany.com</span></a></p>
			    <p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
			</div>
		</div>				
		<div class="col col1 span_2_of_4">
			  <div class="contact-form">
			  	<h3>Contact Us</h3>
				    <form>
				    	<div>
					    	<span><label>FULL NAME</label></span>
							<span><input type="text" value="" id="tbIme" placeholder="Enter Your Full Name.."></span>
							<label id="greskaName">Example : John Tompson</label>
					    </div>
					    <div>
					    	<span><label>E-MAIL</label></span>
							<span><input type="text" value="" id="tbFormaMail" placeholder="Enter Your Email.."></span>
							<label id="greskaMail">Example : example@gmail.com</label>
					    </div>
					    <div>
					     	<span><label>MOBILE</label></span>
							<span><input type="text" value="" id="tbMobilni" placeholder="Enter Your Mobile.."></span>
							<label id="greskaMobilni">Example : 0621234567</label>
					    </div>
					    <div>
					    	<span><label>SUBJECT</label></span>
							<span><textarea id="textContact"> </textarea></span>
							<label id="greskaSubject">Example : Hello World</label>
					    </div>
					   <div>
								 <span><input type="button" value="Submit" id="btnPosalji"></span>
					  </div>
	     	    </form>
		    </div>
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
<script src="assets/js/contact.js" type="text/javascript"></script>
</body>
</html>