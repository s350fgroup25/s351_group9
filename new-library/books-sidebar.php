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
    </style>
</head>

<body style="height:100%">
    <?php include("dbcon.php"); ?>
    <div id="ab">
<h2>Admin</h2>
<table>
    <tr>
        <td><a href="books2.php">All Books</a></td>
    </tr>
    <tr>
        <td><a href="new-books.php">New Books</a></td>
    </tr>
    <tr>
        <td><a href="old-books.php">Old Books</a></td>
    </tr>
    <tr>
        <td><a href="lost-books.php">Lost Books</a></td>
    </tr>
    <tr>
        <td><a href="damaged-books.php">Damaged Books</a></td>
    </tr>
    <tr>
        <td><a href="replacement-books.php">Subject for Replacement</a></td>
    </tr>
    <tr>
        <td><a href="borrowed-book.php">Borrowed Books</a></td>
    </tr>
    <tr>
        <td><a href="expired-book.php">Expired Books</a></td>
    </tr>
</table>
<form action="admin-board.php">
<button style="align-self: center; margin: 10px" type="submit">Home</button>
</form>
</div>