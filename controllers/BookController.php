<?php 
class BookController extends MainController {
    public function index() {
        $books = BookModel::getInstance();
        $this->records = $books->getAllRecords();
        $this->display();
    }
    public function view($id) {
        $book = BookModel::getInstance();
        $record = $book->getRecord($id);
        $this->setProperty('record', $record);
        $this->display();
    }
}
?>