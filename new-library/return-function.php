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
        <a href="return.php?isbn=<?php echo $isbn;?>" style="color:red">Back</a>
        <?php
    }else{
        $result2=mysqli_query($mysqli,"select * from book where isbn='$isbn';")
        or die(mysqli_error($mysqli));
        $row2=mysqli_fetch_array($result2);
        $book_id=$row2["book_id"];
        $row=mysqli_fetch_array($result);
        $user_id=$row["user_id"];
        $result3=mysqli_query($mysqli,"select * from borrow b,borrowdetails bd where member_id=$user_id and b.borrow_id=bd.borrow_id and book_id=$book_id and borrow_status='pending';")
        or die(mysqli_error($mysqli));
        if($row3=mysqli_fetch_array($result3)){
        $borrow_details_id=$row3["borrow_details_id"];
        $due_date = DateTime::createFromFormat('d/m/Y', $row3["due_date"]);
        $date_return=date('Y-m-d H:i:s');
        $current_date = new DateTime();
        mysqli_query($mysqli,"update borrowdetails set borrow_status='returned', date_return='$date_return' where borrow_details_id=$borrow_details_id;")
        or die(mysqli_error($mysqli));?>
        <h2>Return Successful!</h2>
        <?php if($due_date < $current_date){ ?>
        <h2>Expired for <?php echo date_diff($due_date,$current_date)->format("%a days");?></h2><?php }}?>
    <a href="borrowed-book.php" style="background-color:bisque;">Back to Borrowed Book Page</a><?php }?>
</body>
</html>