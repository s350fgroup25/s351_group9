<?php include("member-sidebar.php"); ?>
<div id="aa">
    <table>
        <?php $catres = mysqli_query($mysqli, "select * from category;") or die(mysqli_error($mysqli));
        while ($row = mysqli_fetch_array($catres)) {
            $catid = $row["category_id"];
            $catname = $row["classname"]; ?>
            <tr>
                <td>
                    <h1 style="margin:50px"><?php echo $catname; ?></h1>
                    <div>
                        <?php $books = mysqli_query($mysqli, "select * from book where category_id=$catid;") or die(mysqli_error($mysqli));
                        while ($book = mysqli_fetch_array($books)) {
                            ?>
                            <div style="float:left;background-color:green;margin:10px">
                                <h2><?php echo $book["book_title"]; ?></h2>
                                <h4><?php echo $book["author"]; ?></h4>
                            </div>
                            <?php
                        } ?>
                    </div>
                </td>
            </tr>
            <?php
        } ?>
    </table>
</div>
</body>

</html>