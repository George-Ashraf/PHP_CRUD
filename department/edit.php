<?php
// connect
include '../App/config.php';
include '../App/funcations.php';

include '../public/head.php';
include '../public/nav.php';




if(isset($_GET['edit'])){
$id=$_GET['edit'];

$select="SELECT * FROM `department` WHERE id=$id";
$s=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($s);


if(isset($_POST['send'])){
    $name=$_POST['name'];
    $update=" UPDATE `department` SET name='$name' WHERE id='$id' ";
    $u=mysqli_query($conn,$update);
    path('department/list.php');
    
    }
};
Auth();

?>


  <h1 class="text-center text-info display-1 mt-5">edit department page</h1>
  <div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label >name</label>
                    <input type="text" name='name' value="<?= $row['name']?>" class="form-control">
                </div>
                <button name="send" class="btn btn-primary mt-3">update department</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../public/script.php';


?>