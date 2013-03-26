<div class="main_content">
    <h2 class="title"><?php  echo "Edit Product";?></h2>
<div id="form_edit">
        <form name="edit" action="index.php?page=edit&id=<?php echo $_GET['id']; ?>&action=edit" method="post">
            Product: <input type="text" name="Product" value="" class="fields_add">
                     <input type="submit" value="add" class="submit_add">
        </form>
</div>

<?php
$sql = "SELECT * FROM shop_list WHERE id = '".$_GET['id']."'";
$result=mysql_query($sql,$lnk);
        echo '<table id="table_edit"">
             <tr>
             <th>Product</th>
             </tr>';
$row = mysql_fetch_assoc($result);
        echo '<tr>';
        echo '<td>' . $row['product'] . " " . '</td>';
        echo '</tr>';
        echo '</table>';
?>
</div>