<?php include("books-sidebar.php") ?>
    <div id="aa">
        <h1>Damaged Books</h1>
        <table>
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Category</th>
                <th>Number of Copies</th>
                <th>Date Added</th>
                <th>Author</th>
            </tr>
            <?php $user_query = mysqli_query($mysqli, "select * from book where status = 'damage'") or die(mysqli_error($mysqli));
            while ($row = mysqli_fetch_array($user_query)) {
                $id = $row['book_id'];
                $cat_id = $row['category_id'];
                $book_copies = $row['book_copies'];

                $borrow_details = mysqli_query($mysqli, "select * from borrowdetails where book_id = '$id' and borrow_status = 'pending'");
                $row11 = mysqli_fetch_array($borrow_details);
                $count = mysqli_num_rows($borrow_details);

                $total = $book_copies - $count;
                /* $t4otal =  $book_copies  - $borrow_details;
                                           
                                           echo $total; */
                $cat_query = mysqli_query($mysqli, "select * from category where category_id = '$cat_id'") or die(mysqli_error($mysqli));
                $cat_row = mysqli_fetch_array($cat_query);
                ?>
                <tr>
                    <td><?php echo $row['isbn'] ?></td>
                    <td><?php echo $row['book_title'] ?></td>
                    <td><?php echo $cat_row ['classname'] ?></td>
                    <td><?php echo $total ?></td>
                    <td><?php echo $row['date_added']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>