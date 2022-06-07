<?php
include '../shared/head.php';
include '../shared/header.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    // Image Code
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    if (move_uploaded_file($image_tmp, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    $insert = "INSERT INTO `users` VALUES (NULL , '$name' ,'$email','$phone' ,'$address', '$password','$image_name')";
    $i =  mysqli_query($conn, $insert);
    testMessage($i, "Now You Are signed IN");
}

$name = "";
$email = "";
$phone = "";
$address = "";
$password = "";
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id =   $_GET['edit'];
    $select = "SELECT * from `users` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $password = $row['password'];
    $image = $row['image'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        // Image Code
        $image_name = $image;


        $update = "UPDATE `users` SET `name` = '$name' ,  `phone` = '$phone' ,  `email` = '$email' ,  `password` = '$password' ,`image`='$image_name' where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Updated Your Profile");
        // header('LOCATION: http://localhost/pets/admin/travelAgenecy/list.php');
    }
}
?>
<main id="main" class="main  my-5 pt-5">
    <div class="pagetitle">
        <?php if ($update) : ?>
            <h1 class="display-1 text-center text-info">Edit Your profile </h1>

        <?php else : ?>
            <h1 class="display-1 text-center text-info">Sign Up </h1>
        <?php endif; ?>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="container col-md-7">
                <div class="card bg-dark">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Full Name</label>
                                <input value="<?php echo $name ?>" name="name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> user Email </label>
                                <input value="<?php echo $email ?>" name="email" type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> user phone </label>
                                <input value="<?php echo $phone ?>" name="phone" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> user Address</label>
                                <input value="<?php echo $address ?>" name="address" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> user password</label>
                                <input value="<?php echo $password ?>" name="password" type="password" class="form-control">
                            </div>
                            <?php if (!$update) : ?>
                                <div class="form-group">
                                    <label> image profile</label>
                                    <input name="image" type="file" class="form-control">
                                </div>
                            <?php endif; ?>
                            <?php if ($update) : ?>
                                <button name="update" class="btn mt-3 btn-warning btn-block w-50 mx-auto"> Update Data </button>
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