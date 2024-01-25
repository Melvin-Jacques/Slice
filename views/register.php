<?php echo "register page"; ?>
<div class="container">
    <div class="center">
        <h1>Register</h1>
        <form action="" method="POST">
            <div class="txt_field">
                <input value="username" type="text" name="text" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input value="username" type="text" name="text" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input value="password" type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forget Password?</div>
            <input name="submit" type="Submit" value="register">
            <div class="signup_link">
                Already registered ? <a href="?page=login">Login</a>
            </div>
        </form>
    </div>
</div>