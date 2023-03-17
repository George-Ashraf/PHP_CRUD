<?php
// connect
include '../App/config.php';
include '../App/funcations.php';


include '../public/head.php';
include '../public/nav.php';




$select="SELECT * FROM `adminsrule`";
$s=mysqli_query($conn,$select);
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE FROM `admin` WHERE id=$id";
    $d=mysqli_query($conn,$delete);
    path('admin/list.php');

};

Auth();

?>


  <h1 class="text-center text-info display-1 mt-5">list admin page</h1>

  <div class="container col-6">
    <div class="card">
        <div class="card-body">
          <table class="table table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>rule</th>
        <th colspan='2'> action   </th>
            </tr>
             <?php foreach($s as $data): ?>
            <tr>
                 <td><?= $data['id']  ?></td> 
                 <td><?= $data['name']  ?></td> 
                 <td><?= $data['description']  ?></td> 

                 <td> <a href="/lec36crud/admin/edit.php?edit=<?=$data['id']?> " class="btn btn-info">edit</a> </td> 
                 <td> <a onclick="return confirm('are you sure')" href="/lec36crud/admin/list.php?delete=<?=$data['id']?> " class="btn btn-danger">delete</a> </td> 



            </tr>
            <?php endforeach; ?>

          </table>
        </div>
    </div>
</div>
<?php
include '../public/script.php';


?>