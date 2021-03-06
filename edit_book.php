<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new book</title>
</head>
<style>
body {
    background: url(pictures/olia-gozha-J4kK8b9Fgj8-unsplash.jpg) 50%/cover no-repeat;
    background-size: 100%;
    margin: 0;
    width: 100%;
    height: 700px;
}

.main_block {
    display: flex;
    align-items: center;
    height: 700px;
    /*padding-top: 30px;
        padding-bottom: auto;*/
}

.color_block1 {
    width: fit-content;
    height: fit-content;
    padding: 50px;
    background-color: rgba(227, 227, 227, 1);
    margin-left: 50px;
}

.color_block2 {
    width: fit-content;
    height: fit-content;
    padding: 50px;
    background-color: rgba(207, 166, 144, 1);
    margin-right: auto;
    margin-left: auto;
    border-radius: 30px;
}

.form_style {
    width: fit-content;
    height: fit-content;
    padding: 50px;
    background-color: rgba(237, 233, 222, 1);
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    font-size: 26px;
}

.form_style a {
    text-decoration: none;
    color: black;
}

.form_style div {
    margin-top: 10px;
}

.form_style div input {
    font-size: 20px;
}

.menu {
    display: flex;
    justify-content: space-evenly;
    /*flex-direction: column;*/
    align-items: center;
}

.menu_button {
    margin-top: 5px;
    background-color: rgba(207, 166, 144, 1);
    font-size: 20px;
    border: none;
    padding: 10px;
    padding-left: 20px;
    padding-right: 20px;
    text-decoration: none;
}
</style>

<body>
    <div class="main_block">
        <div class="color_block1">
            <div class="color_block2">
                <?php
                $user = 'root';
                $password = 'root';
                $db = 'practice';
                $host = 'localhost';
                $port = 3307;
                
                $link = mysqli_init();
                $success = mysqli_real_connect(
                   $link,
                   $host,
                   $user,
                   $password,
                   $db,
                   $port
                ) or die ("Error");

                $query = "SELECT title, author_last_name, author_first_name, publ_name, book_condition FROM books WHERE book_id='".$_GET['book_id']."'";
                $date_query = "SELECT year_of_publ FROM books WHERE book_id='".$_GET['book_id']."'";

                $rows=mysqli_query($link, $query);
                $date_row=mysqli_query($link, $date_query);
                while ($stroka = mysqli_fetch_array($rows) and $date_stroka = mysqli_fetch_array($date_row)) 
                {
                    $book_id=$_GET['book_id'];
                    $title = $stroka['title'];
                    $author_last_name = $stroka['author_last_name'];
                    $author_first_name = $stroka['author_first_name'];
                    $year_of_publ = date('Y-m-d', strtotime($date_stroka['year_of_publ']));
                    $publ_name = $stroka['publ_name'];
                    $book_condition = $stroka['book_condition'];
                }
                ?>
                <form action="save_edit_book.php" method="post" class="form_style" enctype="multipart/form-data">
                    <div>?????????? ?????????? <input type="text" name="title" value="<?php echo $title ?>"> </div>
                    <div>???????????????? ???????????? <input type="text" name="author_last_name"
                            value="<?php echo $author_last_name ?>">
                    </div>
                    <div>????'?? ???????????? <input type="text" name="author_first_name"
                            value="<?php echo $author_first_name ?>">
                    </div>
                    <div>???????? ???????????????????? <input type="date" name="year_of_publ" value="<?php echo $year_of_publ ?>">
                    </div>
                    <div>?????????? ?????????????????????? <input type="text" name="publ_name" value="<?php echo $publ_name ?>"></div>
                    <div>???????? ?????????? <input type="number" name="book_condition" value="<?php echo $book_condition ?>">
                    </div>
                    <div style="visibility: collapse; font-size: 10px;">???????? ?????????? <input
                            style="font-size: 10px; margin-bottom: 0px;" type="number" name="book_id"
                            value="<?php echo $book_id?>">
                    </div>
                    <div class="menu">
                        <div> <button class="menu_button"> <a class="menu_a" href="books.php"> ?????????????????????? ??????????
                                </a></button></div>
                        <div> <button class="menu_button" type="submit"> ?????????????? </button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>