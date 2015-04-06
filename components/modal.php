<div id="modal" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Social Login -->
			<div class="social_login">
				<!-- <div>
					<a href="#" class="social_box fb">
						<span class="icon"><i class="fa fa-facebook"></i></span>
						<span class="icon_title">Connect with Facebook</span>
						
					</a>

					<a href="#" class="social_box twitter">
						<span class="icon"><i class="fa fa-twitter"></i></span>
						<span class="icon_title">Connect with Twitter</span>
					</a>
				</div> -->
                
				<div class="centeredText">
					<span>Would you like to sign-up or Register?</span>
				</div>
        
				<div class="action_btns">
					<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
					<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
				</div>
			</div>

			<!-- Username & Password Login form -->
			<div class="user_login">
				<form id="loginForm" action="" method="post">
					<label for="UserName">Email / Username</label>
					<input type="text" name="UserName" required/>
					<br />

					<label for="password">Password</label>
					<input type="password" name="UserPass" required/>
					<br />
					<input type="hidden" name="loginSent"/>
					<br />
					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><a id="loginButton" href="#" class="btn btn_red">Login</a></div>
					</div>
				</form>
			</div>

			<!-- Register Form -->
			<div class="user_register">
				<form id="registerForm" action="" method="post">
					<label for="user_firstname">First Name</label>
					<input type="text" name="user_firstname" required/>
					<br />
					<label for="user_lastname">Last Name</label>
					<input type="text" name="user_lastname" required/>
					<br />
					
					<label for="UserName">User Name</label>
					<input type="text" name="UserName" required/>
					<br />

					<label for="user_email">Email Address</label>
					<input type="email" name="user_email" data-parsley-trigger="change" required />
					<br />

					<label for="UserPass">Password </label>
					<input type="password" name="UserPass" data-parsley-minlength="8" data-parsley-minlength-message = "The password needs to be atleast 8 characters" required/>
					<br />
					
					<label for="password_repeat">Password Repeat</label>
					<input type="password" name="password_repeat" required/>
					<br />
					<input type="hidden" name="registrationSent"/>
					<br />
					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><a href="#" id="registerButton" class="btn" >Register</a></div>
					</div>
				</form>
			</div>		
		</section>
	</div>