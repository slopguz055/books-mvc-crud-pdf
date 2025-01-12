<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title><?php echo $book->name; ?></title>
</head>
<body>
<h1><?php echo $book->title; ?></h1>
<div>
    <span class="label">Isbn:</span>
    <?php echo $book->isbn; ?>
</div>
<div>
    <span class="label">Author:</span>
    <?php echo $book->author; ?>
</div>
<div>
    <span class="label">Publisher:</span>
    <?php echo $book->publisher; ?>
</div>
<div>
    <span class="label">Pages:</span>
    <?php echo $book->pages; ?>
</div>
<a href="index.php">Go Back</>
</body>
</html>
