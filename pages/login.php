<div class="main_content">
 <div id="msg"> <?php echo $message; ?> </div>
 <p class="log">Hey! Log In or <a href='index.php?page=register' class="log_scr">Register</a></p>
    <div id="box_log">
    <div class="elements_log">

    <form action="index.php?page=login&action=login" method="post" style=" margin-top: 47px;">
        <input type="text" name="username" class="username" placeholder="Username"/>
        <input type="password" name="password" class="password" placeholder="Password" />
        <input type="hidden" name="formsubmitted" value="TRUE" />
        <input type="submit" name="submit" class="submit" value="Log In">
    </form>
    </div>
    </div>
</div>


<!--<div class="main_content">
    <div id="msg"> <?php // echo $message; ?> </div>
    <div id="form_log">
        <form name="login" action="index.php?page=login&action=login"  method="post">
            <p class="log">Hey! Log In or <a href='index.php?page=register' class="log_scr">Register</a></p>
            <label for="username" class="label_log">Username:</label>
            <input type="text" name="username" id="username" class="fields_log"/>
            <label for="password" class="label_log">Password:</label>
            <input type="password" name="password" id="password" class="fields_log"/><br/><br/>
            <input type="hidden" name="formsubmitted" value="TRUE" />
            <input type="submit" name="submit" value="login" class="submit_log"/>
        </form>
    </div>
</div>-->


