<?php
// connect
include '../App/config.php';
include '../App/funcations.php';


include '../public/head.php';
include '../public/nav.php';



$adminid = $_SESSION['admin']['id'];
// echo $adminid;
$select = "SELECT * FROM `adminalldata` WHERE id=$adminid";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);

// img upload
if (isset($_POST['send'])) {
    $img_name = time() . $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $location = 'upload/' . $img_name;
    $imgvalue = $_FILES['img']['name'];

if(empty($imgvalue)){
    $img_name=$row['img'];
}
else{
    move_uploaded_file($tmp_name,$location );
    $imgoldname=$row['img'];
    if(  $imgoldname!="fake.jpg"){
        unlink("./upload/$imgoldname");

    }

}

$update="UPDATE admin SET img='$img_name' where id=$adminid ";
$u=mysqli_query($conn,$update);
path("admin/profile.php");
}



Auth(2, 3);

?>


<h1 class="text-center text-info display-1 mt-5">profile admin</h1>

<div class="container col-6">
    <div class="card">
        <img src="./upload/<?= $row['img'] ?>" class="img-top" alt="">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            upload new image
        </button>
        <div class="card-body">
            <h1>name: <?= $row['name'] ?></h1>
            <hr>
            <h1>rule: <?= $row['description'] ?></h1>

            <a href="/lec36crud/admin/editprofile.php" class="btn btn-warning">edit </a>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">change your image</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>upload img</label>
                        <input type="file" name='img' class="form-control">
                    </div>
                    <button name="send" class="btn btn-info mt-3">send department</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<?php
include '../public/script.php';


?>