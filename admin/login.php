<?php
// connect
include '../App/config.php';
include '../App/funcations.php';
// ui
include '../public/head.php';
include '../public/nav.php';

// 1:44:49

// session_start();
// sessionلكي استطيع استخدام 
if(isset($_POST['login']))
{
    $name=$_POST['name'];
    $password=$_POST['password'];
    $select="SELECT * FROM `admin` WHERE name ='$name' and password='$password'";
$s=mysqli_query($conn,$select);
// 1:46
$numofrows=mysqli_num_rows($s);
// echo $numofrows;
// rowsتقوم بأحضار عدد ال
// مميز سيقوم بأحضار 1  adminبالطبع لان 
// or 0
// الذي سوف يؤدي الي ارسال صف واحدcondationولقد قمنا بعمل 

if($numofrows ==1){
// echo "true admin";
$_SESSION['admin']=$name;
// adminباسم الsessionسيقوم بتسجيل 

path("/");

}
else{
    // echo "false admin";
}
}


// print_r($_SESSION);
// اقوم بالاتي sessionلكي اقوم بمسح ال
// session_unset();
// لتفريغها
// session_destroy();
// declrationلنزع ال
?>

<h1 class="text-center text-info display-1 mt-5">log in page</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label >name</label>
                    <input type="text" name='name' class="form-control">
                </div>
                <div class="form-group">
                    <label >password</label>
                    <input type="password" name='password' class="form-control">
                </div>
                <button name="login" class="btn btn-info mt-3">login</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../public/script.php';


?>