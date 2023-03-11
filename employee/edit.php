<?php
// connect
include '../App/config.php';
include '../App/funcations.php';

include '../public/head.php';
include '../public/nav.php';

$select="SELECT * FROM `department`";
$department=mysqli_query($conn,$select);



if(isset($_GET['edit'])){
$id=$_GET['edit'];

$select="SELECT * FROM `employeewithdepartment` WHERE id=$id";
$s=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($s);


if(isset($_POST['send'])){
    $name=$_POST['name'];
$salary=$_POST['salary'];
// img code
if(!empty( $_FILES['img']['name'])){
    $img_name=time() . $_FILES['img']['name'];
    $tmp_name=$_FILES['img']['tmp_name'];
    $location='upload/'.$img_name;
    move_uploaded_file($tmp_name,$location );
    $imgname=$row['img'];
    unlink("./upload/$imgname");

}
else{
    $img_name=$row['img'];
}


$depid=$_POST['depid'];
    $update=" UPDATE `employees` SET name='$name', salary='$salary', img='$img_name' ,departmentid='$depid' WHERE id='$id' ";
    $u=mysqli_query($conn,$update);
    path('employee/list.php');
    
    }
};
Auth();


?>


  <h1 class="text-center text-info display-1 mt-5">edit employees page</h1>
  <div class="container col-6">
    <div class="card">
        <div class="card-body" >
        <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label >name</label>
                    <input type="text" name="name" value="<?=$row['empname'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label >salary</label>
                    <input type="number" name="salary"value="<?=$row['salary'] ?>" class="form-control">
                </div>
                <span>
                    image:
                  <img width="90" class="mt-2" src="./upload/<?=$row['img']?>" alt="">


                </span>
                <div class="form-group">
                    <label >image</label>
                    <input type="file" name="img" class="form-control">
                </div>
                <div class="form-group">
                    <label >Department</label>
                   <select name="depid" class="form-control">
                    <option value="<?=$row['depid'] ?>" selected ><?=$row['depname'] ?> </option>
                    <?php foreach($department as $data ) :?>
                           <option value="<?=$data['id'] ?>"><?=$data['name'] ?></option>
                    <?php endforeach; ?>

                   </select>
                </div>
                <button name="send" class="btn btn-info mt-3">update employee</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../public/script.php';


?>