<?php
include '../public/head.php';
include '../public/nav.php';
include '../App/funcations.php';

// Auth();
?>
<div class="home pt-1">
    <div class="notauth">
    <i class="fa-solid fa-user-lock"></i>
    <h1>you are not authorized</h1>
    <p>it seems like you don't have permission to use this page</p>
    </div>
</div>

<?php
include '../public/script.php';
?>