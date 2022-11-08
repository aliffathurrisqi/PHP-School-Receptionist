<!DOCTYPE html>
<html lang="en">
<?php
$title = "Komentar";
include("admin/env.php");
include("admin/function.php");
include("head.php");
?>

<body>
    <div class="wrapper">

        <!-- <div class="main" style="background-image:url(admin/img/logos/halaman.jpg); background-repeat: no-repeat, repeat; background-size: cover;"> -->
        <div class="main">
            <main class="content">
                <div class="container-fluid p-0">

                    <div class="row">

                        <div class="col-xl-12 col-xxl-12 d-flex shadow">
                            <div class="w-100">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="card ">
                                            <div class="card-body">
                                                <center>
                                                    <img src="admin/img/logos/logo-smkn-1-godean.png" width="100" height="100">
                                                    <h6 class="mt-2">Kowanan, Sidoagung, Godean, Sleman, Yogyakarta, 55564</h6>
                                                </center>

                                                <div class="text-center mt-5">
                                                    <form action="comment.php">
                                                        <?php
                                                        $rating = $_GET['rating'];
                                                        $user = $_GET['user'];
                                                        ?>
                                                        <input type="hidden" name="user" value="<?php echo $user ?>">
                                                        <?php
                                                        for ($i = 1; $i <= 5; $i++) {
                                                        ?>
                                                            <button name="rating" class="btn" value="<?php echo $i ?>"><i class="bi bi-star<?php if ($rating >= $i) echo "-fill" ?> fs-1 text-warning"></i></button>
                                                        <?php
                                                        }
                                                        ?>
                                                    </form>
                                                </div>
                                                <form class="w-100" method="POST" onchange="this.form.submit()">
                                                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                                                    <input type="hidden" name="rating" value="<?php echo $rating ?>">
                                                    <input type="text" class="form-control mb-4" name="komentar" placeholder="Beri kami penilaian...." value="<?php echo $_POST['komentar'] ?>" required>
                                                    <div class="input-group">
                                                        <button class="btn btn-primary w-100" name="btnNewComment" type="submit">Beri Nilai</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>