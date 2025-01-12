<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Books</title>
    <style type="text/css">
        table.books {
            width: 100%;
        }

        table.books thead {
            background-color: #eee;
            text-align: left;

        }

        table.books thead th {
            border: solid 1px #fff;
            padding: 3px;
        }

        table.books tbody td {
            border: solid 1px #eee;
            padding: 3px;
        }

        a, a:hover, a:active, a:visited {
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h3>CRUD OOP with MVC</h3>
<div><a href="index.php?op=new">Add new book</a></div>
<div><a href="index.php?op=pdf">Generate aaaaaaaaaaaaaaaaaaaa PDF</a></div>
<br>
<table class="books" border="0" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><a href="?orderby=title">Title</a></th>
        <th><a href="?orderby=isbn">Isbn</a></th>
        <th><a href="?orderby=author">Author</a></th>
        <th><a href="?orderby=publisher">Publisher</a></th>
        <th><a href="?orderby=pages">Pages</a></th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($books as $book) : ?>
        <tr>
            <td>
                <a href="index.php?op=show&id=<?php echo $book->id; ?>"><?php echo htmlentities($book->title); ?></a>
            </td>
            <td><?php echo htmlentities($book->isbn); ?></td>
            <td><?php echo htmlentities($book->author); ?></td>
            <td><?php echo htmlentities($book->publisher); ?></td>
            <td><?php echo htmlentities($book->pages); ?></td>
            <td><a href="index.php?op=edit&id=<?php echo $book->id; ?>">edit</a></td>
            <td><a href="index.php?op=delete&id=<?php echo $book->id; ?>"
                   onclick="return confirm('Are you sure you want to delete?');">delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>