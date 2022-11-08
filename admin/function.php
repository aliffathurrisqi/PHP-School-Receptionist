<?php
//fungsi
function addVisit($nama, $alamat, $telp, $instansi, $tujuan, $subjek, $keterangan)
{
    include("env.php");
    mysqli_query($conn, "INSERT INTO kunjungan VALUES(NULL,'$nama','$alamat','$telp','$instansi','$tujuan','$subjek','$keterangan', NOW())");
}

if (isset($_POST["btnNewVisit"])) {
    addVisit($_POST['nama'], $_POST['alamat'], $_POST['telp'], $_POST['instansi'], $_POST['tujuan'], $_POST['subjek'], $_POST['keterangan']);
    echo "<script>alert('Data Berhasil Ditambah');</script>";
}

if (isset($_POST["btnNewVisitUser"])) {
    addVisit($_POST['nama'], $_POST['alamat'], $_POST['telp'], $_POST['instansi'], $_POST['tujuan'], $_POST['subjek'], $_POST['keterangan']);
    echo "<script>alert('Anda telah berhasil mengisi data kunjungan'); window.location.replace('comment.php?user=" . $_POST['nama'] . "&&rating=1');</script>";
}

function addSubject($nama)
{
    include("env.php");
    mysqli_query($conn, "INSERT INTO subject VALUES (NULL,'$nama')");
}

function editSubject($id, $nama)
{
    include("env.php");
    mysqli_query($conn, "UPDATE subject SET nama = '$nama' WHERE id = '$id'");
}

function deleteSubject($id)
{
    include("env.php");
    mysqli_query($conn, "DELETE FROM subject WHERE id = '$id'");
}

function addPurpose($nama,$id_subject)
{
    include("env.php");
    mysqli_query($conn, "INSERT INTO tujuan VALUES (NULL,'$nama','$id_subject')");
}

function editPurpose($id, $nama, $id_subject)
{
    include("env.php");
    mysqli_query($conn, "UPDATE tujuan SET tujuan = '$nama', id_subject = '$id_subject' WHERE id = '$id'");
}

function deletePurpose($id)
{
    include("env.php");
    mysqli_query($conn, "DELETE FROM tujuan WHERE id = '$id'");
}

function addComment($nama, $rating, $komentar)
{
    include("env.php");
    mysqli_query($conn, "INSERT INTO komentar VALUES(NULL,'$nama','$komentar','$rating', NOW())");
}

if (isset($_POST["btnNewComment"])) {
    addComment($_POST['user'], $_POST['rating'], $_POST['komentar']);
    echo "<script>alert('Terima kasih telah memberi penilaian'); window.location.replace('index.php');</script>";
}