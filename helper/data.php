<?php 
    include '../setting.php';
    include '../helper.php';
    if(!empty(getGet('aksi') == 'barang')){
        $query  = "SELECT barang_kategori.nama_kategori, barang.* 
                FROM barang 
                LEFT JOIN barang_kategori ON barang.id_kategori=barang_kategori.id";
        $search = array('nama_kategori','nama_barang','id_barang','merk','satuan_barang','harga_beli','harga_jual','stok');
        $where  = null; 
        if(isset($_GET['stok'])){
            $isWhere = " stok <= 3 ";
        }else{
            $isWhere = null;
        }
        echo get_tables_query($connectdb,$query,$search,$where,$isWhere);
    }

    if(!empty(getGet('aksi') == 'nota-jual')){
        $query = "SELECT users.name, pelanggan.nama_pelanggan, penjualan.* 
                FROM penjualan 
                LEFT JOIN users 
                ON penjualan.id_member = users.id 
                LEFT JOIN pelanggan 
                ON penjualan.id_pelanggan=pelanggan.id";
        $search = array('no_trx','name','nama_pelanggan'); 
        if(isset($_GET['id_pelanggan'])){
            $where  = array('id_pelanggan' => getGet('id_pelanggan')); 
        }else{
            $where  = null; 
        }
        if(isset($_GET['thn'])){
            $periode = $_GET['thn'].'-'.$_GET['bln'];
            $isWhere = " penjualan.periode = '".$periode."' ";
        }elseif(isset($_GET['hari'])){
            $tgla = getGet('tgla');
            $tglb = getGet('tglb');
            $isWhere = " penjualan.tanggal_input BETWEEN '$tgla' AND '$tglb' ";
        }else{
            $isWhere = " penjualan.periode = '".date('Y-m')."' ";
        }
        echo get_tables_query($connectdb,$query,$search,$where,$isWhere);
    }

    if(!empty(getGet('aksi') == 'nota-jual-produk')){
        $query = "SELECT * FROM penjualan_detail";
        $search = array('no_trx','nama_barang');
        $where  = null; 
        if(isset($_GET['thn'])){
            $periode = $_GET['thn'].'-'.$_GET['bln'];
            $isWhere = " penjualan_detail.periode = '".$periode."' ";
        }elseif(isset($_GET['hari'])){
            $tgla = getGet('tgla');
            $tglb = getGet('tglb');
            $isWhere = " penjualan_detail.tgl_input BETWEEN '$tgla' AND '$tglb' ";
        }else{
            $isWhere = " penjualan_detail.periode = '".date('Y-m')."' ";
        }
        echo get_tables_query($connectdb,$query,$search,$where,$isWhere);
    }

    if(!empty(getGet('aksi') == 'nota-beli')){
        $query = "SELECT users.name, pembelian.* 
                FROM pembelian 
                LEFT JOIN users 
                ON pembelian.id_member = users.id";
        $search = array('no_trx','name');
        $where  = null; 
        if(isset($_GET['thn'])){
            $periode = $_GET['thn'].'-'.$_GET['bln'];
            $isWhere = " pembelian.periode = '".$periode."' ";
        }elseif(isset($_GET['hari'])){
            $tgla = getGet('tgla');
            $tglb = getGet('tglb');
            $isWhere = " pembelian.tanggal_input BETWEEN '$tgla' AND '$tglb' ";
        }else{
            $isWhere = " pembelian.periode = '".date('Y-m')."' ";
        }
        echo get_tables_query($connectdb,$query,$search,$where,$isWhere);
    }

    if(!empty(getGet('aksi') == 'nota-beli-produk')){
        $query = "SELECT * FROM pembelian_detail";
        $search = array('no_trx','nama_barang');
        $where  = null; 
        if(isset($_GET['thn'])){
            $periode = $_GET['thn'].'-'.$_GET['bln'];
            $isWhere = " pembelian_detail.periode = '".$periode."' ";
        }elseif(isset($_GET['hari'])){
            $tgla = getGet('tgla');
            $tglb = getGet('tglb');
            $isWhere = " pembelian_detail.tgl_input BETWEEN '$tgla' AND '$tglb' ";
        }else{
            $isWhere = " pembelian_detail.periode = '".date('Y-m')."' ";
        }
        echo get_tables_query($connectdb,$query,$search,$where,$isWhere);
    }

    if(!empty(getGet('aksi') == 'stok')){
        $query = "SELECT barang_kategori.nama_kategori, barang.* 
                FROM barang 
                LEFT JOIN barang_kategori ON barang.id_kategori=barang_kategori.id";
        $search = array('nama_kategori','nama_barang','id_barang');
        $where = null;
        $isWhere = null;
        echo get_tables_query($connectdb,$query,$search,$where,$isWhere);
    }

    if(!empty(getGet('aksi') == 'stok_masuk')){
        $query = "SELECT SUM(qty) AS qty FROM pembelian_detail";
        if(isset($_GET['thn'])){
            $periode = $_GET['thn'].'-'.$_GET['bln'];
            $isWhere = " pembelian_detail.periode = '".$periode."' ";
        }else{
            $isWhere = " pembelian_detail.periode = '".date('Y-m')."' ";
        }

        $sql = $query.' WHERE '.$isWhere.' AND idb = ?';
        $row = $connectdb->prepare($sql);
        $row->execute(array(getPost('id_barang')));
        $qty = $row->fetch();
        $qt = $qty['qty'] ?? 0;
        echo json_encode(['qty' => $qt]);
    }

    if(!empty(getGet('aksi') == 'stok_keluar')){
        $query = "SELECT SUM(qty) AS qty FROM penjualan_detail";
        if(isset($_GET['thn'])){
            $periode = $_GET['thn'].'-'.$_GET['bln'];
            $isWhere = " penjualan_detail.periode = '".$periode."' ";
        }else{
            $isWhere = " penjualan_detail.periode = '".date('Y-m')."' ";
        }

        $sql = $query.' WHERE '.$isWhere.' AND idb = ?';
        $row = $connectdb->prepare($sql);
        $row->execute(array(getPost('id_barang')));
        $qty = $row->fetch();
        $qt = $qty['qty'] ?? 0;
        echo json_encode(['qty' => $qt]);
    }