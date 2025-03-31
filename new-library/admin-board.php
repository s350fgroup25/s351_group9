<?php include("admin-sidebar.php") ?>
<div id="aa">
    <table style="width:100%" id="ac">
        <tr>
            <td>
                <h3>Number of Books</h3>
                <h1><?php $row12=0;
                $user_query = mysqli_query($mysqli, "select * from book") or die(mysqli_error($mysqli));
                while ($row = mysqli_fetch_array($user_query)) {
                    $book_copies = $row['book_copies'];
                    $row12+=$book_copies;
                }
                echo $row12; ?></h1>
            </td>
            <td>
            <h3>Borrowed Books</h3>
            <h1><?php $total=0;
            $user_query = mysqli_query($mysqli, "select * from book") or die(mysqli_error($mysqli));
            while ($row = mysqli_fetch_array($user_query)) {
                $bookid=$row['book_id'];
                $borrow_details = mysqli_query($mysqli, "select * from borrowdetails where book_id = '$bookid' and borrow_status = 'pending'");
                $count = mysqli_num_rows($borrow_details);
                $total+=$count;
            }
            echo $total; ?></h1>
            </td>
            <td>
            <h3>Number of Members</h3>
            <h1><?php $user_query = mysqli_query($mysqli, "select * from users where username!='admin'") or die(mysqli_error($mysqli));
            $count = mysqli_num_rows($user_query);
            echo $count;
            ?></h1>
            </td>
        </tr>
    </table>
    <table style="margin-top:20px;width:100%">
        <tr>
            <td class="ad" style="vertical-align:text-top;width=50%">
                <h3>Members List</h3>
                <table style="width:100%">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                    <?php
                    $user_list=mysqli_query($mysqli, "select * from users where username!='admin'") or die(mysqli_error($mysqli));
                    while ($row=mysqli_fetch_array($user_list)){
                        ?>
                        <tr>
                            <td><?php echo $row["firstname"];?></td>
                            <td><?php echo $row["lastname"];?></td>
                        </tr>
                    <?php }?>
                </table>
            </td>
            <td class="ad" style="width=50%">
                <h3>Books List</h3>
                <table style="width:100%">
                    <tr>
                        <th>Book Title</th>
                    </tr>
                    <?php
                    $user_list=mysqli_query($mysqli, "select * from book") or die(mysqli_error($mysqli));
                    while ($row=mysqli_fetch_array($user_list)){
                        ?>
                        <tr>
                            <td><?php echo $row["book_title"];?></td>
                        </tr>
                    <?php }?>
                </table>
            </td>
        </tr>
    </table>
</div></body></html>