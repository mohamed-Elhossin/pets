<?php
include '../shared/head.php';
include '../shared/header.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';
$select = "SELECT * FROM `categories`";
$s = mysqli_query($conn, $select);
if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $userId = $_SESSION['adminId'];
    $catId = $_POST['catId'];
    // Image Code
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    if (move_uploaded_file($image_tmp, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    $insert = "INSERT INTO `posts` VALUES (NULL , '$title','$image_name' ,'$description',DEFAULT, $userId,$catId )";
    $i =  mysqli_query($conn, $insert);
    testMessage($i, "Post Craeted ");
}
if (isset($_SESSION['admin'])) {
} else {

    header("location:/pets/user/pages-login.php");
}

$title = "";
$description = "";
$categoryId = "";

$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id =   $_GET['edit'];
    $select = "SELECT * from `posts` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $title = $row['title'];
    $description = $row['description'];
    $image = $row['image'];

    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $catId = $_POST['catId'];
        // Image Code
        $image_name = $image;

        $update = "UPDATE `posts` SET `title` = '$title' ,  `description` = '$description' ,  `categoryId` = $catId  where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Updated Your Post");
        // header('LOCATION: http://localhost/pets/admin/travelAgenecy/list.php');
    }
}
?>
<main id="main" class="main  my-5 pt-5">
    <div class="pagetitle">

        <?php if ($update) : ?>
            <h1 class="display-1 text-center text-info">Update Post</h1>

        <?php else : ?>
            <h1 class="display-1 text-center text-info">Create Post</h1>
        <?php endif; ?>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="container col-md-7">
                <div class="card bg-dark">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Full title</label>
                                <input value="<?php echo $title ?>" name="title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> user description </label>
                                <input  value="<?php echo $description ?>" name="description" type="text" class="form-control">
                            </div>
                            <?php if (!$update) : ?>
                                <div class="form-group">
                                    <label> user image </label>
                                    <input name="image" type="file" class="form-control">
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label> Category</label>
                                <?php foreach ($s as $data) { ?>
                                    <select name="catId" class="form-control">
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?> </option>
                                    </select>
                                <?php } ?>
                            </div>

                            <?php if ($update) : ?>
                                <button name="update" class="btn mt-3 btn-info btn-block w-50 mx-auto"> update Data </button>

                            <?php else : ?>
                                <button name="send" class="btn mt-3 btn-info btn-block w-50 mx-auto"> Send Data </button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>