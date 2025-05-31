<?php 
$params = (isset($this->record))? array('id'=>$this->record['id']):'';
?>
	<form method="post" enctype="multipart/form-data" action="<?php echo HtmlHelpers::url(
			array('ctl'=>'book', 
				'act'=>$this->action, 
				'params'=>$params
	)); ?>">
		<div class="row mb-3">
			<label for="title" class="col-sm-2 col-form-label">Title</label>
			<div class="col-sm-10">
			<input name="data[<?php echo $this->controller; ?>][title]" type="text" class="form-control" id="title" placeholder="title" <?php echo (isset($this->record))? "value='".$this->record['title']."'":""; ?>>
			</div>
		</div>
		<div class="row mb-3">
			<label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
			<div class="col-sm-10">
			<input name="data[<?php echo $this->controller; ?>][isbn]" type="text" class="form-control" id="isbn" placeholder="isbn" <?php echo (isset($this->record))? "value='".$this->record['isbn']."'":""; ?>>
			</div>
		</div>
		<div class="row mb-3">
			<label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
			<div class="col-sm-10">
			<input name="data[<?php echo $this->controller; ?>][quantity]" type="text" class="form-control" id="quantity" placeholder="quantity" <?php echo (isset($this->record))? "value='".$this->record['quantity']."'":""; ?>>
			</div>
		</div>
		<div class="row mb-3">
			<label for="photo" class="col-sm-2 col-form-label">Photo</label>
			<div class="col-sm-10 image-upload">
                <input name="image" type="file" class="form-control" id="photo" placeholder="photo">
                <?php if (isset($this->record)): ?>
                    <img src="<?php echo "media/uploads/" .strtolower($this->controller).'/'.$this->record['photo']; ?>" alt="<?php echo $this->record['title']; ?>" class="img-thumbnail">
                <?php endif; ?>
			</div>
		</div>
		<div class="row mb-3">
			<div class="offset-sm-2 col-sm-10">
			<button name="btn_submit" type="submit" class="btn btn-primary"><?php echo ucwords($this->action); ?></button>
			</div>
		</div>
	</form>
<?php global $mediaFiles; ?>
<?php array_push($mediaFiles['js'], RootREL."media/js/form.js"); ?>
