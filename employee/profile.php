<?php
// connect
include '../App/config.php';
include '../App/funcations.php';


include '../public/head.php';
include '../public/nav.php';




if (isset($_GET['show'])) {
  $id = $_GET['show'];

  $select = "SELECT * FROM `employeewithdepartment` WHERE id=$id";
  $s = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);
};

Auth(2);

?>


<h1 class="text-center text-info display-1 mt-5">list employees page</h1>

<div class="container col-7">

  <div class="card">
    <img class="img-top" src="./upload/<?= $row['img'] ?>" alt="">
    <div class="card-body">
      <ul>

        <li> name:<?= $row['empname'] ?> </li>
        <li> salary:<?= $row['salary'] ?></li>
        <li> department:<?= $row['depid'] ?> </li>
        <li>
          <a href="/lec36crud/employee/edit.php?edit=<?= $row['id'] ?> " class="btn btn-info">edit</a>
        </li>
        <li>
          <a onclick="return confirm('are you sure')" href="/lec36crud/employee/list.php?delete=<?= $row['id'] ?> " class="btn btn-danger">delete</a>
        </li>
      </ul>


    </div>
  </div>
</div>
<?php
include '../public/script.php';


?>