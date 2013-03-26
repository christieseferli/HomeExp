<div class="main_content">
    <h2 class="title"><?php  echo "Shopping List Items";?></h2>
    <div id="form">
        <form name="list" action="index.php?page=shoplist&action=shoplist" method="post">
            Product: <input type="text" name="Product" value="" class="fields_add">
            Quantity: <input type="text" name="Quantity" value="" class="fields_add">
            <input type="submit" value="add" class="submit_add">
        </form>
        </div>


      <div id="table">
        <?php

        $list = "SELECT * FROM shop_list";
        $result_list = mysql_query($list,$lnk);
         echo '<table id="table_all"">
                    <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Added by User</th>
                    <th></th>
                    </tr>';

        while($row_list = mysql_fetch_assoc($result_list)){
                echo '<tr>';
                echo '<td>' . $row_list['id'] . " " . '</td>';
                echo '<td>' . $row_list['product'] ." ". '<a onclick="return confirm(\'Are you sure?\');" href="index.php?page=edit&id='.$row_list['id'].'" class="edit">Edit</a>'. ' </td>';
                echo '<td>' . $row_list['quantity'] ." ".'<a onclick="return confirm(\'Are you sure?\');" href="index.php?page=edit_quantity&id='.$row_list['id'].'" class="edit">Edit</a>'. '</td>';
                echo '<td>' . $row_list['username'] . " " . '</td>';
                echo "<td class='table_all_link'>". '<a onclick="return confirm(\'Are you sure?\');" href="index.php?page=delete_item&id='.$row_list['id'].'">Delete</a>'. '</td>';
                echo '</tr>';
        }
                echo '</table>';

        ?>
      </div>
</div>