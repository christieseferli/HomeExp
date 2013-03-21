<div class="main_content">
    <div id="msg"> <?php echo $message; ?> </div>
    <div id="form_log">
        <form name="login" action="index.php?page=login&action=login"  method="post">
            <p class="log">Hey! Log In or <a href='index.php?page=register' style="font-size: 15px;color: rgb(99, 105, 22);font-weight: bold;text-decoration: none;">Register</a></p>
            <label for="username" style="color: #23362B;font-size: 18px;font-weight: bold;">Username:</label>
            <input type="text" name="username" id="username" style="background-color: rgb(250, 255, 189);"/>
            <label for="password" style="color: #23362B;font-size: 18px;font-weight: bold;">Password:</label>
            <input type="password" name="password" id="password" style="background-color: rgb(250, 255, 189);"/><br/><br/>
            <input type="hidden" name="formsubmitted" value="TRUE" />
            <input type="submit" name="submit" value="submit" style="margin-right: -492px;"/>
        </form>

    </div>
</div>
