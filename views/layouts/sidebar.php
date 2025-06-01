<div class="d-flex flex-column flex-shrink-0 p-3 text-white sb--color" style="height: 180vh; max-height:100%">
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="<?php echo HtmlHelpers::url(array('ctl' => 'home'))?>" class="nav-link sb__color--brown">
                Home
            </a>
        </li>
        <li>
            <a href="<?php echo HtmlHelpers::url(array('ctl' => 'book'))?>" class="nav-link sb__color--brown">
                List Of Books
            </a>
        </li>
        <li>
            <a href="<?php echo HtmlHelpers::url(array('ctl' => 'user'))?>" class="nav-link sb__color--brown">
                User Management
            </a>
        </li>
        <li>
            <a href="logout.php" class="nav-link sb__color--brown">
                Logout
            </a>
        </li>
    </ul>
</div>
