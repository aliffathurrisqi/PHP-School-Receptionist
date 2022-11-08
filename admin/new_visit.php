<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if(!$_SESSION['username']){
    echo "<script>alert('Anda belum login');</script>";
    echo '<script>location.replace("index.php"); </script>';
}

$title = "Buat Data";
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
                        <h1 class="h3 d-inline align-middle">Kunjungan Baru</h1>
                    </div>
                    <div class="row">

                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="card ">
                                            <div class="card-body">
                                                <center>
                                                    <img src="img/logos/logo-smkn-1-godean.png" width="100" height="100">
                                                    <h6 class="mt-2">Kowanan, Sidoagung, Godean, Sleman, Yogyakarta, 55564</h6>
                                                </center>
                                                <form class="w-100 mt-3" method="POST">
                                                <label>Tujuan : </label>
                                                    <select class="form-select mb-2" name="tujuan" onchange="this.form.submit()" required>
                                                        <?php foreach ($purposes as $purpose) { ?>
                                                            <option value="<?php echo $purpose['tujuan'] ?>" <?php if($_POST['tujuan'] == $purpose['tujuan']){ ?> selected <?php } ?>><?php echo $purpose['tujuan'] ?></option>
                                                        <?php } ?>
                                                        <option value="Lainnya" <?php if($_POST['tujuan'] == "Lainnya"){ ?> selected <?php } ?>>Lainnya</option>
                                                    </select>
                                                    <?php
                                                    if(isset($_POST['tujuan'])){
                                                    ?>
                                                    <label>Bertemu : </label>
                                                    <select class="form-select mb-2" name="subjek">
                                                        <?php 
                                                        $key = $_POST['tujuan'];
                                                        if($_POST['tujuan'] != "Lainnya"){
                                                            $checks = mysqli_query($conn, "SELECT * FROM data_tujuan WHERE tujuan = '$key'");
                                                            foreach ($checks as $check) { ?>
                                                                <option value="<?php echo $check['nama_subject'] ?>"><?php echo $check['nama_subject'] ?></option>
                                                            <?php 
                                                            }
                                                        }
                                                        else{
                                                            foreach ($subjects as $subject) { ?>
                                                                <option value="<?php echo $subject['nama'] ?>"><?php echo $subject['nama'] ?></option>
                                                            <?php }
                                                        }
                                                    }
                                                    ?>
                                                    </select>
                                                    <label>Nama Pengunjung : </label>
                                                    <input type="text" class="form-control mb-2" name="nama" required>
                                                    <label>Alamat : </label>
                                                    <input type="text" class="form-control mb-2" name="alamat" required>
                                                    <label>No Telepon : </label>
                                                    <input type="text" class="form-control mb-2" name="telp" required>
                                                    <label>Instansi : </label>
                                                    <input type="text" class="form-control mb-2" name="instansi" required>
                                                    <label>Keterangan : </label>
                                                    <input type="text" class="form-control mb-4" name="keterangan" required>
                                                <button class="btn btn-primary w-100" name="btnNewVisitUser" type="submit">Masukkan Data</button>
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

            <?php include("views/partials/footer.php"); ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>