<?php
// connect
include '../App/config.php';
include '../App/funcations.php';
// ui
include '../public/head.php';
include '../public/nav.php';

$rule="SELECT * FROM `rules`";
$rulesdata=mysqli_query($conn,$rule);
if(isset($_POST['send'])){
$name=$_POST['name'];
 $password=$_POST['password'];
$hash=sha1($password);

$rule=$_POST['rule'];


$insert="INSERT INTO `admin` VALUES(null,'$name','$hash',$rule) ";
$i=mysqli_query($conn,$insert);
path('admin/list.php');


};
Auth();

?>

<h1 class="text-center text-info display-1 mt-5">Add admin page</h1>
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
                    <input type="text" name='password' class="form-control">
                </div>
                <div class="form-group">
                    <label for="">rule </label>
                    <select name="rule" class="form-control" id="">
                        <?php foreach($rulesdata as $data): ?>
                        <option value="<?=$data['id']?>"><?=$data['description'] ?></option>

                     <?php endforeach; ?>

                    </select>
                </div>
                <button name="send" class="btn btn-info mt-3">send admin</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../public/script.php';


?>