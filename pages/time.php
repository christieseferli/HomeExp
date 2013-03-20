<div id="main_content"> 
<div class="text">
        <?php
            
            $sql = "SELECT * FROM payments ORDER BY ID DESC LIMIT 1";
            $result =  mysql_query($sql);
            while($row = mysql_fetch_assoc($result)) {
                echo '<a href="index.php?page=time='.strtotime($row['Date']).'">'.$row['Date'].'</a><br />';
            }
        ?>
    </div>
    </div>
