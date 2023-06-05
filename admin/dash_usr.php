<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</head>
<body>

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang, <?php echo $_SESSION['username']; ?> <br><br>Dashboard</h1>
			<div class="d-none d-sm-inline-block">
				<?php
					$tanggal= mktime(date("m"),date("d"),date("Y"));
					echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
					date_default_timezone_set('Asia/Jakarta');
					$jam=date("H:i:s");
					echo "| Pukul : <b>". $jam." "."</b>";
					$a = date ("H");
					if (($a>=6) && ($a<=11)){
					echo ",<b> Selamat pagi! </b>";
					}
					else if(($a>11) && ($a<=15))
					{
					echo ", Selamat siang!";}
					else if (($a>15) && ($a<=18)){
					echo ",<b> Selamat sore! </b>";}
					else { echo ", <b> Selamat malam! </b>";}
				?>
		</div>
    </div>

    <!-- Content Row -->
    <div class="row">

         <!-- Data (Barang) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-gray-800 text-uppercase mb-1">
                                Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-600">
                                <?php
                                    include_once "../config/koneksi.php";
                                    $sql = "SELECT tb_gudang.*,tb_supplier.supplier,tb_brand.kdbrand,tb_brand.brand FROM tb_gudang,tb_supplier,tb_brand WHERE tb_gudang.kdsup = tb_supplier.kdsup AND tb_gudang.kdbrand = tb_brand.kdbrand";
                                    $query = mysqli_query($conn,$sql);
                                    echo mysqli_num_rows($query);
                                ?>
                             </div>
                            <div>
                                <a href="?page=baranggud">view details</a>
                                <i class="fas fa-xs fa-arrow-circle-right"></i>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-archive fa-3x text-gray-800 modal-footer"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>