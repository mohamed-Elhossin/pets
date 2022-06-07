<?php
include '../shared/head.php';
include '../shared/header.php';

include '../sharedFunc/db.php';
include '../sharedFunc/func.php';
$userId = $_SESSION['adminId'];

  if (isset($_POST['send'])) {
    $subject = $_POST['subject'];
    $data = $_POST['data'];
    $update = "INSERT INTO `messages` VALUES(null,'$subject','$data',DEFAULT,$userId )";
    $u = mysqli_query($conn, $update);
    testMessage($u, "MESSAGE SEND ");
  }

  if (isset($_SESSION['admin'])) {
  } else {
      header("location:/pets/user/pages-login.php");
  }
?>
<main id="main" class="main my-5 py-5">
  <div class="pagetitle">
    <h1>Send Message</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List Message Subject</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container col-6 mt-5 ">
        <div class="card p-4  bg-dark">
          <form action="" method="POST">

            <div class="form-group">
              <label>Message Subject </label>
              <input type="text" placeholder="Enter your Subject" class="mt-3 form-control" name="subject">
            </div>

            <div class="form-group">
              <label>Message Data </label>
              <input type="text" placeholder="Enter your Data" class="mt-3 form-control" name="data">
            </div>
            <button name="send" class="btn btn-info my-3"> Send Your Answer </button>
          </form>
        </div>
      </div>
    </div><!-- End Right side columns -->
  </section>
</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>