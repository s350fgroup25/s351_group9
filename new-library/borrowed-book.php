<?php include("books-sidebar.php") ?>
<div id="aa">
    <h1>Borrowed Books</h1>
    <hr>
    <table>
        <tr>
            <th>ISBN</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Start Date</th>
            <th>Due Date</th>
            <th>Borrower ID</th>
            <th>Action</th>
        </tr>
        <?php $result=mysqli_query($mysqli,"select * from borrowdetails where borrow_status='pending';")
        or die(mysqli_error($mysqli));
        while($row=mysqli_fetch_array($result)){
            $book_id=$row["book_id"];
            $result2=mysqli_query($mysqli,"select * from book where book_id=$book_id;")
            or die(mysqli_error($mysqli));
            $row2=mysqli_fetch_array($result2);
            $cat_id=$row2["category_id"];
            $cat_query = mysqli_query($mysqli, "select * from category where category_id = '$cat_id'") or die(mysqli_error($mysqli));
            $cat_row = mysqli_fetch_array($cat_query);
            $borrow_id=$row["borrow_id"];
            $result3=mysqli_query($mysqli,"select * from borrow where borrow_id=$borrow_id;")
            or die(mysqli_error($mysqli));
            $row3=mysqli_fetch_array($result3);
            ?>
            <tr>
            <td><?php echo $row2["isbn"];?></td>
            <td><?php echo $row2["book_title"];?></td>
            <td><?php echo $cat_row["classname"];?></td>
            <td><?php $due_date = DateTime::createFromFormat('d/m/Y', $row3["due_date"]);
            $current_date = new DateTime();
            if ($due_date>=$current_date){
                echo "Borrowed";
            }
            else{echo "Expired";}
            ?></td>
            <td><?php echo $row3["date_borrow"];?></td>
            <td><?php echo $row3["due_date"];?></td>
            <td><?php echo $row3["member_id"];?></td>
            <td><a style="background-color: bisque;"
            href="return.php?isbn=<?php echo $row2['isbn']?>">Return</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>