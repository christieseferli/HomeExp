<div id="main_content">
    <div class="title-calculator">
        <?php

            $sql = "SELECT * FROM payments WHERE Username='" . $_SESSION['Auth']['username'] . "' ORDER BY ID DESC LIMIT 1";
            $result =  mysql_query($sql);
            $row = mysql_fetch_assoc($result);

            $startUnixtimestamp = strtotime($row['Date']);
            $endUnixtimestamp = time();

            $dbStart = date('Y-m-d H:i:s', $startUnixtimestamp);
            $dbEnd = date('Y-m-d H:i:s', $endUnixtimestamp);
            $displayStart = date('d/m/Y H:i', $startUnixtimestamp);
            $displayEnd = date('d/m/Y H:i', $endUnixtimestamp);

            echo 'Check your Expenses from day ' .'<span style="font-size:20px;">'. $displayStart .'</span>'. ' to ' . '<span style="font-size:20px;">'. $displayEnd. '</span>'; ?>
    </div>
    <div id="table">
        <?php
            $sql = "SELECT * FROM expenses WHERE Username='" . $_SESSION['Auth']['username'] . "' AND Date >= '" . $dbStart . "' AND Date <= '" . $dbEnd . "' ORDER BY ID DESC LIMIT 10";

            $result = mysql_query($sql, $lnk);
                echo "<table>
                    <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Cost</th>
                    </tr>";
            $sum = 0;
            $total = 0;
            $total2 = 0;
            if ($_SESSION['Auth']['username']==thanasis){
                while ($row = mysql_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['ID'] . " " . '</td>';
                    echo '<td>' . $row['Username'] . " " . '</td>';
                    echo '<td>' . $row['Date'] . " " . '</td>';
                    echo '<td>' . $row['Description'] . " " . '</td>';
                    echo '<td>' . $row['Cost'] . " " . '</td>';
                    echo '</tr>';
                $sum = $sum + $row['Cost'];
//              $total= $sum/4;
                 $total2= ($sum/3)*2; //otan tha erthei i dora $total2= ($sum/4)*2;
           }
           echo '</table>';

     ?>
     <div class="text">
     <?php
        echo "The amount you spent this week is". " ". $sum . " ". "euro". "<br/>";
//      echo "The amount dora owe you is". " ". $total . " ". "euro". "<br/>";
        echo "The amount christie_ethan owe you is". " ". number_format($total2,2). " ". "euro";?>
     </div>
     
    <?php
        }elseif ($_SESSION['Auth']['username']==christie) {
            while ($row = mysql_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['ID'] . " " . '</td>';
                echo '<td>' . $row['Username'] . " " . '</td>';
                echo '<td>' . $row['Date'] . " " . '</td>';
                echo '<td>' . $row['Description'] . " " . '</td>';
                echo '<td>' . $row['Cost'] . " " . '</td>';
                echo '</tr>';
            $sum = $sum + $row['Cost'];
            $total = ($sum/3); //otan tha erthei i dora $total=($sum/4)
      }
      echo '</table>';
   ?>
   <div class="text">
   <?php
      echo "The amount you spent this week is". " ". $sum ." ". "euro"."<br/>";
//    echo "The amount dora owe you is". " ". $total ." ". "euro"."<br/>";
      echo "The amount thanasis owe you is". " ". $total ." ". "euro"; ?>
   </div>
        
   <?php
       }elseif ($_SESSION['Auth']['username']==dora) {
            while ($row = mysql_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['ID'] . " " . '</td>';
                echo '<td>' . $row['Username'] . " " . '</td>';
                echo '<td>' . $row['Date'] . " " . '</td>';
                echo '<td>' . $row['Description'] . " " . '</td>';
                echo '<td>' . $row['Cost'] . " " . '</td>';
                echo '</tr>';
           $sum = $sum + $row['Cost'];
           $total = ($sum/4);
           $total2 = ($sum/4)*2;
    }
    echo '</table>';
  ?>
  <div class="text">
  <?php
     echo "The amount you spent this week is". " ". $sum ." ". "euro"."<br/>";
     echo "The amount thanasis owe you is". " ". $total ." ". "euro"."<br/>";
     echo "The amount christie_ethan owe you is". " ". $total2 ." ". "euro"; ?>
 </div>
        
        <?php
        }elseif ($_SESSION['Auth']['username']==ethan) {
            while ($row = mysql_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['ID'] . " " . '</td>';
                echo '<td>' . $row['Username'] . " " . '</td>';
                echo '<td>' . $row['Date'] . " " . '</td>';
                echo '<td>' . $row['Description'] . " " . '</td>';
                echo '<td>' . $row['Cost'] . " " . '</td>';
                echo '</tr>';
            $sum = $sum + $row['Cost'];
            $total = ($sum/3); //otan tha erthei i dora $total=($sum/4)
      }
      echo '</table>';
       ?>
      <div class="text">
      <?php
      echo "The amount you spent this week is". " ". $sum ." ". "euro"."<br/>";
//    echo "The amount dora owe you is". " ". $total ." ". "euro"."<br/>";
      echo "The amount thanasis owe you is". " ". $total ." ". "euro"; ?>
      </div>
        
      <?php
      }else {
        echo "none";
      } ?>
     </div>
     <div id="button">
        <ul>
            <li><a href="index.php?page=payment">Complete Payment</a></li>
        </ul>
     </div>
</div>