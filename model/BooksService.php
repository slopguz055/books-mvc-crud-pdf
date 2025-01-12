<?php

require_once 'BooksGateway.php';
require_once 'ValidationException.php';
require_once 'Database.php';

class BooksService extends BooksGateway
{

    private $booksGateway = null;

    public function __construct()
    {
        $this->booksGateway = new BooksGateway();
    }

    public function getAllBooks($order)
    {
        try {
            self::connect();
            $res = $this->booksGateway->selectAll($order);
            self::disconnect();
            return $res;
        } catch (Exception $e) {
            self::disconnect();
            throw $e;
        }
    }

    public function getBook($id)
    {
        try {
            self::connect();
            $result = $this->booksGateway->selectById($id);
            self::disconnect();
            return $result;
        } catch (Exception $e) {
            self::disconnect();
            throw $e;
        }
        return $this->booksGateway->selectById($id);
    }

    private function validateBookParams($title, $isbn, $author, $publisher, $pages)
    {
        $errors = array();
        if (!isset($title) || empty($title)) {
            $errors[] = 'Title is required';
        }
        if (!isset($isbn) || empty($isbn)) {
            $errors[] = 'Isbn is required';
        }
        if (!isset($author) || empty($author)) {
            $errors[] = 'Author is required';
        }
        if (!isset($publisher) || empty($publisher)) {
            $errors[] = 'Publisher is required';
        }
        if (!isset($pages) || empty($pages)) {
            $errors[] = 'Pages is required';
        }
        if (empty($errors)) {
            return;
        }
        throw new ValidationException($errors);
    }

    public function createNewBook($title, $isbn, $author, $publisher, $pages)
    {
        try {
            self::connect();
            $this->validateBookParams($title, $isbn, $author, $publisher, $pages);
            $result = $this->booksGateway->insert($title, $isbn, $author, $publisher, $pages);
            self::disconnect();
            return $result;
        } catch (Exception $e) {
            self::disconnect();
            throw $e;

        }
    }

    public function editBook($title, $isbn, $author, $publisher, $pages)
    {
        try {
            self::connect();
            $result = $this->booksGateway->edit($isbn, $title, $author, $publisher, $pages);
            self::disconnect();
        } catch (Exception $e) {
            self::disconnect();
            throw $e;
        }
    }

    public function deleteBook($id)
    {
        try {
            self::connect();
            $result = $this->booksGateway->delete($id);
            self::disconnect();
        } catch (Exception $e) {
            self::disconnect();
            throw $e;
        }
    }
}

?>
