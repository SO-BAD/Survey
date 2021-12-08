    <?php
    if (isset($_SESSION['account']) && ($_SESSION['account']['permission']) > 0) {



    } else {
        header("location:./index.php");
        exit;
    }
    ?>
    <div class="addPage">
        <h1>Add</h1>
        <form action="./index.php?do=add" method="post" enctype="multipart/form-data">
            <table>
                
            </table>

            <input type="file" name = "image">
            <input type="text" name = "">
            <input type="text" name = "">
            <input type="submit">
        </form>
    </div>
