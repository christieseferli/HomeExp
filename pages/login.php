<div id="main_content">
    <div id="msg"> <?php echo $message; ?> </div>
    <div id="form_log">
        <form name="login" action="index.php?page=login&action=login" method="post">
            <p class="log">Hey! Log In</p>
            <input type="text" name="username" id="username"/><br/><br/>
<!--            <input type="text" name="password" id="password"/><br/><br/>-->
            <input type="submit" name="submit" value="submit"/>
        </form>
    </div>
    <?php // if($page = 'login'){
//     echo "<a href='index.php?page=register'>Register</a>";
    //} ?>
</div>
