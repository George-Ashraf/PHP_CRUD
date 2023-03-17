<?php
// connect
include '../App/config.php';
include '../App/funcations.php';

include '../public/head.php';
include '../public/nav.php';




if(isset($_GET['edit'])){
$id=$_GET['edit'];

$select="SELECT * FROM `admin` WHERE id=$id";
$s=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($s);


if(isset($_POST['send'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $hash=sha1($password);
    $update=" UPDATE `admin` SET name='$name' ,password='$hash' WHERE id='$id' ";
    $u=mysqli_query($conn,$update);
    path('admin/list.php');
    
    }
};
Auth();

?>


  <h1 class="text-center text-info display-1 mt-5">edit admin page</h1>
  <div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label >name</label>
                    <input type="text" name='name' value="<?= $row['name']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label >password</label>
                    <input type="text" name='password' value="<?= $row['password']?>" class="form-control">
                </div>
                <button name="send" class="btn btn-primary mt-3">update admin</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../public/script.php';


?>