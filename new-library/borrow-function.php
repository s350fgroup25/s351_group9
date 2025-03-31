<!DOCTYPE html>
<html>

<head>
    <title>MU Learning Library</title>
</head>

<body style="text-align:center">
    <?php include("dbcon.php");
    $username=$_GET["username"];
    $password=$_GET["password"];
    $isbn=$_GET["isbn"];
    $result=mysqli_query($mysqli,"select * from users where username='$username' and password='$password';")
    or die(mysqli_error($mysqli));
    if(mysqli_num_rows($result)==0){
        ?>
        <h2>Username or password wrong!</h2><br>
        <a href="borrow.php?isbn=<?php echo $isbn;?>" style="color:red">Back</a>
        <?php
    }else{
        $result2=mysqli_query($mysqli,"select * from book where isbn='$isbn';")
        or die(mysqli_error($mysqli));
        $row2=mysqli_fetch_array($result2);
        $book_id=$row2["book_id"];
        $row=mysqli_fetch_array($result);
        $user_id=$row["user_id"];
        date_default_timezone_set("Asia/Hong_Kong");
        $date_borrow = date('Y-m-d H:i:s'); // Current date and time in MySQL format
        $due_date = date('d/m/Y', strtotime('+40 days'));
        if(mysqli_query($mysqli,"insert into borrow (member_id,date_borrow,due_date) values($user_id,'$date_borrow','$due_date');")){
            $last_id = mysqli_insert_id($mysqli);
            mysqli_query($mysqli,"insert into borrowdetails (book_id,borrow_id,borrow_status,date_return) values($book_id,$last_id,'pending','');")
            or die(mysqli_error($mysqli));?>
    <h2>Borrow Successful!</h2><br>
    <h3>Book Title: <?php echo $row2["book_title"];?></h3><br>
    <h3>Start Date: <?php echo $date_borrow;?></h3><br>
    <h3>Due Date: <?php echo $due_date;?></h3>
    <h3>Borrower ID: <?php echo $user_id;?></h3><br>
    <a href="books2.php" style="background-color:bisque;">Back to Admin Book Page</a><?php }}?>
</body>
</html>