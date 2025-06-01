<?php 
class UserController extends MainController{
 var $records = null;
    public function index() {
        $books = UserModel::getInstance();
        $this->records = $books->getAllRecords();
        $this->display();
    }
    // public function add() {
    //     if(isset($_POST['btn_submit'])) {
	// 		$userData = $_POST['data'][$this->controller];
	// 		if(!empty($userData['full_name']))  {
	// 			$userData['avatar_url'] = SimpleImageComponent::uploadImg($_FILES, $this->controller);
	// 			$user = UserModel::getInstance();
	// 			if($user->addRecord($userData))
	// 				header( "Location: ".HtmlHelpers::url(array('ctl'=>'user')));
	// 		}
	// 	}
    //     $this->display();
    // }
    public function view($id) {
        $user = UserModel::getInstance();
        $record = $user->getRecord($id);
        $this->setProperty('record', $record);
        $this->display();
    }
    public function edit($id) {
        $user = UserModel::getInstance();
        $record = $user->getRecord($id);
        $this->setProperty('record', $record);
		if(isset($_POST['btn_submit'])) {
			$userData = $_POST['data'][$this->controller];
			if(!empty($userData['full_name']))  {
				if(isset($_FILES) and $_FILES["image"]["name"]) {
					if(file_exists(UploadREL .$this->controller.'/'.$record['avatar_url']))
						unlink(UploadREL .$this->controller.'/'.$record['avatar_url']);
					$userData['avatar_url'] = SimpleImageComponent::uploadImg($_FILES, $this->controller);
				}
				if($user->editRecord($id, $userData))
					header( "Location: ".HtmlHelpers::url(array('ctl'=>'user')));
			}
		}
		$this->display();
    }
    public function del($id) {
        $user = UserModel::getInstance();
        $record = $user->getRecord($id);
        if (file_exists(RootURI.'media/uploads/'.$this->controller.'/'.$record['photo'])) {
            unlink(RootURI.'media/uploads/'.$this->controller.'/'.$record['photo']);
        }
        echo $user->delRecord($id);
        exit();
        header( "Location: ".HtmlHelpers::url(array('ctl'=>'user')));
    }
}
?>