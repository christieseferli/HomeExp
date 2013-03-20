<div id="main_content">
    <?php echo $msg . '<br />'; ?>
    <form id="invitePerson" action="index.php?page=register&action=invitePerson" accept-charset="utf-8" method='post'>
        <label for='email' >Email*:</label>
        <input type="email" name="email" id="email">
        <input type='submit' name='Submit' id='submit' />
    </form>
    <?php echo $msg . '<br />'; ?>
    <form id='register' action="index.php?page=register&action=register" accept-charset="utf-8" method='post'>
    <fieldset>
    <legend>Register</legend>
    <label for='username' >UserName*:</label>
    <input type='text' name='username' id='username' maxlength="20" />
    <label for='password' >Password*:</label>
    <input type='password' name='password' id='password' maxlength="20" />
    <label for='invitationCode' >Invitation Code*:</label>
    <input type='password' name='invitationCode' id='invitationCode'/>
    <input type='submit' name='Submit' id='submit' />
    </fieldset>
    </form>
</div>
