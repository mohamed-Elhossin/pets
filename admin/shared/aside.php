<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="/pets/admin/index.php">
        <i class="bi bi-grid"></i>
        <span>Home page</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#category" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="category" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/pets/admin/category/add.php">
            <i class="bi bi-circle"></i><span>Add</span>
          </a>
        </li>
        <li>
          <a href="/pets/admin/category/list.php">
            <i class="bi bi-circle"></i><span>List</span>
          </a>
        </li>
      </ul>
    </li><!-- End travel Adency Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>posts</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="posts" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/pets/admin/posts/list.php">
            <i class="bi bi-circle"></i><span>List</span>
          </a>
        </li>
      </ul>
    </li><!-- End travel Adency Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#messages" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>messages</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="messages" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/pets/admin/messages/list.php">
            <i class="bi bi-circle"></i><span>List messages</span>
          </a>
        </li>
      </ul>
    </li><!-- End travel Adency Nav -->

    <?php if ($_SESSION['role'] == 0) : ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#admin" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>admins</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/pets/admin/admins/add.php">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
          <li>
            <a href="/pets/admin/admins/list.php">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li><!-- End travel Adency Nav -->
    <?php endif; ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#users" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>users</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="users" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/pets/admin/users/list.php">
            <i class="bi bi-circle"></i><span>list</span>
          </a>
        </li>
      </ul>
    </li><!-- End travel Adency Nav -->


    <li class="nav-item">
      <a class="nav-link collapsed" href="/pets/admin/pages-contact.php">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Contact Page Nav -->


    <li class="nav-item">
      <a class="nav-link collapsed" href="/pets/admin/users-profile.php">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->


  </ul>

</aside><!-- End Sidebar-->