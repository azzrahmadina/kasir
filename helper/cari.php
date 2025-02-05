<?php session_start();?>
<div class="table-responsive">
    <table class="table table-striped table-sm table-bordered w-100" id="example4">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Barang</th>
                <th>Image</th>
                <th>Kategori</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include '../setting.php';
                include '../helper.php';
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
                if(!empty(getPost('keyword', TRUE))){
                $cari = '%'.getPost('keyword', TRUE).'%';   
                $no =1;
                $sql = "SELECT barang_kategori.nama_kategori, barang.* 
                        FROM barang 
                        LEFT JOIN barang_kategori 
                        ON barang.id_kategori=barang_kategori.id 
                        WHERE id_barang LIKE '$cari' OR nama_barang LIKE '$cari' 
                        ORDER BY barang.nama_barang ASC";
                $row = $connectdb->prepare($sql);
                $row->execute();
                $hasil = $row->fetchAll(PDO::FETCH_OBJ);
                foreach($hasil as $r){
            ?>
                <tr>
                    <td><?= $no;?></td>
                    <td><?=$r->id_barang;?></td>  
                    <td>
                        <a href="<?= url_images($baseURL.'../','barang',$r->gambar);?>" data-toggle="lightbox" 
                            data-title="<?=$r->nama_barang;?>" data-gallery="gallery">
                            <img src="<?= url_images($baseURL.'../','barang/',$r->gambar);?>" 
                            alt="<?=$r->nama_barang;?>" class="img-fluid" width="80"/>
                        </a>
                    </td>    
                    <td><?=$r->nama_kategori;?></td>      
                    <td><?=$r->nama_barang;?></td>      
                    <?php if(isset($_GET['sortir'])){?>
                        <td>Rp<?=number_format($r->harga_beli);?>,-</td> 
                    <?php }else{?>
                        <td>Rp<?=number_format($r->harga_jual);?>,-</td> 
                    <?php }?>     
                    <td><?=$r->satuan_barang;?></td>      
                    <td><?=$r->stok;?></td>  
                    <td>
                        <a href="proses.php?aksi=carikeranjang&id=<?=$r->id;?>&qty=1" 
                            class="btn btn-success btn-sm" title="Tambahkan ke keranjang">
                            <i class="fa fa-shopping-cart mr-1"></i> Tambahkan
                        </a> 
                    </td>
                </tr>
            <?php $no++; }}else{?>
                <tr>
                    <td colspan="9"></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>