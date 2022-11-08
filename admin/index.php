<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$title = "Admin Login";
include("env.php");
include("function.php");
include("views/partials/head.php");
?>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">


						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img/logos/logo-smkn-1-godean.png" class="img-fluid" width="132" height="132" />
									</div>
									<form method="POST">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Masukkan username" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Masukkan password" />

										</div>
										<div>
											
										</div>
										<div class="text-center mt-3">
											<button class="btn btn-lg btn-primary w-100" name="btnLogin">Login</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>

<?php
if (isset($_POST["btnLogin"])) {
    $userlog = $_POST["username"];
    $passwordlog = $_POST["password"];

    $login = mysqli_query($conn, "SELECT * FROM users WHERE username = '$userlog'");
    $row = mysqli_num_rows($login);
    $data = mysqli_fetch_array($login);
    if ($row > 0) {
        if ($data['password'] == md5($passwordlog)) {
                $_SESSION['username'] = $userlog;
                echo '<script> location.replace("dashboard.php"); </script>';
        } else {
            echo '<script> alert("Username dan password tidak cocok"); </script>';
        }
    } else {
        echo '<script> alert("Username tidak ditemukan"); </script>';
        echo '<script> location.replace("index.php"); </script>';
    }
}
?>