<?php include("users-sidebar.php") ?>
<div id="aa">
    <input type="text" id="fftt"><button onclick="searchbutton()">Search</button><br>
    <table style="width:100%">
        <thead>
        <tr>
            <th>Acc ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody id="5566">
        <?php 
        $user_query = mysqli_query($mysqli, "select * from users where username!='admin'") or die(mysqli_error($mysqli));
        while($row=mysqli_fetch_array($user_query)){?>
        <tr>
            <td style="text-align: center;"><?php echo $row["user_id"] ?></td>
            <td style="text-align: center;"><?php echo $row["username"] ?></td>
            <td style="text-align: center;"><?php echo $row["firstname"] ?></td>
            <td style="text-align: center;"><?php echo $row["lastname"] ?></td>
            <?php $user_id=$row["user_id"];
             $username=$row["username"];
             $firstname=$row["firstname"];
             $lastname=$row["lastname"];?>
            <td style="text-align: center;">
                <button style="background-color:red" onclick="opendive('<?php echo $username;?>')">Delete</button>
                <div class="delete-dialog" hidden>
                    <h2>Delete User</h2>
                    <p>Do you want to delete this user?<br>
                    Username: <?php echo $username?><br>
                    First Name: <?php echo $firstname?><br>
                    Last Name: <?php echo $lastname?></p>
                    <button onclick="closedive('<?php echo $username;?>')">Close</button>
                    <a style="background-color: black;color:white"
                    href="delete-users-function.php?username=<?php echo $username;?>">Confirm</a>
                </div>
            </td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
</body>
<script>
    function searchbutton(){
        var text=document.getElementById("fftt").value;
        for(var i=0;i<document.getElementById("5566").rows.length;i++){
            for(var j=0;j<4;j++){
            if(document.getElementById("5566").rows[i].cells[j].innerHTML.toLowerCase().includes(text.toLowerCase())){
                document.getElementById("5566").rows[i].removeAttribute("hidden");
                break;
            }
        else{
            document.getElementById("5566").rows[i].setAttribute("hidden",true);
        }}}
        }
    function opendive(i){
        for(var j=0;j<document.getElementById("5566").rows.length;j++){
        if(document.getElementById("5566").rows[j].cells[1].innerHTML==i){
            document.getElementById("5566").rows[j].cells[4].querySelector('.delete-dialog').removeAttribute("hidden");
        }}
    }
    function closedive(i){
        for(var j=0;j<document.getElementById("5566").rows.length;j++){
        if(document.getElementById("5566").rows[j].cells[1].innerHTML==i){
            document.getElementById("5566").rows[j].cells[4].querySelector('.delete-dialog').setAttribute("hidden",true);
        }}
    }
</script></html>