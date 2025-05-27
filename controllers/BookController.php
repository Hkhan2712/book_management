<?php 
class BookController extends MainController {
    public function index() {
        $books = BookModel::getInstance();
        $this->records = $books->getAllRecords();
        $this->display();
    }
}
?>