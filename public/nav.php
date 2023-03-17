<?php
session_start();
// في جميع الصفاحات navسأقوم بكتابتة هنا لاني قمت باستدعاء ال
// وبالتالي لا حاجة لكنابتة في اي صفحة اخري

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location:/lec36crud/admin/login.php");

}


?>















<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">INSTANT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['admin'])) :    ?>
                    <!--adminفي حالة عدم وجود errorلكي لا يقوم بضرب issetلقد قمت بوضع  -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lec36crud/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lec36crud/admin/profile.php">Your profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Departments
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/lec36crud/department/add.php">Add department</a></li>
                            <li><a class="dropdown-item" href="/lec36crud/department/list.php">List department</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            employees
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/lec36crud/employee/add.php">Add employees</a></li>
                            <li><a class="dropdown-item" href="/lec36crud/employee/list.php">List employees</a></li>
                        </ul>
                    </li>
                <?php if ($_SESSION['admin']['rule']==1) :    ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            admins
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/lec36crud/admin/add.php">Add admin</a></li>
                            <li><a class="dropdown-item" href="/lec36crud/admin/list.php">List admin</a></li>
                        </ul>
                    </li>
                <?php endif;    ?>

                <?php endif;    ?>

            </ul>
            <div class="d-flex" role="search">
                <?php if (!isset($_SESSION['admin'])) : ?>
                    <a href="/lec36crud/admin/login.php" name="login" class="btn btn-outline-success" type="submit">log in</a>
                <?php else : ?>

                    <form action="">
                        <button href="/lec36crud/admin/login.php" name="logout" class="btn btn-outline-danger" type="submit">log out</button>
                    </form>
                <?php endif; ?>

            </div>
        </div>

    </div>
</nav>