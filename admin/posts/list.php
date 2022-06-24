<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `posts` ORDER by `status` DESC";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM `posts` where id = $id";
  $d =  mysqli_query($conn, $delete);
  header('LOCATION: /pets/admin/posts/list.php');
  path('posts/list.php');

}
if (isset($_GET['approve'])) {
  $id = $_GET['approve'];
  $update = "UPDATE `posts`  SET `status`='done' where id = $id";
  $u = mysqli_query($conn, $update);
  testMessage($u, "Post Approved");
  path('posts/list.php');

}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List posts Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List posts</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container col-11 mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table table-dark">
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>description</th>
                <th>status</th>
                <th colspan="2">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['title'] ?> </th>
                  <th> <?php echo $data['image'] ?> </th>
                  <th> <?php echo $data['description'] ?> </th>
                  <th> <?php echo $data['status'] ?> </th>
                  <th> <a class="btn btn-light" href="/pets/admin/posts/list.php?approve=<?php echo $data['id'] ?>">Approve </a> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/pets/admin/posts/list.php?delete=<?php echo $data['id'] ?>">delete </a> </th>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

    </div><!-- End Right side columns -->
  </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>