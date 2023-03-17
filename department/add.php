<?php
// connect
include '../App/config.php';
include '../App/funcations.php';
// ui
include '../public/head.php';
include '../public/nav.php';


if(isset($_POST['send'])){
$name=$_POST['name'];
// if(empty($name)){
//     // فاضي قم بأرسال هذه الرسالة department لو اسم ال
//     // insertلو مش فاضي قم بعمل 
//     echo"please enter  department name";
// }
// else{
//     $insert="INSERT INTO `department` VALUES(null,'$name',Default) ";
//     $i=mysqli_query($conn,$insert);
//     path('department/list.php');
    
// }


};
Auth(2,3);

?>

<h1 class="text-center text-info display-1 mt-5">Add department page</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label >name</label>
                    <input type="text" name='name' class="form-control">
                </div>
                <button name="send" class="btn btn-info mt-3">send department</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../public/script.php';


?>