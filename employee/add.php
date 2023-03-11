<?php
// connect
include '../App/config.php';
include '../App/funcations.php';
// ui
include '../public/head.php';
include '../public/nav.php';

$select="SELECT * FROM `department`";
$department=mysqli_query($conn,$select);


if(isset($_POST['send'])){
$name=$_POST['name'];
$salary=$_POST['salary'];
$depid=$_POST['depid'];
// img code 
$img_name=time() . $_FILES['img']['name'];
//  في  في حالة اذا قام شخص برفع صورة بأسم معين ورفع اخر صورة اخري بنفس الاسم في هذة الحالة سيقوم بتسجيل صورة واحدة فقط لانة لا يكرر الاسماء لحل هذه المشكلة من الممكن ان اضع بجانبها 
// function time
// or function  rand()
// اقوم بوضع داخل الاقواس الارقام الحد الادني والحد الاقصي للتغير في الارقام 
// functionومن الممكن عدم استدعاء اسم الصورة والاكتفاء بال
$tmp_name=$_FILES['img']['tmp_name'];
$location='upload/'.$img_name;
move_uploaded_file($tmp_name,$location );
// تستخدم لاخذ نسخة من الفيلات من مكان الي اخر مثل الصور


$insert="INSERT INTO employees VALUES(null,'$name',$salary,'$img_name',Default,$depid) ";
$i=mysqli_query($conn,$insert);
path('employee/list.php');
// testmessage($i,'insert');


}
// lec37
// one value وامامه key  في رفع الفيلات لانها تأخذmethod :postلا يمكن استخدام ال
// وهي value والفيل يملك اكثر من 
// type jpg pdf 
// name
// locationالذي هو الtemname =temporery name
// fileالذي تسمي super global array ولحل هذه المشكلة نستخدم ال
// لا تحمل صورdata base 
// لذا سيتم تحميلها في فولدر علي هذا المشروع
// databaseوسيتم تخزين اسم الصورة فقط في 
// print_r($_FILES);

Auth();

?>

<h1 class="text-center text-info display-1 mt-5">Add employee page</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <!-- enctype:encrupted type  -->
            <!-- الذي انا لا اعرف توعهاdataاي ال -->
            <!-- files two demention arrayلان value اي اكثر من multipart  -->
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label >name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label >salary</label>
                    <input type="number" name="salary" class="form-control">
                </div>
                <div class="form-group">
                    <label >image</label>
                    <input type="file" name="img" class="form-control">
                </div>
                <div class="form-group">
                    <label >Department</label>
                   <select name="depid" class="form-control">
                    <?php foreach($department as $data ) :?>
                           <option value="<?=$data['id'] ?>"><?=$data['name'] ?></option>
                    <?php endforeach; ?>

                   </select>
                </div>
                <button name="send" class="btn btn-info mt-3">send employee</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../public/script.php';


?>