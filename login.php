<?php
	session_start();
	include "pages/head.php";
	include "pages/header.php";
?>
</div>
</div>
<div class="slider-bg slider2">
	<h2 class="sliderText2">Login | Registration</h2>
</div>
<div class="content-bg">
<div class="wrap">
<div class="main">
<div class="section group">				
		<div class="col span_1_of_3">
			<div class="contact_info">
			 	<h3>Log In</h3>
      		</div>
      		<div class="company_address">
					<form>
                <div>
                    <span><label class="logovanje">E-MAIL</label></span>
                    <span><input type="text" value="" id="tbLoginEmail" name="tbLoginEmail" placeholder="Enter Your E-mail.."/></span>
                </div>
                <div>
                    <span><label class="logovanje">PASSWORD</label></span>
                    <span><input type="password" value="" id="tbLoginPass" name="tbLoginPass" placeholder="Enter Your Password.."/></span>
                </div>
                <div>
					<span><input type="button" value="Log in" id="btnLogin" name="btnLogin"></span>
					  </div>
						</form>
			</div>
		</div>				
		<div class="col col1 span_2_of_4">
			  <div class="contact-form">
			  	<h3>Register</h3>
				    <form>
				    	<div>
					    	<span><label>FIRST NAME</label></span>
							<span><input type="text" value="" id="tbIme" name="ime" placeholder="Enter Your First Name.."></span>
							<label id="greskaName">Example : John </label>
                        </div>
                        <div>
					    	<span><label>LAST NAME</label></span>
							<span><input type="text" value="" id="tbPrezime" name="prezime" placeholder="Enter Your Last Name.."></span>
							<label id="greskaPrezime">Example : Tompson</label>
					    </div>
					    <div>
					    	<span><label>E-MAIL</label></span>
							<span><input type="text" value="" id="tbFormaMail" name="email" placeholder="Enter Your Email.."></span>
							<label id="greskaMail">Example : example@gmail.com</label>
					    </div>
					    <div>
                            <span><label>PASSWORD</label></span>
                            <span><input type="password" value="" id="tbFormaLozinka" name="sifra" placeholder="Enter Your Password.."></span>
							<label id="greskaSifra">Example : Lozinka123</label>
					   <div>
							<span><input type="button" value="Register" id="registracija" name="registracija"></span>
					  </div>
	     	    </form>
		    </div>
  		</div>				
</div>
<div class="clear"></div>
</div>
</div>
</div>
</div>
<div class="footer-bg">
		<?php
			include "pages/footer.php"
		?>
</div>
<script src="assets/js/login.js" type="text/javascript"></script>
</body>
</html>