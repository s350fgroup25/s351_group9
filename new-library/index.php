<!DOCTYPE html>
<html>
    <head>
        <title>MU Learning Library</title>
        <style>
            body *{
                text-align: center;
            }
            #a{
                background-color: bisque;
            }
            #b{
                background-color: white;
            }
        </style>
    </head>
    <body>
        <h1>MU Learning Library</h1>
        <hr>
<button id="a" style="align-self: left" onclick="home()">Home</button>
<button id="b" style="align-self: left" onclick="login()">Login</button>
<div id="c">
        <h2>Library Hours</h2>
        <p>Monday to Friday 8:00am to 12:30am<br>
    Saturday and Sunday 8:00am to 8:00pm</p>
</div>
<div id="d" hidden>
    <h2>Please Login</h2>
    <form method="POST" action="switch.php">
        <label>Username: </label>
        <input name="username" type="text" style="text-align: left"><br>
        <label>Password: </label>
        <input name="password" type="text" style="text-align: left"><br>
        <button type="submit">Submit</button>
    </form>
</div>
<?php if(isset($_GET["wrong"])){
        ?>
        <p>Username or password wrong!</p>
<?php }?>
    </body>
    <script>
        function showorhide(){
        if (document.getElementById("a").style.backgroundColor=="bisque"){
            document.getElementById("d").setAttribute("hidden",true);
            document.getElementById("c").removeAttribute("hidden");
        }
        if (document.getElementById("b").style.backgroundColor=="bisque"){
            document.getElementById("c").setAttribute("hidden",true);
            document.getElementById("d").removeAttribute("hidden");
        }}
        function home(){
            document.getElementById("a").style.backgroundColor="bisque";
            document.getElementById("b").style.backgroundColor="white";
            showorhide();
        }
        function login(){
            document.getElementById("b").style.backgroundColor="bisque";
            document.getElementById("a").style.backgroundColor="white";
            showorhide();
        }
    </script>
</html>