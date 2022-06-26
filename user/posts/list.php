<?php
include '../shared/head.php';
include '../shared/header.php';
include '../sharedFunc/db.php';

if(isset($_GET['show'])){
    $id = $_GET['show'];
    $select = "SELECT posts.id id ,posts.title title,users.phone phone ,posts.image image , posts.description description , users.name author FROM `posts` JOIN users ON posts.userId = users.id where `status` ='done' and categoryId = $id ";
    $s = mysqli_query($conn, $select);
}

if (isset($_SESSION['admin'])) {
} else {
    header("location:/pets/user/pages-login.php");
}
?>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container">
        <header class="section-header">
            <h3>Posts</h3>
        </header>
        <div class="row flex-items-xs-middle flex-items-xs-center">
            <!-- Basic Plan  -->
            <?php foreach ($s as $data) { ?>
                <div class="col-xs-12 col-lg-4 ">
                    <div class="card  bg-dark mt-5">
                        <img height="300" src="/pets/user/posts/upload/<?php echo $data['image'] ?>" class="img-top" alt="Eror">
                        <div class="card-header">
                        </div>
                        <div class="card-block">
                            <h4 class="card-title text-info">
                                Title: <?php echo $data['title'] ?>
                            </h4>
                            <p>
                                Description: <?php echo $data['description'] ?>
                            </p>
                            <p>
                            </p>
                            Author: <p> <?php echo $data['author'] ?>
                            </p>
                            </p>
                            P:Number: <p> <?php echo $data['phone'] ?>
                            </p>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

</section><!-- End Pricing Section -->

<?php
include '../shared/footer.php';
include '../shared/script.php';

?>