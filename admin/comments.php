<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if(!$_SESSION['username']){
    echo "<script>alert('Anda belum login');</script>";
    echo '<script>location.replace("index.php"); </script>';
}

$title = "Komentar";
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
                        <h1 class="h3 d-inline align-middle">Data Komentar</h1>

                        
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                        <div class="card mb-2">
                            <div class="card-body h-100">
                                Rata-Rata Rating : 
                                <?php 
                                $avg_rating = mysqli_query($conn, "SELECT AVG(rating) AS rating FROM data_komentar");
                                foreach ($avg_rating AS $average) {
                                    echo "<strong>".$average['rating']."</strong>";
                                }
                                ?>
                        <i class="bi bi-star-fill text-warning fs-5"></i>
                            </div>
                        </div>
                            <?php
                            $batas = 20;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                            $previous = $halaman - 1;
                            $next = $halaman + 1;
            
                            $data = $comments;
                            $comment_data = mysqli_query($conn,"SELECT * FROM data_komentar LIMIT $halaman_awal, $batas");


                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $nomor = $halaman_awal;

                            foreach ($comment_data as $comment) {
                            ?>
                                <div class="card mb-2">
                                    <div class="card-body h-100">
                                        <div class="d-flex align-items-start">
                                            <img src="img/avatars/profile.jpg" width="36" height="36" class="rounded-circle me-2" alt="<?php echo $comment->pengunjung ?>">
                                            <div class="flex-grow-1">
                                                <div class="float-end text-navy fs-4">
                                                    <?php
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $comment['rating']) {
                                                    ?>
                                                            <i class="bi bi-star-fill text-warning"></i>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <i class="bi bi-star text-warning"></i>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <strong><?php echo $comment['pengunjung'] ?></strong><br>
                                                <small class="text-muted"><?php echo $comment['time'] ?></small>

                                                <div class="text-lg text-muted mt-1">
                                                    <?php echo $comment['komentar'] ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link text-success" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>>&laquo;</a>
                                    </li>
                                    <?php 
                                        for($x=1;$x<=$total_halaman;$x++){
                                    ?> 
                                        <li class="page-item"><a class="page-link text-success" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                     <?php
                                        }
                                    ?>				
                                    <li class="page-item">
                                        <a  class="page-link text-success" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>&raquo;</a>
                                    </li>
                                </ul>
                            </nav>

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