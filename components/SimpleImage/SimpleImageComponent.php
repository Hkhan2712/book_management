<?php
class SimpleImageComponent {
    var $image;
    var $imageType;

    public static function uploadImg($files, $desfd, $newSize = null) {
        $t = time();
        $allowedExts = array("gif", "jpg", "jpeg", "png");
        $temp = explode(".", $files["image"]["name"]);
        $extension = end($temp);
        $desfd = strtolower($desfd);
        if (($files["image"]["type"] == "image/gif"
            || $files["image"]["type"] == "image/jpeg"
            || $files["image"]["type"] == "image/jpg"
            || $files["image"]["type"] == "image/pjpeg"
            || $files["image"]["type"] == "image/x-png"
            || $files["image"]["type"] == "image/png")
            && ($files["image"]["size"] < 200000000)
            && (in_array($extension, $allowedExts)))
        {
            if ($files["image"]["error"] > 0) {
                echo 'Upload image error!';
                return false;
            }
            $ulfd = UploadREL . $desfd . '/';
            $newfn = time().rand(10000, 99999) . '.' .$extension;
            if (file_exists($ulfd . $newfn)) {
                return true;
            } else {
                move_uploaded_file($files["image"]["tmp_name"], $ulfd.$newfn);
                $simpleImg = new self;
                $simpleImg->load($ulfd.$newfn);
                if (isset($newSize['height']) && !isset($newSize['width'])) {
                    $simpleImg->resizeToHeight($newSize['height']);
                } else {
                    $newW = 200;
                    if (isset($newSize['width'])) {
                        $newW = $newSize['width'];
                    }
                    $simpleImg->resizeToWidth($newW);
                }
                echo $ulfd.$newfn;
                $simpleImg->save($ulfd.$newfn);
                return $newfn;
            }
        } else {
            echo "Invalid image file";
            return false;
        }
    }

    function load($filename) {
        $imageInfo = getimagesize($filename);
        $this->imageType = $imageInfo[2];
        if ($this->imageType == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
        } else if( $this->imageType == IMAGETYPE_GIF ) {
			$this->image = imagecreatefromgif($filename);
		} else if( $this->imageType == IMAGETYPE_PNG ) {
			$this->image = imagecreatefrompng($filename);
        }
    }

    function save($filename, $imageType=IMAGETYPE_JPEG, $compression = 75, $permissions = null) {
        if( $imageType == IMAGETYPE_JPEG ) {
			imagejpeg($this->image,$filename,$compression);
		} elseif( $imageType == IMAGETYPE_GIF ) {
			imagegif($this->image,$filename);
		} elseif( $imageType == IMAGETYPE_PNG ) {
			imagepng($this->image,$filename);
		}
		if( $permissions != null) {
			chmod($filename,$permissions);
		}
    }

    function output($imageType = IMAGETYPE_JPEG) {
        if( $imageType == IMAGETYPE_JPEG ) {
			imagejpeg($this->image);
		} elseif( $imageType == IMAGETYPE_GIF ) {
			imagegif($this->image);
		} elseif( $imageType == IMAGETYPE_PNG ) {
			imagepng($this->image);
		}
    }

    function getWidth() {
        return imagesx($this->image);
    }

    function getHeight() {
        return imagesy($this->image);
    }

    function resizeToWidth($width) {
        $ratio = $width / $this->getWidth();
        $height = $this->getHeight() * $ratio;
        $this->resize($width, $height);
    }

    function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }
    function scale($scale) {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getHeight() * $scale/100;
        $this->resize($width, $height);
    }
    function resize($width, $height) {
        $newImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($newImage, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		$this->image = $newImage;
    }
}
?>