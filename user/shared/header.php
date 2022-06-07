<?php
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/pets/user/');
}
?>
<!-- ======= Header ======= -->

<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="index.php">pets
      </a></h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="/pets/user/#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="/pets/user/#about">About</a></li>
        <li><a class="nav-link scrollto" href="/pets/user/#services">Services</a></li>
        <li><a class="nav-link scrollto" href="/pets/user/#team">Team</a></li>
        <?php if (isset($_SESSION['admin'])) : ?>
          <li><a class="nav-link scrollto" href="/pets/user/posts/add.php">Create Post</a></li>
          <li><a class="nav-link scrollto" href="/pets/user/posts/list.php">List posts</a></li>
        <?php endif; ?>
        <li><a class="nav-link scrollto" href="/pets/user/#footer">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <div class="social-links">
      <?php if (isset($_SESSION['admin'])) : ?>
        <form action="">
          <button name="logout" class="btn btn-info"> Log Out </button>
        </form>
        <a class="btn btn-danger p-3" href="/pets/user/admins/profile.php">your Profile</a>
      <?php else : ?>
        <a href="/pets/user/admins/add.php" class="btn btn-info p-3 "> Sign up </a>
        <a href="/pets/user/pages-login.php" class="btn btn-warning p-3">Login</a>
      <?php endif; ?>
    </div>
  </div>
</header><!-- End Header -->