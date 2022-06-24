<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

if (isset($_GET['show'])) {
    $id = $_GET['show'];
    if (isset($_POST['send'])) {
        $reply = $_POST['reply'];
        $update = "UPDATE `messages`  SET replay ='$reply' where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Send Answer");
    }
}

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Message Answer</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List Message reply</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container col-6 mt-5 ">
        <div class="card">
          <form action="" method="POST">
            <div class="form-group p-2">
              <label for="">Send Your Answer </label>
            <input type="text" placeholder="Enter your Reply" class="mt-3 form-control" name="reply">
            <button name="send" class="btn btn-info my-3"> Send Your Answer </button>

            </div>

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