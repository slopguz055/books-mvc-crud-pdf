<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>
        <?php echo htmlentities($pageTitle); ?>
    </title>
</head>
<body>
<h3>Add New Book</h3>
<?php
if ($errors) {
    echo '<ul class="errors">';
    foreach ($errors as $field => $error) {
        echo '<li>' . htmlentities($error) . '</li>';
    }
    echo '</ul>';
}
?>
<form method="post" action="">
    <label for="title">Title: </label><br>
    <input type="text" name="title" value="<?php echo htmlentities($book->title); ?>">
    <br>
    <label for="isbn">Isbn: </label><br>
    <input type="text" name="isbn" value="<?php echo htmlentities($book->isbn); ?>">
    <br>
    <label for="author">Author: </label><br>
    <input type="text" name="author" value="<?php echo htmlentities($book->author); ?>">
    <br>
    <label for="publisher">Publisher: </label><br>
    <textarea name="publisher"><?php echo htmlentities($book->publisher); ?></textarea>
    <br>
    <label for="pages">Pages: </label><br>
    <textarea name="pages"><?php echo htmlentities($book->pages); ?></textarea>
    <br>
    <input type="hidden" name="form-submitted" value="1">
    <input type="submit" value="Update">
    <button type="button" onclick="location.href='index.php'">Cancel</button>
</form>
</body>
</html>