<div class="main_content">
    <div class="title-calculator">
        <?php
            if (empty($_GET['time'])) {
                $sql = "SELECT * FROM payments ORDER BY ID DESC LIMIT 1";
                $result =  mysql_query($sql);
                $row = mysql_fetch_assoc($result);
                $startUnixtimestamp = strtotime($row['Date']);
                $endUnixtimestamp = time();
            } else {
                $sql = "SELECT * FROM payments WHERE Date < '".date('Y-m-d H:i', $_GET['time'])."' ORDER BY ID DESC LIMIT 1";
                $result =  mysql_query($sql);
                $row = mysql_fetch_assoc($result);
                $startUnixtimestamp = strtotime($row['Date']);
                $endUnixtimestamp = $_GET['time'];
            }
            $dbStart = date('Y-m-d H:i:s', $startUnixtimestamp);
            $dbEnd = date('Y-m-d H:i:s', $endUnixtimestamp);
            $displayStart = date('d/m/Y H:i', $startUnixtimestamp);
            $displayEnd = date('d/m/Y H:i', $endUnixtimestamp);
            echo 'Check your Expenses <br /> from'.'<span class="calc_date">'.' '. $displayStart .'</span>'. ' to ' . '<span class="calc_date">'. $displayEnd. '</span>'; ?>
    </div>
    <div class="text_dates">
        <?php
            $sql = "SELECT * FROM payments ORDER BY ID DESC LIMIT 10";
            $result =  mysql_query($sql);
            echo "<div id='text_past'>";
            echo 'Past Expenses:';
            echo '</div>';
            while($row = mysql_fetch_assoc($result)) {
                echo "<div class='past_dates'>";
                echo '<a href="index.php?page=calculator&time='.strtotime($row['Date']).'">'.$row['Date'].'</a>';
                echo '</div>';
            }
        ?>
    </div>
    <div id="table">
        <?php
            $count = 0;
            $sql = "SELECT * FROM expenses WHERE Date >= '" . $dbStart . "' AND Date <= '" . $dbEnd . "' ORDER BY ID DESC LIMIT 30";
            $result = mysql_query($sql, $lnk);
                echo '<table id="table_all_calc">
                    <tr>
                    <th>ID</th>
                    <th>Paid by</th>
                    <th>Shared costs</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Cost</th>
                    </tr>';
            $sum = 0;
            $total = 0;

            $sql_paid = "SELECT username FROM members ";
            $result_paid = mysql_query($sql_paid,$lnk);
            $paid = array();
            while($paid_user = mysql_fetch_assoc($result_paid)){
                $paid[] = $paid_user['username'];
                $paid_user['username'] = 0;
            }
            $sql_expenses = "SELECT username FROM members ";
            $result_expenses = mysql_query($sql_expenses,$lnk);
            $expenses = array();
            while($expenses_user = mysql_fetch_assoc($result_expenses)){
                $expenses[] = $expenses_user['username'];
                $expenses_user['username'] = 0;
            }
            $sql_balance = "SELECT username FROM members ";
            $result_balance = mysql_query($sql_balance,$lnk);
            $balance = array();
            while($balance_user = mysql_fetch_assoc($result_balance)){
                $balance[] = $balance_user['username'];
                $balance_user['username'] = 0;
            }

            while ($row = mysql_fetch_array($result)) {
                $count ++ ;
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
                echo '</tr>';
                $total += $row['Cost'];
                $paid[$row['Username']] += $row['Cost'];
                $expenseCost = $row['Cost'] / count($users);
                for ($i = 0; $i < count($users); $i++) {
                    $expenses[$users[$i]] += $expenseCost;
                }
            }
            echo '</table>';
            foreach ($paid as $username => $paidAmount) {
                $balance[$username] = $paid[$username] - $expenses[$username];
            }
            echo '<table id="table_calc">
                    <tr>
                    <th>Name</th>
                    <th>Thanasis</th>
                    <th>Christie</th>
                    <th>Ethan</th>
                    <th>Dora</th>
                    </tr>';
            echo '
                <tr>
                    <td>Paid</td>
                    <td>'.number_format($paid['thanasis'], 2).'</td>
                    <td>'.number_format($paid['christie'], 2).'</td>
                    <td>'.number_format($paid['ethan'], 2).'</td>
                    <td>'.number_format($paid['dora'], 2).'</td>
                </tr>
            ';
            echo '
                <tr>
                    <td>Should pay</td>
                    <td>'.number_format($expenses['thanasis'], 2).'</td>
                    <td>'.number_format($expenses['christie'], 2).'</td>
                    <td>'.number_format($expenses['ethan'], 2).'</td>
                    <td>'.number_format($expenses['dora'], 2).'</td>
                </tr>
            ';
            echo '
                <tr>
                    <td>Balance</td>
                    <td>'.number_format($balance['thanasis'], 2).'</td>
                    <td>'.number_format($balance['christie'], 2).'</td>
                    <td>'.number_format($balance['ethan'], 2).'</td>
                    <td>'.number_format($balance['dora'], 2).'</td>
                </tr>
            ';
            echo '</table>';
            echo '<div class="text">';

            while (!isBalancesEmpty($balance)) {
                asort($balance);
                $balanceUsers = array_keys($balance);
                $temp = $balanceUsers;
                $firstUser = array_shift($temp);
                $lastUser = array_pop($temp);
                $temp = $balance;
                $first = array_shift($temp);
                $last = array_pop($temp);
                $diff = abs($first) - abs($last);
                if ($diff >= 0) {
                    $payment = $last;
                    $balance[$firstUser] = round(-$diff, 2);
                    $balance[$lastUser] = 0;
                    echo '<span class="calc_text">'. $firstUser.'</span>'. " has to pay ". '<span class="calc_text">'.number_format($payment, 2)."&euro;". '</span>'." ". "to ".'<span class="calc_text" style="text-decoration:underline;">'.$lastUser.'</span>'.". New balance: ".number_format($balance[$firstUser], 2)."&euro;"."   "."<span class='pay_me'>".'<a onclick="return confirm(\'Are you sure?\');" href="index.php?page=additional&action=additional&from='.$firstUser.'&to='. $lastUser.'&amount='.number_format($payment, 2).'">'."pay me".'</a>'."</span>"."<br />";
                } elseif ($diff < 0) {
                    $payment = abs($first);
                    $balance[$firstUser] = 0;
                    $balance[$lastUser] = round(-$diff, 2);
                    echo '<span class="calc_text">'. $firstUser.'</span>'. " has to pay ". '<span class="calc_text">'.number_format($payment, 2)."&euro;". '</span>'." ". "to ".'<span class="calc_text" style="text-decoration:underline;">'.$lastUser.'</span>'.". New balance: ".number_format($balance[$firstUser], 2)."&euro;"."   "."<span class='pay_me'>".'<a onclick="return confirm(\'Are you sure?\');" href="index.php?page=additional&action=additional&from='.$firstUser.'&to='. $lastUser.'&amount='.number_format($payment, 2).'">'."pay me".'</a>'."</span>"."<br />";
                    }
            }
            echo '<br />';
            echo "Total amount spent this week is: &euro; ".number_format($total, 2)."<br />";
            echo '</div>';
     ?>
     </div>
    <?php if (($count != 0) && (empty($_GET['time']))): ?>
     <div id="button">
        <ul>
            <li><a href="index.php?page=payment&action=payment" class="calc"><span></span></a></li>
        </ul>
     </div>
    <?php endif; ?>
    </div>