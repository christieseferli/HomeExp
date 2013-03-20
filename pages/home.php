<div id="main_content">
    <h2 class="title">Let's see the Last 10 Expenses</h2>
    <div id="table">
        <?php
        $sql = "SELECT * FROM expenses ORDER BY ID DESC LIMIT 10";
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