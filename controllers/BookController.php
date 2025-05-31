<?php 
class BookController extends MainController {
    var $records = null;
    public function index() {
        $books = BookModel::getInstance();
        $this->records = $books->getAllRecords();
        $this->display();
    }
    public function add() {
        if(isset($_POST['btn_submit'])) {
			$bookData = $_POST['data'][$this->controller];
			if(!empty($bookData['title']))  {
				$bookData['photo'] = SimpleImageComponent::uploadImg($_FILES, $this->controller);
				$book = BookModel::getInstance();
				if($book->addRecord($bookData))
					header( "Location: ".HtmlHelpers::url(array('ctl'=>'book')));
			}
		}
        $this->display();
    }
    public function view($id) {
        $book = BookModel::getInstance();
        $record = $book->getRecord($id);
        $this->setProperty('record', $record);
        $this->display();
    }
    public function edit($id) {
        $book = BookModel::getInstance();
        $record = $book->getRecord($id);
        $this->setProperty('record', $record);
		if(isset($_POST['btn_submit'])) {
			$bookData = $_POST['data'][$this->controller];
			if(!empty($bookData['title']))  {
				if(isset($_FILES) and $_FILES["image"]["name"]) {
					if(file_exists(UploadREL .$this->controller.'/'.$record['photo']))
						unlink(UploadREL .$this->controller.'/'.$record['photo']);
					$bookData['photo'] = SimpleImageComponent::uploadImg($_FILES, $this->controller);
				}
				if($book->editRecord($id, $bookData))
					header( "Location: ".HtmlHelpers::url(array('ctl'=>'book')));
			}
		}
		$this->display();
    }
    public function del($id) {
        $book = BookModel::getInstance();
        $record = $book->getRecord($id);
        if (file_exists(RootURI.'media/uploads/'.$this->controller.'/'.$record['photo'])) {
            unlink(RootURI.'media/uploads/'.$this->controller.'/'.$record['photo']);
        }
        echo $book->delRecord($id);
        exit();
    }
}
?>