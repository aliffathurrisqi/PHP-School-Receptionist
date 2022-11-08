<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if(!$_SESSION['username']){
    echo "<script>alert('Anda belum login');</script>";
    echo '<script>location.replace("index.php"); </script>';
}

$title = "Tujuan";
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
                        <h1 class="h3 d-inline align-middle">Data Tujuan</h1>
                    </div>
                    <div class="row">

                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addStaff">Tambah Data Tujuan</button>
                                                <div class="modal fade" id="addStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tujuan</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST">
                                                                <div class="modal-body">
                                                                    <input class="form-control" type="text" name="nama" required placeholder="Masukkan Tujuan">
                                                                    <select class="form-select mt-2" name="id_subject">
                                                                                    <?php
                                                                                    foreach ($subjects as $subject) { ?>
                                                                                        <option value="<?php echo $subject['id'] ?>" <?php if($ids == $subject['id']){?> selected <?php }?>><?php echo $subject['nama'] ?></option>
                                                                                    <?php }
                                                                                    ?>
                                                                                </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button name="btnAddPurpose" type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                if (isset($_POST["btnAddPurpose"])) {
                                                    addPurpose($_POST['nama'],$_POST['id_subject']);
                                                    echo "<script>alert('Data Berhasil Ditambah'); window.location.replace('purpose.php');</script>";
                                                } ?>
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tujuan</th>
                                                            <th>Bertemu</th>
                                                            <th colspan="2" class="text-center w-25">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 0;
                                                        foreach ($purposes as $purpose) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo ++$no; ?></td>
                                                                <td><?php echo $purpose['tujuan']; ?></td>
                                                                <td><?php echo $purpose['nama_subject']; ?></td>
                                                                <td><button class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#edit<?php echo $purpose['id_tujuan'];?>">Edit</button></td>
                                                                <td><button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#del<?php echo $purpose['id_tujuan'];?>">Hapus</button></td>
                                                            </tr>

                                                            <!-- Modal Edit -->
                                                            <div class="modal fade" id="edit<?php echo $purpose['id_tujuan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tujuan</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form method="POST">
                                                                            <div class="modal-body">
                                                                                <input type="hidden" name="id" value="<?php echo $purpose['id_tujuan']; ?>">
                                                                                <input class="form-control" type="text" name="nama" value="<?php echo $purpose['tujuan']; ?>">
                                                                                <select class="form-select mt-2" name="id_subject">
                                                                                    <?php
                                                                                    $key = $purpose['tujuan'];
                                                                                    $checks = mysqli_query($conn, "SELECT * FROM data_tujuan WHERE tujuan = '$key'");
                                                                                    foreach ($checks as $check){
                                                                                        $ids = $check['id_subject'];
                                                                                    }
                                                                                    foreach ($subjects as $subject) { ?>
                                                                                        <option value="<?php echo $subject['id'] ?>" <?php if($ids == $subject['id']){?> selected <?php }?>><?php echo $subject['nama'] ?></option>
                                                                                    <?php }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button name="update<?php echo $purpose['id_tujuan']; ?>" type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal Delete -->
                                                            <div class="modal fade" id="del<?php echo $purpose['id_tujuan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Tujuan</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form method="POST">
                                                                            <div class="modal-body">
                                                                                <input type="hidden" name="id" value="<?php echo $purpose['id_tujuan']; ?>">
                                                                                Yakin ingin menghapus <strong><?php echo $purpose['tujuan']; ?></strong> ?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button name="btnDelete<?php echo $purpose['id_tujuan']; ?>" type="submit" class="btn btn-success">Yakin</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php
                                                            if (isset($_POST["update" . $purpose['id_tujuan']])) {
                                                                editPurpose($_POST['id'], $_POST['nama'], $_POST['id_subject']);
                                                                echo "<script>alert('Data Berhasil Diubah'); window.location.replace('purpose.php');</script>";
                                                            }

                                                            if (isset($_POST["btnDelete" . $purpose['id_tujuan']])) {
                                                                deletePurpose($_POST['id']);
                                                                echo "<script>alert('Data Berhasil Dihapus'); window.location.replace('purpose.php');</script>";
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
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