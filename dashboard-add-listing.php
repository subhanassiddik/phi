<?php  
require "connect/config.php"; 

session_start();

if (!isset($_SESSION["loging"])) {
	header("Location:index.php");
	exit;
}

?>

<?php require_once "header.php" ?>

<!-- Dashboard -->
<div id="dashboard">

<?php require_once "navigation.php" ?>


	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Add Listing</h2>
					
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Add Listing</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">

					<form action="" method="post">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Nomor Serial </h5>
								<input class="search-field" type="text" value="" name="nomorserial" />
							</div>
						
							<div class="col-md-6">
								<h5>Nama Alat </i></h5>
								<input class="search-field" type="text" value="" name="namaalat" />
							</div>
						</div>

						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Tipe Alat</h5>
								<select class="chosen-select-no-single" name="tipebarang">
									<option label="blank" >Select Category</option>	
									<option value="Eat & Drink">Eat & Drink</option>
									<option value="Shops">Shops</option>
									<option value="Hotels">Hotels</option>
									<option value="Restaurants">Restaurants</option>
									<option value="Fitness">Fitness</option>
									<option value="Events">Events</option>
								</select>
							</div>
							<div class="col-md-6">
								<h5>Tgl Pembelian <i class="fa fa-calendar" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" type="date" value="" name="tglpembelian" />
							</div>
						</div>
						
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Tgl Sampai di gudang <i class="fa fa-calendar" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" type="date" value="" name="sampaidigudang" />
							</div>
							<div class="col-md-6">
								<h5>Tgl Keluar <i class="fa fa-calendar" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" type="date" value="" name="tglkeluar" />
							</div>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Masa Pakai</h5>
								<input class="search-field" type="number" value="" name="masapakai" />
							</div>
						</div>
						</div>

						<!-- Row -->
						

					<button href="pages-elements2.php" class="button preview" type="submit" name="submit">Input<i class="fa fa-arrow-circle-right" ></i></button>

				</div>
			</div>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
			</div>

		</form>

		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->

<?php require_once "footer.php" ?>

<?php  
	
	if (isset($_POST['submit'])){
		
		$noserial =$_POST['nomorserial'];
		$namaalat =$_POST['namaalat'];
		$tipebarang =$_POST['tipebarang'];
		$tglpembelian = $_POST['tglpembelian'];
		$sampaidigudang = $_POST['sampaidigudang'];
		$tglkeluar = $_POST['tglkeluar'];
		$masapakai = $_POST['masapakai'];


		//tgl peremajaan
		$date = date_create($tglkeluar);
		date_modify($date, '+'.$masapakai.'months');
		$masaperemajaan=date_format($date, 'Y-m-d');


		$result = mysqli_query($mysqli,"INSERT INTO inventory_barang 

		(nomorserial,namaalat,tipebarang,tglpembelian,sampaidigudang,tglkeluar,masapakai,masaperemajaan) 

		values 

		('$noserial','$namaalat','$tipebarang','$tglpembelian','$sampaidigudang','$tglkeluar','$masapakai','$masaperemajaan')");

		if (mysqli_affected_rows($mysqli) > 0) {
			echo "<script>alert('berhasil di tambah!')</script>";
		}else {
			echo "<script>alert('gagal di tambah!')</script>";
		}

	}

?>


