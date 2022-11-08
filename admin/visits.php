<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if(!$_SESSION['username']){
    echo "<script>alert('Anda belum login');</script>";
    echo '<script>location.replace("index.php"); </script>';
}
$title = "Kunjungan";
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
                <?php 
                    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                    $date = isset($_GET['date'])?"&&date=".$_GET['date'] : "";
                    $filter = isset($_GET['filter'])?"&&filter=".$_GET['filter'] : "";
                    $show = $halaman.$filter.$date;
                 ?>
                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Data Kunjungan</h1>
                        <div class="float-end">
                            <a class="btn btn-success" href="print.php?halaman=<?php echo $show ?>" target="_blank">Cetak Laporan</a>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                    <form class="input-group mb-3 w-50 float-end" method="GET" action="visits.php">
                                                        <input type="date" class="form-control" name="date">
                                                        <?php 
                                                        if (isset($_GET['filter'])){ ?> 
                                                        <input type="hidden" class="form-control" name="filter" value="<?php echo $_GET['filter']?>">
                                                        <?php 
                                                        }
                                                        
                                                        if (isset($_GET['halaman'])){ ?> 
                                                        <input type="hidden" class="form-control" name="halaman" value="<?php echo $_GET['halaman']?>">
                                                        <?php 
                                                        }
                                                        ?>
                                                        <button type="submit" class="btn btn-success">Cari</button>
                                                    </form>
                                                    <form method="GET" action="visits.php">
                                                        <button type="submit" class="btn btn-success">Tampilkan Semua</button>
                                                    </form>
                                                
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Pengunjung</th>
                                                            <th>Alamat</th>
                                                            <th>No. Telepon</th>
                                                            <th>Tujuan</th>
                                                            <th>Bertemu</th>
                                                            <th>Keterangan</th>
                                                            <th>Waktu</th>
                                                        </tr>
                                                        <tr class="bg-dark">
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-center p-0">
                                                                <a class="me-2 text-light" href="?halaman=<?php echo $halaman?>&&filter=timeASC<?php echo $date;?>"><i class="bi bi-sort-down fs-3"></i></a>
                                                                <a class="text-light" href="?halaman=<?php echo $halaman?>&&filter=timeDESC<?php echo $date;?>"><i class="bi bi-sort-up fs-3"></i></a>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $batas = 20;
                                                        
                                                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

                                                        $previous = $halaman - 1;
                                                        $next = $halaman + 1;

                                                        $query = "SELECT * FROM data_kunjungan";

                                                        if(isset($_GET['date'])){
                                                            $get = $_GET['date'];
                                                            $tgl = mysqli_query($conn,"SELECT DATE_FORMAT('$get', '%d %M %Y') AS tanggal");
                                                            foreach($tgl as $tanggal){
                                                                $query = "SELECT * FROM data_kunjungan WHERE time LIKE '%".$tanggal['tanggal']."%'";
                                                            }

                                                        }

                                                        $data = mysqli_query($conn,"$query");
                                                        $visit_data = mysqli_query($conn,"$query LIMIT $halaman_awal, $batas");

                                                        if(isset($_GET['filter'])){
                                                            if($_GET['filter'] == "timeASC"){
                                                                $visit_data = mysqli_query($conn,"$query ORDER BY time ASC LIMIT $halaman_awal, $batas");
                                                            }

                                                            if($_GET['filter'] == "timeDESC"){
                                                                $visit_data = mysqli_query($conn,"$query ORDER BY time DESC LIMIT $halaman_awal, $batas");
                                                            }
                                                        }

                                                        $jumlah_data = mysqli_num_rows($data);
                                                        $total_halaman = ceil($jumlah_data / $batas);

                                                        $nomor = $halaman_awal;
                                                        foreach($visit_data as $visit){
                                                        ?>
                                                            <tr>
                                                                <td><?php echo ++$nomor;?></td>
                                                                <td><?php echo $visit['nama_pengunjung']; ?></td>
                                                                <td><?php echo $visit['alamat']; ?></td>
                                                                <td><?php echo $visit['telp']; ?></td>
                                                                <td><?php echo $visit['tujuan']; ?></td>
                                                                <td><?php echo $visit['subject']; ?></td>
                                                                <td><?php echo $visit['keterangan']; ?></td>
                                                                <td><?php echo $visit['time']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>

                                                <nav>
                                                    <ul class="pagination justify-content-center">
                                                        <li class="page-item">
                                                            <a class="page-link text-success" <?php if($halaman > 1){ echo "href='?halaman=$previous$filter$date'"; } ?>>&laquo;</a>
                                                        </li>
                                                        <?php 
                                                        for($x=1;$x<=$total_halaman;$x++){
                                                            ?> 
                                                            <li class="page-item"><a class="page-link text-success" href="?halaman=<?php echo $x.$filter.$date ?>"><?php echo $x; ?></a></li>
                                                            <?php
                                                        }
                                                        ?>				
                                                        <li class="page-item">
                                                            <a  class="page-link text-success" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next$filter$date'"; } ?>>&raquo;</a>
                                                        </li>
                                                    </ul>
                                                </nav>

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