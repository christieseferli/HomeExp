<div id="main_content">
        <h2 class="title"><?php  echo "Check and Add your Home Expenses";?></h2>
        <div id="form">
        <form name="add" action="index.php?page=add&action=add" method="post">
            Description: <input type="text" name="Description" value="" style="margin-right: 10px;">
            Cost: <input type="text" name="Cost" value="" style="margin-right: 10px;">
            <div style="margin-top: 15px;margin-right: 260px;">
            <input type="checkbox" name="users[<?php echo $_SESSION['Auth']['username']; ?>]" value="1" id="checkbox" checked="checked"/> <label for="check"><?php echo $_SESSION['Auth']['username']; ?></label>
        <?php
            $sql = "SELECT username FROM members WHERE username != '".$_SESSION["Auth"]["username"]."';";
            $result = mysql_query($sql,$lnk);
            while ($row = mysql_fetch_assoc($result)){
                echo '<input type="checkbox" name="users['.$row['username'].']" value="'.$row['username'].'" id="checkbox" ><label for="checkbox">'.$row['username'].'</label>';
            }
        ?>
            </div>
            <input type="submit" value="submit" style="margin-top: 15px;margin-right: 452px;">
        </form>
        </div>

        <div class="title-calculator">
        <?php
            if (empty($_GET['time'])) {
                //Pote egine to teleutaio complete payment?
                $sql = "SELECT * FROM payments ORDER BY ID DESC LIMIT 1";
                $result =  mysql_query($sql);
                $row = mysql_fetch_assoc($result);
                //Apo to teleytaio complete payment mexri tora
                $startUnixtimestamp = strtotime($row['Date']);
                $endUnixtimestamp = time();
            } else {
                //Pote egine to teleutaio complete payment?
                $sql = "SELECT * FROM payments WHERE Date < '".date('Y-m-d H:i', $_GET['time'])."' ORDER BY ID DESC LIMIT 1";
                $result =  mysql_query($sql);
                $row = mysql_fetch_assoc($result);
                //Apo to teleytaio complete payment mexri tora
                $startUnixtimestamp = strtotime($row['Date']);
                $endUnixtimestamp = $_GET['time'];
            }
            //Ftiakse imerominies gia database kai gia display
            $dbStart = date('Y-m-d H:i:s', $startUnixtimestamp);
            $dbEnd = date('Y-m-d H:i:s', $endUnixtimestamp);
            $displayStart = date('d/m/Y H:i', $startUnixtimestamp);
            $displayEnd = date('d/m/Y H:i', $endUnixtimestamp);

            ?>
    </div>
     <div id="table">
        <?php
            $count = 0;
            $sql = "SELECT * FROM expenses WHERE Date >= '" . $dbStart . "' AND Date <= '" . $dbEnd . "' ORDER BY ID DESC LIMIT 30";
            $result = mysql_query($sql, $lnk);
                echo '<table id="table_all">
                    <tr>
                    <th>ID</th>
                    <th>Paid by</th>
                    <th>Shared costs</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Cost</th>
                    <th> </th>
                    </tr>';

            while ($row = mysql_fetch_array($result)) {
                $count ++;
                $sqlUsers = "SELECT * FROM expenses_users WHERE expense_id = ".$row['ID'].";";
                $resultUsers = mysql_query($sqlUsers, $lnk);
                $users = array();
                while ($rowUsers = mysql_fetch_assoc($resultUsers)) {
                    $users[] = $rowUsers['username'];
                }
                echo '<tr>';
                echo '<td>' . $row['ID'] . " " . '</td>';
                echo '<td>' . $row['Username'] . " " . '</td>';
                echo '<td>' . implode(', ', $users) . '</td>';
                echo '<td>' . $row['Date'] . " " . '</td>';
                echo '<td>' . $row['Description'] . " " . '</td>';
                echo '<td>' . $row['Cost'] . " " . '</td>';
                echo "<td class='table_all_link'>". '<a href="index.php?page=delete&id='.$row['ID'].'">Delete</a>'. '</td>';
                echo '</tr>';
            }
            echo '</table>';
        ?>
        </div>
    </div>

