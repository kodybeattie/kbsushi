
@include ('layouts.nav')

<?php
$email_address = "";

if (isset($_POST['email_address']))
{
    $email = $_POST['email_address']; 
}

?>



    <div class="limiter background-display">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="{{route('login')}}" method="post">
                  {{ csrf_field() }}

                    <span class="login100-form-logo">
                        <i class="far" style="color:#5a3791;">&#xf2bd;</i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Email">
                        <input class="input100" type="text" name="email_address" placeholder="Email">

                        <span class="focus-input100 fa" data-placeholder="&#xf007;"></span>

                        <span class="focus-input100 fa" data-placeholder="&#xf007;" value="<?php echo $email_address; ?>"></span>

                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100 fa" data-placeholder="&#xf023;"></span>
                    </div>


                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-90">
                        <a class="txt1" href="https://fontawesome.bootstrapcheatsheets.com/#">
                            Forgot Password?
                        </a>
                    </div>
                    @include ('layouts.error')
                </form>
            </div>
        </div>
    </div>
    @include ('layouts.foot')
