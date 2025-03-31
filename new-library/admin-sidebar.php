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
<h2>Admin Board</h2>
<table>
    <tr>
        <td><a href="admin-board.php"></i>&nbsp;Home</a></td>
    </tr>
    <tr>
        <td><a href="users.php"></i>&nbsp;Users</ahref></td>
    </tr>
    <tr>
        <td><a href="books2.php"></i>&nbsp;Books</a></td>
    </tr>
</table>
<form action="index.php">
<button style="align-self: center; margin: 10px" type="submit">Logout</button>
</form>
</div>