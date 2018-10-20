  
@include ('layouts.nav')


    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form">
                    <span class="login100-form-logo">
                        <i class="fa">&#xf263;</i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter user name">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100 fa" data-placeholder="&#xf007;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pass" placeholder="Password">
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
                </form>
            </div>
        </div>
    </div>
    @include ('layouts.foot')