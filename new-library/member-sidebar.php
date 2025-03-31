<!DOCTYPE html>
<html>
<head>
    <title>MU Learning Library</title>
    <style>
        #ab {
            background-color: bisque;
            position: fixed;
            height: 100%;
            width: 160px
        }

        #ab td {
            height: 50px;
            font-size: 25px
        }

        #aa {
            margin-left: 160px;
        }

        #aa td,
        th {
            border-bottom: 1px solid
        }
        #ac td,.ad{border: 1px solid}
    </style>
</head>

<body style="height:100%">
    <?php include("dbcon.php"); ?>
    <div id="ab">
<h2>Dashboard</h2>
<table>
    <tr>
        <td><a href="member-board.php?username=<?php echo $_GET["username"]?>&password=<?php echo $_GET["password"]?>"></i>&nbsp;Home</a></td>
    </tr>
    <tr>
        <td><a href="member-books.php?username=<?php echo $_GET["username"]?>&password=<?php echo $_GET["password"]?>"></i>&nbsp;All Books</a></td>
    </tr>
    <tr>
        <td><a href="member-borrow.php?username=<?php echo $_GET["username"]?>&password=<?php echo $_GET["password"]?>"></i>&nbsp;Borrow History</a></td>
    </tr>
    <tr>
        <td><a href="member-category.php?username=<?php echo $_GET["username"]?>&password=<?php echo $_GET["password"]?>"></i>&nbsp;Category</a></td>
    </tr>
</table>
<form action="index.php">
<button style="align-self: center; margin: 10px" type="submit">Logout</button>
</form>
</div>