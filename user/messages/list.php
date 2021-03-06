<?php
include '../shared/head.php';
include '../shared/header.php';

include '../sharedFunc/db.php';
include '../sharedFunc/func.php';
$userId = $_SESSION['adminId'];
$select = "SELECT * FROM `messages` where userId =$userId";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM `messages` where id = $id";
  $d =  mysqli_query($conn, $delete);
  header('LOCATION: /pets/admin/messages/list.php');
}
if (isset($_SESSION['admin'])) {
} else {
    header("location:/pets/user/pages-login.php");
}
?>
<main id="main" class="main my-5 py-5">
<div class="alert addBanar alert-warning alert-dismissible fade show" role="alert">
  <strong>Hi!</strong> Your Can Place your ad here
</div>

  <div class="pagetitle">

    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List messages</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container col-7 mt-5 text-center">
        <div class="card">
          <a href="./reply.php" class="btn btn-info"> Send Message </a>
          <div class="card-body">
            <table class="table table-dark">
              <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Data</th>
                <th>Replay</th>
                <th>User ID</th>
                <th colspan="3">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['subject'] ?> </th>
                  <th> <?php echo $data['data'] ?> </th>
                  <th> <?php echo $data['replay'] ?> </th>
                  <th> <?php echo $data['userId'] ?> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/pets/admin/messages/list.php?delete=<?php echo $data['id'] ?>">delete </a> </th>
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