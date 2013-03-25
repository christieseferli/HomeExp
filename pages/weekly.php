<div class="main_content">
    <div class="title_wly">
    <?php
    $startUnixtimestamp = strtotime('last monday', strtotime('tomorrow'));
    $endUnixtimestamp   = strtotime('next sunday', $startUnixtimestamp);

    $dbStart      = date('Y-m-d', $startUnixtimestamp);
    $dbEnd        = date('Y-m-d', $endUnixtimestamp);
    $displayStart = date('d/m/Y', $startUnixtimestamp);
    $displayEnd   = date('d/m/Y', $endUnixtimestamp);
    echo 'Check your Weekly Expenses <br /> from ' . '<span style="font-size:16px;">'. $displayStart .'</span>'. ' to ' .'<span style="font-size:16px;">'. $displayEnd .'</span>'; ?>
    </div>
    <div id="table">
        <?php
        $sql = "SELECT * FROM expenses WHERE Username= '" . $_SESSION['Auth']['username'] . "' AND Date >= '" . $dbStart . "' AND Date <= '" . $dbEnd . "' ORDER BY ID DESC LIMIT 10";
        $result = mysql_query($sql, $lnk);
        echo '<table id="table_all">
        <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Date</th>
        <th>Description</th>
        <th>Cost</th>
        </tr>';
        while ($row = mysql_fetch_assoc($result)) {
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