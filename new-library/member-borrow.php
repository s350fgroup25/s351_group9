<?php include("member-sidebar.php"); ?>
<div id="aa">
    <h1>Load</h1>
    <p>Updated at <?php date_default_timezone_set("Asia/Hong_Kong");
    echo date("d/m/Y H:i:sa")?></p>
    <table>
        <tr>
        <th>ISBN</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Author</th>
        </tr>
        <?php $username=$_GET["username"];
        $result=mysqli_query($mysqli,"select * from users where username='$username';") or die(mysqli_error($mysqli));
        $user=mysqli_fetch_array($result);
        $user_id=$user["user_id"];
        $result2=mysqli_query($mysqli,"select * from borrow where member_id=$user_id") or die(mysqli_error($mysqli));
        while($row=mysqli_fetch_array($result2)){
            $borrow_id=$row["borrow_id"];
            $result3=mysqli_query($mysqli,"select * from borrowdetails where borrow_id=$borrow_id and borrow_status='pending';") or die(mysqli_error($mysqli));
            if($row2=mysqli_fetch_array($result3)){
            $book_id=$row2["book_id"];
            $result4=mysqli_query($mysqli,"select * from book where book_id=$book_id;") or die(mysqli_error($mysqli));
            $row3=mysqli_fetch_array($result4);
            $isbn=$row3["isbn"];
            $booktitle=$row3["book_title"];
            $categoryid=$row3["category_id"];
            $cat_query = mysqli_query($mysqli, "select * from category where category_id = '$categoryid'") or die(mysqli_error($mysqli));
            $cat_row = mysqli_fetch_array($cat_query);
            ?>
            <tr>
                <td><?php echo $isbn ?></td>
                <td><?php echo $booktitle ?></td>
                <td><?php echo $cat_row["classname"] ?></td>
                <td><?php $due_date = DateTime::createFromFormat('d/m/Y', $row["due_date"]);
            $current_date = new DateTime();
                if ($due_date>=$current_date){
                echo "borrowed"; }
                else{
                    echo "expired";
                }?></td>
                <td><?php echo $row["due_date"] ?></td>
                <td><?php echo $row3["author"] ?></td>
            </tr>
            <?PHP }}?>
    </table>
    <h1>Returned</h1>
    <p>Updated at <?php date_default_timezone_set("Asia/Hong_Kong");
    echo date("d/m/Y H:i:sa")?></p>
    <table>
    <tr>
        <th>ISBN</th>
            <th>Title</th>
            <th>Category</th>
            <th>Due Date</th>
            <th>Author</th>
        </tr>
        <?php $username=$_GET["username"];
        $result=mysqli_query($mysqli,"select * from users where username='$username';") or die(mysqli_error($mysqli));
        $user=mysqli_fetch_array($result);
        $user_id=$user["user_id"];
        $result2=mysqli_query($mysqli,"select * from borrow where member_id=$user_id") or die(mysqli_error($mysqli));
        while($row=mysqli_fetch_array($result2)){
            $borrow_id=$row["borrow_id"];
            $result3=mysqli_query($mysqli,"select * from borrowdetails where borrow_id=$borrow_id and borrow_status='returned';") or die(mysqli_error($mysqli));
            if($row2=mysqli_fetch_array($result3)){
            $book_id=$row2["book_id"];
            $result4=mysqli_query($mysqli,"select * from book where book_id=$book_id;") or die(mysqli_error($mysqli));
            $row3=mysqli_fetch_array($result4);
            $isbn=$row3["isbn"];
            $booktitle=$row3["book_title"];
            $categoryid=$row3["category_id"];
            $cat_query = mysqli_query($mysqli, "select * from category where category_id = '$categoryid'") or die(mysqli_error($mysqli));
            $cat_row = mysqli_fetch_array($cat_query);
            ?>
            <tr>
                <td><?php echo $isbn ?></td>
                <td><?php echo $booktitle ?></td>
                <td><?php echo $cat_row["classname"] ?></td>
                <td><?php echo $row["due_date"] ?></td>
                <td><?php echo $row3["author"] ?></td>
            </tr>
            <?PHP }}?>
    </table>
</div>
</body>
</html>