<?php
    echo $reslt;
?>
<form action='' method='POST'>
    <p>
        <label>Email</label>
            <input id='email' value='' name='email' type='text' required='required' /><br>
    </p>
    <p>
        <label>Password</label>
            <input id='password' name='password' type='password' required='required' />
    </p>
    <br />
    <p>
        <button type='submit' name='submit'><span>Login</span></button> <button type='reset'><span></span></button>
    </p>
</form>