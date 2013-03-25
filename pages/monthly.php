<div class="main_content">
    <div class="title_mly">
    <?php
        if (empty($_GET['showMonth'])) {
            $currentMonth = date('m');
        } else {
            $currentMonth = $_GET['showMonth'];
        }
        if (empty($_GET['showYear'])) {
            $currentYear = date('Y');
        } else {
            $currentYear = $_GET['showYear'];
        }

        $startUnixtimestamp = strtotime($currentYear . '-' . $currentMonth . '-01 00:00:00');
        $endUnixtimestamp   = strtotime('+1 month -1 second', $startUnixtimestamp);

        $dbStart = date('Y-m-d', $startUnixtimestamp);
        $dbEnd = date('Y-m-d', $endUnixtimestamp);
        $displayStart = date('d/m/Y', $startUnixtimestamp);
        $displayEnd = date('d/m/Y', $endUnixtimestamp);
        echo 'Check your Monthly Expenses <br />from '.' '.'<span style="font-size:16px;">'. $displayStart .'</span>'. ' to ' . '<span style="font-size:16px;">'. $displayEnd .'</span>';
    ?>
    </div>
    <div id="navigation_months">
        <ul>
            <li><a href="index.php?page=monthly&showMonth=01&showYear=2013"><span>January 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=02&showYear=2013"><span>February 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=03&showYear=2013"><span>March 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=04&showYear=2013"><span>April 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=05&showYear=2013"><span>May 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=06&showYear=2013"><span>June 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=07&showYear=2013"><span>July 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=08&showYear=2013"><span>August 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=09&showYear=2013"><span>September 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=10&showYear=2013"><span>October 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=11&showYear=2013"><span>November 13</span></a></li>
            <li><a href="index.php?page=monthly&showMonth=12&showYear=2013"><span>December 13</span></a></li>
      </ul>
   </div>
   <div id="table">
        <?php
            $sql = "SELECT * FROM expenses WHERE Username='" . $_SESSION['Auth']['username'] . "' AND Date >= '" . $dbStart . "' AND Date <= '" . $dbEnd . "' ORDER BY ID DESC LIMIT 100";
            $result = mysql_query($sql, $lnk);
                echo '<table id="table_all">
                    <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Cost</th>
                    </tr>';
                while ($row = mysql_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['ID'] . " " . '</td>';
                    echo '<td>' . $row['Username'] . " " . '</td>';
                    echo '<td>' . $row['Date'] . " " . '</td>';
                    echo '<td>' . $row['Description'] . " " . '</td>';
                    echo '<td>' . $row['Cost'] . " " . '</td>';
                    echo '</tr>';
                }
                    echo '</table>';
        ?>
  </div>
</div>
