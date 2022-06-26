<?php
include '../shared/head.php';
include '../shared/header.php';
include '../sharedFunc/db.php';
$select = "SELECT * FROM `categories`";
$s = mysqli_query($conn, $select);
if (isset($_SESSION['admin'])) {
} else {
    header("location:/pets/user/pages-login.php");
}
?>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container">
        <header class="section-header">
            <h3>Categories</h3>
        </header>
        <div class="row flex-items-xs-middle flex-items-xs-center">
            <!-- Basic Plan  -->
            <?php foreach ($s as $data) {?>
                <div class="col-xs-12 col-lg-4 ">
                    <div class="card  bg-dark mt-5">
                        <div class="card-header">
                        </div>
                        <div class="card-block">
                            <h4 class="card-title text-info">
                            <a href="/pets/user/posts/list.php?show=<?php echo $data['id'] ?>">   Title: <?php echo $data['name'] ?></a>
                            </h4>

                        </div>
                    </div>
                </div>

            <?php }?>
        </div>
    </div>

</section><!-- End Pricing Section -->

<?php
include '../shared/footer.php';
include '../shared/script.php';

?>