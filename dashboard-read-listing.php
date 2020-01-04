<?php 

include 'connect/config.php';

session_start();

if (!isset($_SESSION["loging"])) {
	header("Location:index.php");
	exit;
}

$result = mysqli_query($mysqli, "SELECT * FROM inventory_barang ORDER BY id DESC");

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
					<h2>Inventory Barang</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Inventory Barang</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

	<div class="row">
		
		<div class="col-sm-12">


	<table id="tabel-data" class="basic-table" width="100%" cellspacing="0">
    <thead>
		<tr>	
			<th>no</th>
			<th>Nomor Serial</th>
			<th>Nama Alat</th>
			<th>Tipe Barang</th>
			<th>Tgl Pembelian</th>
			<th>Sampai di Gudang</th>
			<th>Tgl Keluar</th>
			<th>Masa Pakai</th>
			<th>Tgl Peremajaan</th>
			<th>Action</th>
		</tr>
    </thead>
    
    <tbody>

	<?php
		$a=1;

		while ($user_data = mysqli_fetch_array($result)) : ?> 

		 	<tr>
			 	<td><?= $a++ ?></td>
			 	<td><?= $user_data['nomorserial'] ?></td>
			 	<td><?= $user_data['namaalat'] ?></td>
			 	<td><?= $user_data['tipebarang'] ?></td>
			 	<td><?= $user_data['tglpembelian'] ?></td>
			 	<td><?= $user_data['sampaidigudang'] ?></td>
			 	<td><?= $user_data['tglkeluar'] ?></td>
			 	<td><?= $user_data['masapakai'] ?></td>
			 	<td><?= $user_data['masaperemajaan'] ?></td>
			 	

			 	<td >
			 		<a href="dashboard-change-listing.php?id= <?= $user_data['id']; ?>" style="margin-left: 15px;"><i class="sl sl-icon-note"></i></a> 
			 		<a href="dashboard-delete-listing.php?id= <?= $user_data['id']; ?>" style="margin-left: 5px;"><i class="sl sl-icon-trash"></i></a> 
			 	</td>
		 	</tr>
		  
		<?php endwhile; ?>
    
    </tbody>
</table>
		</div>
	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->

<?php require_once "footer.php" ?>