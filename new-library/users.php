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
        </tr>
        </thead>
        <tbody id="5566">
        <?php $user_query = mysqli_query($mysqli, "select * from users where username!='admin'") or die(mysqli_error($mysqli));
        while($row=mysqli_fetch_array($user_query)){?>
        <tr>
            <td style="text-align: center;"><?php echo $row["user_id"] ?></td>
            <td style="text-align: center;"><?php echo $row["username"] ?></td>
            <td style="text-align: center;"><?php echo $row["firstname"] ?></td>
            <td style="text-align: center;"><?php echo $row["lastname"] ?></td>
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
</script></html>