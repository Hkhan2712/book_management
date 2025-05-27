<?php 
	global $mediaFiles;
	array_push($mediaFiles['css'], RootREL.'media/css/book.css');
?>
<?php include_once 'views/layouts/header.php' ?>
<div class="table-responsive py-4">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Books</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addBookModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Book</span></a>
                    <a href="#deleteBookModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons"></i> <span>Delete</span></a>						
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                        </span>
                    </th>
                    <th>#</th>
                    <th>Title</th>
                    <th>ISBN</th>
                    <th>Quantity</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->records) { ?>
                    <?php while($row = mysqli_fetch_array($this->records)) : ?>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" name="options[]">
                                <label for="checkbox<?= $row['id'] ?>"></label>
                            </span>
                        </td>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars($row['isbn']) ?></td>
                        <td><?= $row['quantity'] ?></td>
                        <td>
                            <?php if ($row['photo']): ?>
                                <img src="media/uploads/<?= htmlspecialchars($row['photo']) ?>" alt="Cover" width="50">
                            <?php else: ?>
                                <span>No image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="btn btn-outline-info table-link" role="button" href="<?php echo HtmlHelpers::url(
								['ctl'=>'book', 
									  'act'=>'view', 
									  'params'=>array(
										'id'=>$row['id']
										)
								]); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                </svg>
                            </a>
                            <a href="#editBookModal" class="edit" data-toggle="modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                                </svg>
                            </a>
                            <a href="#deleteBookModal" class="delete" data-toggle="modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php 
                } else { ?>
                    <tr>
                        <td colspan="7" class="text-center">There are no record!</td>
                    </tr>
                <?php }  
                ?>
            </tbody>
        </table>
        <div class="clearfix">
            <div class="hint-text">
                Showing <b><?= ($this->records instanceof mysqli_result) ? mysqli_num_rows($this->records) : 0 ?></b> entries
            </div>
            <ul class="pagination">
                <!-- Pagination placeholder -->
                <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </div>
    </div>
</div>
<?php include_once 'views/layouts/footer.php' ?>
