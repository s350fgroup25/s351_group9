<?php include("users-sidebar.php") ?>
<div id="aa">
    <table style="width:100%;"><tr><td style="text-align:center;border:medium none">
    <h2 style="padding: 100px">Add User</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>First Name</label><br>
        <input type="text" name="firstname"><br>
        <label>Last Name</label><br>
        <input type="text" name="lastname"><br>
        <label>Username</label><br>
        <input type="text" name="username"><br>
        <label>Password</label><br>
        <input type="text" name="password"><br>
        <button type="submit">Enter</button>
    </form>
    <p>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST["username"];
    $thequery=mysqli_query($mysqli, "select * from users where username='$username'") or die(mysqli_error($mysqli));
    $num=mysqli_num_rows($thequery);
    if($num!=0){
        echo "Username cannot repeat!";
    }
    else{
        $password=$_POST["password"];
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        mysqli_query($mysqli,"insert into users (username,password,firstname,lastname) values('$username','$password','$firstname','$lastname')") or die(mysqli_error($mysqli));
        echo "New User Added<br>Username:".$username;
    }}?></p>
    </td></tr>
    </table>
</div>
</body></html>