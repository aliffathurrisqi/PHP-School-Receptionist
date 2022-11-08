<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if(!$_SESSION['username']){
    echo "<script>alert('Anda belum login');</script>";
    echo '<script>location.replace("index.php"); </script>';
}

$title = "Dashboard";
include("env.php");
include("function.php");
include("views/partials/head.php");
?>

<body>
    <div class="wrapper">
        <?php include("views/partials/sidebar.php"); ?>

        <div class="main">
            <?php include("views/partials/navbar.php"); ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Statistik</h1>
                    </div>
                    <div class="row">

                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title"><a href="visits.php" class="text-success">Kunjungan</a></h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-success">
                                                            <i class="bi bi-person-check align-middle fs-3"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h1 class="mt-1 mb-3"><?php echo mysqli_num_rows($visits) ?></h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title"><a href="comments.php" class="text-success">Komentar</a></h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-success">
                                                            <i class="bi bi-chat-dots align-middle fs-3"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h1 class="mt-1 mb-3"><?php echo mysqli_num_rows($comments) ?></h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title"><a href="staff.php" class="text-success">Staff</a></h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-success">
                                                            <i class="bi bi-people align-middle fs-3"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h1 class="mt-1 mb-3"><?php echo mysqli_num_rows($subjects) ?></h1>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </main>

            <?php include("views/partials/footer.php"); ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>