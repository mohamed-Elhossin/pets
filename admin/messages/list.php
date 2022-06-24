<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `messages`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `messages` where id = $id";
    $d = mysqli_query($conn, $delete);
    path('messages/list.php');
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List messages Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List messages</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container col-9 mt-5 text-center">
        <div class="card">
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
              <?php foreach ($s as $data) {?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['subject'] ?> </th>
                  <th> <?php echo $data['data'] ?> </th>
                  <th> <?php echo $data['replay'] ?> </th>
                  <th> <?php echo $data['userId'] ?> </th>
                  <th> <a class="btn btn-info" href="/pets/admin/messages/reply.php?show=<?php echo $data['id'] ?>">reply </a> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/pets/admin/messages/list.php?delete=<?php echo $data['id'] ?>">delete </a> </th>
                </tr>
              <?php }?>
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