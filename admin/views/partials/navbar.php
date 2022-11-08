<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="img/logos/logo-smkn-1-godean.png" class="avatar img-fluid rounded me-1" /> <span class="text-dark"><?php echo $_SESSION['username']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <form method="POST">
                        <button class="dropdown-item" type="submit" name="btnLogout"><i class="bi bi-door-open"></i> Log out</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php
if (isset($_POST["btnLogout"])) {
session_start();
session_unset();
session_destroy();
echo '<script> location.replace("index.php"); </script>';
}
?>