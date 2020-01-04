<?php  

require "connect/config.php"; 

session_start();

if (!isset($_SESSION["loging"])) {
	header("Location:index.php");
	exit;
}


$id=$_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM inventory_barang WHERE id=$id");

while ($user_data = mysqli_fetch_assoc($result)) {
		
		$noserial =$user_data['nomorserial'];
		$namaalat =$user_data['namaalat'];
		$tipebarang =$user_data['tipebarang'];
		$tglpembelian = $user_data['tglpembelian'];
		$sampaidigudang =$user_data['sampaidigudang'];
		$tglkeluar =$user_data['tglkeluar'];
		$masapakai =$user_data['masapakai'];
		
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
					<h2>Edit Listing</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Edit Listing</li>
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
						<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Nomor Serial </h5>
								<input class="search-field" type="text" value="<?= $noserial ?>" name="nomorserial" />
							</div>
						
							<div class="col-md-6">
								<h5>Nama Alat </i></h5>
								<input class="search-field" type="text" value="<?= $namaalat ?>" name="namaalat" />
							</div>
						</div>

						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Tipe Alat</h5>
								<select class="chosen-select-no-single" name="tipebarang" value="<?= $tipebarang ?>>
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
								<input class="search-field" type="date" value="<?=$tglpembelian ?>" name="tglpembelian" />
							</div>
						</div>
						
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Tgl Sampai di gudang <i class="fa fa-calendar" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" type="date" value="<?= $sampaidigudang ?>" name="sampaidigudang" />
							</div>
							<div class="col-md-6">
								<h5>Tgl Keluar <i class="fa fa-calendar" data-tip-content="Name of your business" ></i></h5>
								<input class="search-field" type="date" value="<?= $tglkeluar ?>" name="tglkeluar" />
							</div>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Masa Pakai</h5>
								<input class="search-field" type="number" value="<?= $masapakai ?>" name="masapakai" />
							</div>
						</div>
						</div>

						<!-- Row -->
						

					<button class="button preview" type="submit" name="submit">Simpan<i class="fa fa-arrow-circle-right" ></i></button>

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
	
	if (isset($_POST['submit'])) 
	{
		
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

		$result = mysqli_query($mysqli,"UPDATE inventory_barang SET nomorserial='$noserial',namaalat='$namaalat',tipebarang='$tipebarang',tglpembelian='$tglpembelian',sampaidigudang='$sampaidigudang',tglkeluar='$tglkeluar',masapakai='$masapakai',masaperemajaan='$masaperemajaan' WHERE id=$id");

		if (mysqli_affected_rows($mysqli) > 0) {
			echo "<script>alert('berhasil di ubah!')</script>";
		}else {
			echo "<script>alert('gagal di ubah!')</script>";
		}
	}

?>

