<?php
    if(!empty(getGet("aksi") == "del")) {
        
        $id =  $_GET["no"]; // should be integer (id)
        $sql = "DELETE FROM pembelian WHERE no_trx = ?";
        $row = $connectdb->prepare($sql);
        $row->execute(array($id));
        $cek = $row->rowCount();
        if($cek > 0)
        {
            $sql_delete = "DELETE FROM pembelian WHERE no_trx = ?";
            $row_delete = $connectdb->prepare($sql_delete);
            $row_delete->execute(array($id));

            $sql_delete1= "DELETE FROM pembelian_detail WHERE no_trx = ?";
            $row_delete1 = $connectdb->prepare($sql_delete1);
            $row_delete1->execute(array($id));

            set_flashdata("Berhasil","delete data telah sukses !","success");
            redirect("index.php");
        }else{
            set_flashdata("Gagal","delete data telah gagal !","danger");
            redirect("index.php");
        }
    
    }

    