@include ('layouts.nav')

	
	<div class="limiter background-display">
		<div class="container-login100">
			<div class="wrap-login100">
				
            <form action="{{route('settings')}}" method="post" >
			
                {{ csrf_field() }}
				

					<span class="login100-form-logo">
                    <i class="far " style="color:#5a3791;">&#xf2bd;</i>
					</span>
				

					<span class="login100-form-title p-b-34 p-t-27">
						Settings
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter firstName">
						<input class="input100" type="text" name="first_name" value= {{ $user->first_name }}>
						<span class="focus-input100 fas" data-placeholder="&#xf504;"  style="color:white;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter lastName">
						<input class="input100" type="text" name="last_name" value= {{ $user->last_name }}>
						<span class="focus-input100 fas" data-placeholder="&#xf504;">
                            
                        </span>
                        
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email_address" value={{ $user->email_address }}>
						<span class="focus-input100 fab " data-placeholder="&#xf59e;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Phone Number">
						<input class="input100" type="text" name="phone_number" placeholder={{ $user->phoneNumber($user->phone_number) }}>
						<span class="focus-input100 fa" data-placeholder="&#xf095;"></span>
                    </div>

					<div class="wrap-input100 validate-input" data-validate="Enter password" >
						<input class="input100" type="password" name="password" placeholder="Old Password" required>
						<span class="focus-input100 fa" data-placeholder="&#xf023;"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate="password confirm">
						<input class="input100" type="password" name="new_password" placeholder="New Pasword">
						<span class="focus-input100 fa" data-placeholder="&#xf023;"></span>
					</div>

	

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Update
						</button>
					</div>
					@include ('layouts.error')

				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>

</body>

@include('layouts.foot')