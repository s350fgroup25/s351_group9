<?php include("member-sidebar.php"); ?>
<div id="aa">
    <h1>All Books</h1>
    <hr>
    <input type="text" id="fftt"><button onclick="searchbutton()">Search</button><br>
    <table>
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Category</th>
                <th>Copies Available</th>
                <th>Status</th>
                <th>Date Added</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody id="5566">
            <?php $user_query = mysqli_query($mysqli, "select * from book where status != 'Archive'") or die(mysqli_error($mysqli));
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
                    <td><?php echo $cat_row['classname'] ?></td>
                    <td><?php echo $total ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td><?php echo $row['date_added']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
<script>
    function searchbutton() {
        var text = document.getElementById("fftt").value;
        for (var i = 0; i < document.getElementById("5566").rows.length; i++) {
            for (var j = 0; j < 4; j++) {
                if (document.getElementById("5566").rows[i].cells[j].innerHTML.toLowerCase().includes(text.toLowerCase())) {
                    document.getElementById("5566").rows[i].removeAttribute("hidden");
                    break;
                }
                else {
                    document.getElementById("5566").rows[i].setAttribute("hidden", true);
                }
            }
        }
    }
</script>

</html>