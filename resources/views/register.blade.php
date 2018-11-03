  
@include ('layouts.nav')

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    
<div class="limiter background-display">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="fa">&#xf263;</i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter firstName">
						<input class="input100" type="text" name="firstName" placeholder="First Name">
						<span class="focus-input100 fa" data-placeholder="&#xf007;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter lastName">
						<input class="input100" type="text" name="lastName" placeholder="Last Name">
                        <span class="focus-input100 fa" data-placeholder="&#xf007;">
                            
                        </span>
                        
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100 fa" data-placeholder="&#xf003;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Phone Number">
						<input class="input100" type="text" name="Phone Number" placeholder="Phone Number">
						<span class="focus-input100 fa" data-placeholder="&#xf095;"></span>
                    </div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100 fa" data-placeholder="&#xf023;"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate="password confirm">
						<input class="input100" type="password" name="confrimPassword" placeholder="Confirm Pasword">
						<span class="focus-input100 fa" data-placeholder="&#xf023;"></span>
					</div>

	

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Register
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
    @include ('layouts.foot')