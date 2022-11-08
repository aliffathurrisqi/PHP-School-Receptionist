<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if(!$_SESSION['username']){
    echo "<script>alert('Anda belum login');</script>";
    echo '<script>location.replace("index.php"); </script>';
}
$title = "Cetak";
include("env.php");
include("function.php");
include("views/partials/head.php");
?>

<body style="font-family:'Times New Roman', Times, serif; font-size:smaller;">
    <div class="wrapper">
        <div class="main">
            <main class="content bg-white">
                <div class="d-flex mb-2">
                    <div class="float-start">
                        <img src="img/logos/logo-smkn-1-godean.png" width="150" height="150">
                    </div>
                    <div class="ms-2 text-center w-100">
                        <h3>PEMERINTAH KABUPATEN SLEMAN</h3>
                        <h3>DINAS PENDIDIKAN, PEMUDA, DAN OLAHRAGA</h3>
                        <h1>SMK NEGERI 1 GODEAN</h1>
                        <h5>Alamat : Kowanan, Sidoagung, Godean, Sleman, Yogyakarta, 55564</h5>
                        <h5>Telepon (0274) 798274, Faksimile (0274) 798274</h5>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="w-100">
                    <hr style="margin-top: 0px; padding:0px; border-top: 2px solid black; opacity:1;
                    border-bottom: 6px solid black; opacity:1; height:12px;">
                    </div>
                </div>
                <div>
                                                <table class="table table-bordered">
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
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        
                                                        $date = isset($_GET['date'])?"&&date=".$_GET['date'] : "";


                                                        $filter = isset($_GET['filter'])?"&&filter=".$_GET['filter'] : "";

                                                        $query = "SELECT * FROM data_kunjungan";

                                                        if(isset($_GET['date'])){
                                                            $get = $_GET['date'];
                                                            $tgl = mysqli_query($conn,"SELECT DATE_FORMAT('$get', '%d %M %Y') AS tanggal");
                                                            foreach($tgl as $tanggal){
                                                                $query = "SELECT * FROM data_kunjungan WHERE time LIKE '%".$tanggal['tanggal']."%'";
                                                            }

                                                        }

                                                        $visit_data = mysqli_query($conn,"$query");

                                                        if(isset($_GET['filter'])){
                                                            if($_GET['filter'] == "timeASC"){
                                                                $visit_data = mysqli_query($conn,"$query ORDER BY time ASC");
                                                            }

                                                            if($_GET['filter'] == "timeDESC"){
                                                                $visit_data = mysqli_query($conn,"$query ORDER BY time DESC");
                                                            }
                                                        }


                                                        $no = 0;

                                                        foreach($visit_data as $visit){
                                                        ?>
                                                            <tr>
                                                                <td><?php echo ++$no; ?></td>
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
                </div>
            </main>

            <script>
                var css = '@page { size: landscape; margins: none;}',
                head = document.head || document.getElementsByTagName('head')[0],
                style = document.createElement('style');

                style.type = 'text/css';
                style.media = 'print';

                if (style.styleSheet){
                style.styleSheet.cssText = css;
                } else {
                style.appendChild(document.createTextNode(css));
                }

                head.appendChild(style);

                window.print();

            </script>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>