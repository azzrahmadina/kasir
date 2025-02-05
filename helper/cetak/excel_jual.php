<?php
    session_start();
    include '../../setting.php';
    include '../../helper.php';
    if(!empty($_SESSION['codekop_session'])){ 
        $uid =  (int)$_SESSION['codekop_session']['id'];
        $sql_users = "SELECT * FROM users WHERE id = ?";
        $row_users = $connectdb->prepare($sql_users);
        $row_users->execute(array($uid));
        $users = $row_users->fetch(PDO::FETCH_OBJ);
    }
    else{ 
        redirect($baseURL.'login.php'); 
    }

    if(isset($_GET['excel'])){
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=data-laporan-penjualan-produk-".date('Y-m-d').".xls");  //File name extension was wrong
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false); 
    }else{
        echo '<script>window.print()</script>';
    }

    $sql_toko =  "SELECT * FROM toko WHERE id = 1";
    $row_toko = $connectdb->prepare($sql_toko);
    $row_toko->execute();
    $toko = $row_toko->fetch(PDO::FETCH_OBJ);
    $bulan_tes =array(
        '01'=>"Januari",
        '02'=>"Februari",
        '03'=>"Maret",
        '04'=>"April",
        '05'=>"Mei",
        '06'=>"Juni",
        '07'=>"Juli",
        '08'=>"Agustus",
        '09'=>"September",
        '10'=>"Oktober",
        '11'=>"November",
        '12'=>"Desember"
    );
?>
<!DOCTYPE html>
<html lang="id" moznomarginboxes mozdisallowselectionprint>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Software Penjualan">
    <meta name="author" content="Fauzan Falah">

    <title>Cetak Nota</title>
    <?php if(isset($_GET['excel'])){ }else{?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <?php }?>
    <style>
        * {
            font-size: 12pt;
            font-family: 'Arial';
        }
        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }
        td.description,
        th.description {
            text-align: left;
            width: 275px;
            max-width: 200px;
        }
        td.no,
        th.no {
            width: 40px;
            max-width: 40px;
            text-align: center;
            word-break: break-all;
        }
        td.quantity,
        th.quantity {
            width: 50px;
            max-width: 50px;
            text-align: center;
            word-break: break-all;
        }
        td.price,
        th.price {
            width: 150px;
            max-width: 150px;
            word-break: break-all;
        }
        .centered {
            text-align: center;
            align-content: center;
        }
        .ticket {
            max-width: 400px;
        }
        img {
            max-width: inherit;
            width: inherit;
        }
        @media print {
            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>
<body class="hold-transition sidebar-collapse" style="-webkit-print-color-adjust: exact !important;" onload="window.print()"><div class="wrapper">
    <section class="content">
        <div class="container">
            <div id="laporan">
                <div class="mt-4">
                    <?php if(empty($_GET['excel'])){?>
                    <h4 class="text-center font-weight-bold">
                        <?= $toko->nama_toko;?>
                    </h4>
                    <p class="text-center"><?= $toko->alamat_toko;?> <br><?= $toko->tlp;?></p>
                    <?php }?>
                    <h5 class="font-weight-bold">
                        <?php if(!empty($_GET['cari'])){ ?>
                            Data Laporan Penjualan Barang <?= $bulan_tes[$_GET['bln']];?> <?= $_GET['thn'];?>
                        <?php }elseif(!empty($_GET['hari'])){?>
                            Data Laporan Penjualan Barang <?= $_GET['tgla'];?> s.d. <?= $_GET['tglb'];?>
                        <?php }else{?>
                            Data Laporan Penjualan Barang <?= $bulan_tes[date('m')];?> <?= date('Y');?>
                        <?php }?>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" width="100%" cellpadding="3" cellspacing="4" id="example1">
                            <thead>
                                <tr bgcolor="yellow">
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                    <th>Beli</th>
                                    <th>Jual</th>
                                    <th>Laba</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no =1;
                                    if(!empty($_GET['cari'])){
                                        $periode = $_GET['thn'].'-'.$_GET['bln'];
                                        $sql = "SELECT * FROM penjualan_detail WHERE periode = ? ORDER BY id DESC";
                                        $row = $connectdb->prepare($sql);
                                        $row->execute(array($periode));
                                        $hasil = $row->fetchAll(PDO::FETCH_OBJ);
                                    }elseif(!empty($_GET['hari'])){
                                        $tgla = getGet('tgla');
                                        $tglb = getGet('tglb');
                                        $sql = "SELECT * FROM penjualan_detail WHERE tgl_input BETWEEN '$tgla' and '$tglb'  ORDER BY id DESC";
                                        $row = $connectdb->prepare($sql);
                                        $row->execute();
                                        $hasil = $row->fetchAll(PDO::FETCH_OBJ);
                                    }else{
                                        $sql = "SELECT * FROM penjualan_detail WHERE periode = ? ORDER BY id DESC";
                                        $row = $connectdb->prepare($sql);
                                        $row->execute(array(date('Y-m')));
                                        $hasil = $row->fetchAll(PDO::FETCH_OBJ);
                                    }
                                    $qty = 0;
                                    $beli = 0;
                                    $total = 0;
                                    foreach($hasil as $r){
                                ?>
                                <tr>
                                    <td><?= $no;?></td>    
                                    <td><?=$r->idb;?></td> 
                                    <td><?=$r->nama_barang;?></td>      
                                    <td><?=$r->qty;?></td>      
                                    <td><?=$r->beli * $r->qty;?></td>       
                                    <td><?=$r->total * $r->qty;?></td>               
                                    <td><?=($r->total * $r->qty)-($r->beli * $r->qty);?></td>        
                                    <td><?=$r->created_at;?></td>    
                                </tr>
                                <?php $no++; $qty += $r->qty; $beli += $r->beli * $r->qty; $total += $r->total; }?>
                                <tr>
                                    <th colspan="3">Total Terjual</td>
                                    <th><?= $qty;?></td>
                                    <th>Rp<?= number_format($beli);?>,-</th>
                                    <th>Rp<?= number_format($total);?>,-</th>
                                    <th>Rp<?= number_format($total-$beli);?>,-</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>