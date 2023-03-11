<?php
// connect
include '../App/config.php';
include '../App/funcations.php';


include '../public/head.php';
include '../public/nav.php';

if(isset($_GET['search'])){
  $namevalue=$_GET['namevalue'];

  $select="SELECT * FROM `employeewithdepartment` where empname like '%$namevalue%'";
  $s=mysqli_query($conn,$select);

}




// unlink("./upload/1678047844ana.png")

// fileتقوم بمسح ال

Auth();

?>


  <h1 class="text-center text-info display-1 mt-5">list employees page</h1>

  <div class="container col-7">
  <form action="./srarch.php" method="get" class="d-flex" role="search">
        <input  id="myinput" class="form-control" name="namevalue" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
      </form>
    <div class="card">
        <div class="card-body">
          <table id="mytable" class="table table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>salary</th>
                <th>img</th>
                <th>department id</th>
                <th>Created at</th>
                <th colspan="2">Action</th>


            </tr>
             <?php foreach($s as $data): ?>
            <tr>
                 <td><?= $data['id']  ?></td> 
                 <td><?= $data['empname']  ?></td> 
                 <td><?= $data['salary']  ?></td> 
                 <td><img width="80" src="./upload/<?= $data['img']  ?>" alt=""></td> 
                 <td><?= $data['depname']  ?></td> 
                 <td><?=substr($data['create_at'],10)   ?></td> 
                 <td> <a href="/lec36crud/employee/edit.php?edit=<?=$data['id']?> " class="btn btn-info">edit</a> </td> 
                 <td> <a onclick="return confirm('are you sure')" href="/lec36crud/employee/list.php?delete=<?=$data['id']?> " class="btn btn-danger">delete</a> </td> 



            </tr>
            <?php endforeach; ?>

          </table>
        </div>
    </div>
</div>
<?php
include '../public/script.php';


?>