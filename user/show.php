<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';

if (isset($_GET['search'])) {
  $location = $_GET['location'];
    $select = "SELECT users.address rr ,posts.id id ,posts.title title,users.phone phone ,posts.image image , posts.description description , users.name author FROM `posts` JOIN users ON posts.userId = users.id where  users.address LIKE '%$location%' ";
  $s = mysqli_query($conn, $select);
  $numRows = mysqli_num_rows($s);
}


?>
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
                </p>
                User Locaiton: <p> <?php echo $data['rr'] ?>
                </p>
            </div>
        </div>
    </div>

<?php } ?>
</div>
</div>

</section><!-- End Pricing Section -->

<?php
include './shared/footer.php';
include './shared/script.php';
?>