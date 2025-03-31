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
        #span{
            background-color: bisque;
            position: fixed;
            left: 400px;
            bottom: 40%;
            height: 210px;
            width: 200px;
            text-align: center;
        }
    </style>
</head>

<body style="height:100%">
    <?php include("dbcon.php"); ?>
    <div id="ab">
<h2>Users</h2>
<table>
    <tr>
        <td><a href="users.php"></i>&nbsp;All Users</ahref></td>
    </tr>
    <tr>
        <td><a href="add-users.php"></i>&nbsp;Add Users</a></td>
    </tr>
    <tr>
        <td><a href="delete-users.php"></i>&nbsp;Delete Users</a></td>
    </tr>
</table>
<form action="admin-board.php">
<button style="align-self: center; margin: 10px" type="submit">Home</button>
</form>
</div>