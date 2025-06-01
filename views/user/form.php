<?php 
$params = (isset($this->record))? array('id'=>$this->record['id']):'';
?>
	<form method="post" enctype="multipart/form-data" action="<?php echo HtmlHelpers::url(
			array('ctl'=>'user', 
				'act'=>$this->action, 
				'params'=>$params
	)); ?>">
		<div class="row mb-3">
			<label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
			<div class="col-sm-10">
			<input name="data[<?php echo $this->controller; ?>][full_name]" type="text" class="form-control" id="fullname" placeholder="Enter full name" <?php echo (isset($this->record))? "value='".$this->record['full_name']."'":""; ?>>
			</div>
		</div>
		<div class="row mb-3">
			<label for="email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
			<input name="data[<?php echo $this->controller; ?>][email]" type="text" class="form-control" id="email" placeholder="Enter email" <?php echo (isset($this->record))? "value='".$this->record['email']."'":""; ?>>
			</div>
		</div>
		<div class="row mb-3">
			<label for="gender" class="col-sm-2 col-form-label">Gender</label>
			<div class="col-sm-10">
			<input name="data[<?php echo $this->controller; ?>][gender]" type="text" class="form-control" id="gender" placeholder="Enter gender" <?php echo (isset($this->record))? "value='".$this->record['gender']."'":""; ?>>
			</div>
		</div>
        <div class="row mb-3">
			<label for="country" class="col-sm-2 col-form-label">Country</label>
			<div class="col-sm-10">
			<input name="data[<?php echo $this->controller; ?>][country]" type="text" class="form-control" id="country" placeholder="Enter country" <?php echo (isset($this->record))? "value='".$this->record['country']."'":""; ?>>
			</div>
		</div>
		<div class="row mb-3">
			<label for="avatar_url" class="col-sm-2 col-form-label">Avatar</label>
			<div class="col-sm-10 image-upload">
                <input name="image" type="file" class="form-control" id="avatar_url" placeholder="upload avatar">
                <?php if (isset($this->record)): ?>
                    <img src="<?php echo "media/uploads/" .strtolower($this->controller).'/'.$this->record['avatar_url']; ?>" alt="<?php echo $this->record['avatar_url']; ?>" class="img-thumbnail">
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
