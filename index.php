<?php include('start.php');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
        <title>Home Page</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/print.css" type="text/css" media="all" />
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="logout">
                    <?php if (!empty($_SESSION['Auth'])):?>
                            <a href="index.php?page=logout"style="color: #5d5d5d;text-decoration: none;"><?php echo '<span style="font-size:22px;display:block;">LogOut</span>' . ' ' . '<span style="font-size:18px;">'. $_SESSION['Auth']['username'].'</span>' ;?></a>
                   <?php endif;?>
                </div>
                <div id="homeButton">
                    <?php if (isset($_GET['page']) && $page!='login' && $page!='register'):?>
                            <a href="index.php?page=home"style="display:inline-block;"><img src="css/photos/homeEXPlogo.png"></a>
                    <?php elseif (isset($_GET['page']) && $page == 'register'):?>
                            <a href="index.php?page=login"style="display:inline-block;"><img src="css/photos/homeEXPlogo.png"></a>
                    <?php else: ?>
                            <img src="css/photos/homeEXPlogo.png"></img>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(isset($_GET['page']) && $page!='login' && $page != 'register') include('menu.php');?>
            <?php include('pages/'.$page.'.php');?>
            <?php include ('footer.php');?>
        </div>
    </body>
</html>