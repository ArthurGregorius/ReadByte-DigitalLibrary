<?php
//Mulai Sesion
session_start();
include "inc/koneksi.php";
if (isset($_SESSION["ses_username"]) == "") {
	header("location: index.php");
} else {	
	$data_id_anggota = $_SESSION["ses_id_anggota"];
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}
if (isset($_GET['edit'])){
	if ($_GET['edit'] == "edited"){
		$data_nama = $_SESSION["ses_nama"];
	}

$ambiluser = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE id_anggota = '$data_id_anggota'");
$userinfo = mysqli_fetch_array($ambiluser);
if ($userinfo['profile_image'] == "" || $userinfo['profile_image'] == NULL ){
	$profil = "https://via.placeholder.com/150";
} else {
	$profil = "images/profiles/".$userinfo['profile_image'];
}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pengguna | ReadByte</title>
	<link rel="icon" href="dist/img/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skin-blue.min.css">
	<!-- css for the book cards -->
	<link rel="stylesheet" href="dist/css/catalogue_style.css">

	<link rel="stylesheet" href="dist/css/custom/userdashboard.css">

	<link rel="stylesheet" href="dist/css/custom/popup.css">

	<link rel="stylesheet" href="dist/css/custom/profil.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="index.php" class="logo">
				<span class="logo-lg">
					<img src="dist/img/logo.png" width="37px">
					<b>ReadByte</b>
				</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<li class="dropdown messages-menu">
							<a class="dropdown-toggle">
								<span>
									<b>
										Perpustakaan Digital ReadByte v1.0.0
									</b>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				</b>
				<div class="user-panel">
					<div class="pull-left image">
						<img src="dist/img/avatar.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?php echo $data_nama; ?>
						</p>
						<span class="label label-warning">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>
				</br>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
						<li class="treeview">
							<a href="?page=profil">
								<i class="glyphicon glyphicon-user"></i>
								<span>Profil User</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="?page=katalog">
								<i class="glyphicon glyphicon-book"></i>
								<span>Katalog Buku</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>

                        <li class="treeview">
							<a href="?page=reservasiuser">
								<i class="glyphicon glyphicon-list-alt"></i>
								<span>Daftar Reservasi</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<!-- <li class="treeview">
							<a href="#">
								<i class="glyphicon glyphicon-menu-hamburger"></i>
								<span>Daftar Reservasi</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">

								<li>
									<a href="?page=signin">
										<i class="glyphicon glyphicon-user"></i>Sign-in</a>
								</li>
								<li>
									<a href="?page=login">
										<i class="glyphicon glyphicon-log-in"></i>Log-in</a>
								</li>
							</ul>
						</li> -->
                        <!-- <li class="treeview">
							<a href="?page=#">
								<i class="glyphicon glyphicon-user"></i>
								<span>Akun Anda</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li> -->
                        <li class="treeview">
							<a href="logout.php">
								<i class="glyphicon glyphicon-log-out"></i>
								<span>Logout</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>

			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<?php
				if (isset($_GET['page'])) {
					$hal = $_GET['page'];
                    
					switch ($hal) {
							//Klik Halaman Home Pengguna
						case 'admin':
							include "home/admin.php";
							break;
						case 'petugas':
							include "home/petugas.php";
							break;

                        case 'katalog':
                            include "pengguna/kataloguser.php";
                            break;
                        
                        case 'reservasiuser':
                            include "pengguna/reservasi/data_reservasi.php";
                            break;
							
						case 'reservasiuser/perpanjang':
							include "pengguna/perpanjang.php";
							break;
                        
						case 'profil':
							include "pengguna/profil/profil.php";
							break;

						case 'profiledit':
							include "pengguna/profil/profiledit.php";
							break;

                        case 'logout':
                            session_destroy();
                            header("location: logout.php");
                            break;

						case 'reservasiuser/delete_reservasi':
							include "pengguna/reservasi/delete_reservasi.php";
							break;

                        case 'login':
                            header("location: login.php");
                            break;
                        case 'signin':
                            header("location: daftar.php");
                            break;

							//Pengguna
						case 'MyApp/data_pengguna':
							include "admin/pengguna/data_pengguna.php";
							break;
						case 'MyApp/add_pengguna':
							include "admin/pengguna/add_pengguna.php";
							break;
						case 'MyApp/edit_pengguna':
							include "admin/pengguna/edit_pengguna.php";
							break;
						case 'MyApp/del_pengguna':
							include "admin/pengguna/del_pengguna.php";
							break;
                        case 'dashboard':
                            include "home/indexkatalog.php";
                            break;

							//agt
						case 'MyApp/data_agt':
							include "admin/agt/data_agt.php";
							break;
						case 'MyApp/add_agt':
							include "admin/agt/add_agt.php";
							break;
						case 'MyApp/edit_agt':
							include "admin/agt/edit_agt.php";
							break;
						case 'MyApp/del_agt':
							include "admin/agt/del_agt.php";
							break;
						case 'MyApp/print_agt':
							include "admin/agt/print_agt.php";
							break;
						case 'MyApp/print_allagt':
							include "admin/agt/print_allagt.php";
							break;

							//buku
						case 'MyApp/data_buku':
							include "admin/buku/data_buku.php";
							break;
						case 'MyApp/add_buku':
							include "admin/buku/add_buku.php";
							break;
						case 'MyApp/edit_buku':
							include "admin/buku/edit_buku.php";
							break;
						case 'MyApp/del_buku':
							include "admin/buku/del_buku.php";
							break;

							//sirkul
						case 'data_sirkul':
							include "admin/sirkul/data_sirkul.php";
							break;
						case 'add_sirkul':
							include "admin/sirkul/add_sirkul.php";
							break;
						case 'panjang':
							include "admin/sirkul/panjang.php";
							break;
						case 'kembali':
							include "admin/sirkul/kembali.php";
							break;

							//log
						case 'log_pinjam':
							include "admin/log/log_pinjam.php";
							break;
						case 'log_kembali':
							include "admin/log/log_kembali.php";
							break;

							//laporan
						case 'laporan_sirkulasi':
							include "admin/laporan/laporan_sirkulasi.php";
							break;
						case 'MyApp/print_laporan':
							include "admin/laporan/print_laporan.php";
							break;

							//default
						default:
							echo "<center><br><br><br><br><br><br><br><br><br><h1> Halaman tidak ditemukan !</h1></center>";
							break;
					}
				}else{
                    if ($data_level == "Administrator") {
						include "home/admin.php";
					} elseif ($data_level == "Pengguna") {
						include "pengguna/kataloguser.php";
					}
                }
				?>



			</section>
			<!-- /.content -->
		</div>

		<!-- /.content-wrapper 

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			</div>
			<strong>Copyright &copy;
				<a href="https://www.facebook.com/">Muhammad Ivan Setiawan</a>.</strong> All rights reserved.
		</footer>
		<div class="control-sidebar-bg"></div>
		-->

		<!-- ./wrapper -->

		<!-- jQuery 2.2.3 -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
			 
		<!--Bootstrap 3.3.6 -->
			
		<script src = "bootstrap/js/bootstrap.min.js"></script>
		

		<script src="plugins/select2/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		<!-- page script -->


		<script>
			$(function() {
				$("#example1").DataTable({
					columnDefs: [{
						"defaultContent": "-",
						"targets": "_all"
					}]
				});
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
		</script>

		<script>
			$(function() {
				//Initialize Select2 Elements
				$(".select2").select2();
			});
		// Ensure DOM is fully loaded before attaching event listener
		document.addEventListener('DOMContentLoaded', function() {
			function previewImage(event) {
				var reader = new FileReader();
				console.log(reader);
				reader.onload = function() {
					var output = document.getElementById('profileImage');
					output.src = reader.result;
				};
				reader.readAsDataURL(event.target.files[0]);
				}

			// Attach the previewImage function to the input onchange event
			document.getElementById('fileInput').addEventListener('change', previewImage);
		});
		</script>
</body>

</html>