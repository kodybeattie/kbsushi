
@include ('layouts.nav')

<?php
$first_name = "";
$last_name = "";
$email_address = "";
$phone_number = "";

    if (isset($_POST['first_name']))
    {
        $email = $_POST['first_name']; 
    }

    if (isset($_POST['last_name']))
    {
        $email = $_POST['last_name']; 
    }

    if (isset($_POST['email_address']))
    {
        $email = $_POST['email_address']; 
    }

    if (isset($_POST['phone_number']))
    {
        $email = $_POST['phone_number']; 
    }

?>

<div class="limiter background-display">

    <div class="container-login100">

        <div class="wrap-login100">

            <form action="{{route('register')}}" method="post" >

                {{ csrf_field() }}

                <span class="login100-form-logo">
                    <i class="far fa-spin " style="color:#5a3791;">&#xf2bd;</i>
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    Register
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Enter firstName">
                    <input class="input100" type="text" name="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" required>
                    <span class="focus-input100 fas" data-placeholder="&#xf504;"  style="color:white;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Enter lastName">
                    <input class="input100" type="text" name="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" required>
                    <span class="focus-input100 fas" data-placeholder="&#xf504;">

                    </span>

                </div>

                <div class="wrap-input100 validate-input" data-validate = "Enter email">
                    <input class="input100" type="email" name="email_address" placeholder="Email" value="<?php echo $email_address; ?>" required>
                    <span class="focus-input100 fab " data-placeholder="&#xf59e;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Enter Phone Number">
                    <input class="input100" type="text" name="phone_number" placeholder="Phone Number" value="<?php echo $phone_number; ?>" required>
                    <span class="focus-input100 fa" data-placeholder="&#xf095;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password" required>
                    <span class="focus-input100 fa" data-placeholder="&#xf023;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="password confirm">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Pasword" required>
                    <span class="focus-input100 fa" data-placeholder="&#xf023;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Register
                    </button>
                </div>
                @include ('layouts.error')
            </form>
        </div>
    </div>
</div>

@include ('layouts.foot')
