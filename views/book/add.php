<?php include_once'views/layouts/'.$this->layout.'header.php'; ?>
<div class="row row-offcanvas row-offcanvas-right pt-4">
	<div class="col-xs-12 col-sm-9">
		<?php include_once 'views/'.strtolower($this->controller).'/form.php'; ?>
	</div>
	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
		<?php include_once 'views/widgets/sidebar.php'; ?>
	</div>
</div>
<?php include_once 'views/layouts/'.$this->layout.'footer.php'; ?>