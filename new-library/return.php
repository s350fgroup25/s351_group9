<!DOCTYPE html>
<html>
    <head>
    <title>MU Learning Library</title>
    </head>
    <body style="text-align:center">
    <?php $isbn=$_GET["isbn"];
    include("dbcon.php");
    $result=mysqli_query($mysqli,"select * from book where isbn='$isbn';")
    or die(mysqli_error($mysqli));
    $row=mysqli_fetch_array($result);?>
        <h1>Book Title: <?php echo $row["book_title"]?></h1>
        <h2>Are you sure to return it?</h2>
        <form method="get" action="return-function.php">
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="password"><br>
            <button type="submit" name="isbn" value="<?php echo $isbn;?>">Return</button>
            <a href="borrowed-book.php" style="color:red">Cancel</a>
        </form>
    </body>
</html>