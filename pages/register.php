<div class="main_content">
    <form action="index.php?page=register&action=register" method="post" id="register">
        <p class="log" style="margin-right: 597px;"> Create a new account</p>
        <label for name="username" style="color: #23362B;font-size: 18px;font-weight: bold;">Username*</label>
        <input type="text" name="username" id="username" style="background-color: rgb(250, 255, 189);">
        <label for name="email" style="color: #23362B;font-size: 18px;font-weight: bold;">E-mail*</label>
        <input type="text" name="email" id ="email" style="background-color: rgb(250, 255, 189);">
        <label for name="password" style="color: #23362B;font-size: 18px;font-weight: bold;">Password*</label>
        <input type="password" name="password" id="password" style="background-color: rgb(250, 255, 189);"><br/><br/>
        <input type="hidden" name="formsubmitted" value="TRUE" />
        <input type="submit" name="register" id="submit" style="margin-left: 751px;">
    </form>
</div>
