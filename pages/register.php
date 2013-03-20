<div id="main_content">
    <?php echo $msg . '<br />'; ?>
    <form id='register' action="index.php?page=register&action=register" method='post'>
<fieldset>
<legend>Register</legend>
<label for='username' >UserName*:</label>
<input type='text' name='username' id='username' maxlength="50" />
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />
<input type='submit' name='Submit' id='submit' />
</fieldset>
</form>
</div>
