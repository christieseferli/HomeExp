<div class="main_content">
    <form action="index.php?page=register&action=register" method="post" id="register">
        <p class="log_reg"> Create a new account</p>
        <label for name="username" class="label_reg">Username*</label>
        <input type="text" name="username" id="username" class="fields_reg">
        <label for name="email" class="label_reg">E-mail*</label>
        <input type="text" name="email" id ="email" class="fields_reg">
        <label for name="password" class="label_reg">Password*</label>
        <input type="password" name="password" id="password" class="fields_reg"><br/><br/>
        <input type="hidden" name="formsubmitted" value="TRUE" />
        <input type="submit" name="register" id="submit" class="submit_reg">
    </form>
</div>
