<?php
// connect
include '../App/config.php';
include '../App/funcations.php';


include '../public/head.php';
include '../public/nav.php';




$select = "SELECT * FROM `employeewithdepartment`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  // لكي اقوم بمسح الصورة
  $selimg = " SELECT  `img`  FROM `employees` WHERE id= $id";
  $Run = mysqli_query($conn, $selimg);
  $row = mysqli_fetch_assoc($Run);
  $image = $row['img'];
  //  echo $image;
  unlink("./upload/$image");

  $delete = "DELETE FROM `employees` WHERE id=$id";
  $d = mysqli_query($conn, $delete);
  path('employee/list.php');
};

// unlink("./upload/1678047844ana.png")

// fileتقوم بمسح ال
Auth();

?>


<h1 class="text-center text-info display-1 mt-5">list employees page</h1>

<div class="container col-7">
  <form action="./srarch.php" method="get" class="d-flex" role="search">
    <input id="myInput" class="form-control" name="namevalue" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" name="search" type="submit">Search</button>
  </form>
  <div class="card">
    <div class="card-body">
      <table id="myTable" class="table table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th colspan="2">Action</th>


        </tr>
        <?php foreach ($s as $data) : ?>
          <tr>
            <td><?= $data['id']  ?></td>
            <td><?= $data['empname']  ?></td>
            <td>
              <div class="dropdown">
                <button   data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis"></i>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item text-primary" href="/lec36crud/employee/edit.php?edit=<?= $data['id'] ?> "><i class="fa-solid fa-pen"></i></a></li>
                  <li><a class="dropdown-item text-danger" onclick="return confirm('are you sure')" href="/lec36crud/employee/list.php?delete=<?= $data['id'] ?>" ><i class="fa-solid fa-trash-can"></i></a></li>
                  <li><a class="dropdown-item text-info" href="/lec36crud/employee/profile.php?show=<?= $data['id'] ?>"><i class="fa-solid fa-eye"></i></a></li>
                </ul>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>

      </table>
    </div>
  </div>
</div>
<?php
include '../public/script.php';


?>