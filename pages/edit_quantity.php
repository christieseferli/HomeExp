<div class="main_content">
<div id="form_edit">
        <form name="edit_quantity" action="index.php?page=edit_quantity&id=<?php echo $_GET['id']; ?>&action=edit_quantity" method="post">
            Quantity: <input type="text" name="Quantity" value="" class="fields_add">
                      <input type="submit" value="add" class="submit_add">
        </form>
</div>

<?php
$sql = "SELECT * FROM shop_list WHERE id = '".$_GET['id']."'";
$result=mysql_query($sql,$lnk);
        echo '<table id="table_edit"">
             <tr>
             <th>Quantity</th>
             </tr>';
$row = mysql_fetch_assoc($result);
        echo '<tr>';
        echo '<td>' . $row['quantity'] . " " . '</td>';
        echo '</tr>';
        echo '</table>';
?>
</div>