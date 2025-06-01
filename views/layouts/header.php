<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Demo</title>
    <link rel="stylesheet" href="../../media/css/sidebar.css">
    <?php 
        global $mediaFiles;
        array_push($mediaFiles['css'], RootREL.'media/css/sidebar.css');
    ?>
    <?php echo HtmlHelpers::cssHeader();?>
</head>
<body>
<header>
    <div style="background-color: #34495E;">
        <nav class=" container navbar navbar-expand-lg px-3 d-flex justify-content-between gap-4">
            <a class="navbar-brand fs-2" href="<?php echo HtmlHelpers::url(array('ctl' => 'home'))?>">VBook</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link fs-5" href="index.php">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="index.php?ctl=Book">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="<?php echo HtmlHelpers::url(array('ctl' => 'user'))?>">User</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<main>
    <div class="row" style="max-width: 100%;">
        <div class="col-3" style="width: 20%;">
            <?php include_once 'sidebar.php';?>
        </div>
        <div class="col-9 p-4" style="width: 80%;">
        