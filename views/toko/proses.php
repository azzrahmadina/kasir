
<?php

    if(!empty(getGet("aksi") == "update")) {
        // set_time_limit(0);
		$allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
		if($_FILES['logo']["size"] > 0) {
            if ($_FILES['logo']["error"] > 0) {
                set_flashdata("Gagal","You can only upload JPG, PNG and GIF file","danger");
                redirect("index.php");

            } elseif (!in_array($_FILES['logo']["type"], $allowedImageType)) {
                set_flashdata("Gagal","You can only upload JPG, PNG and GIF file","danger");
                redirect("index.php");

            }elseif (round($_FILES['logo']["size"] / 1024) > 4096) {
                set_flashdata("Gagal","Besar Gambar Tidak Boleh Lebih Dari 4 MB","danger");
                redirect("index.php");

            }else{
                
                $target_path = './assets/uploads/toko/';
                $temp = explode(".", $_FILES["logo"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                $target_path = $target_path . basename($newfilename); 
                
                if(move_uploaded_file($_FILES['logo']['tmp_name'], $target_path)){
                    //post foto lama
                    $foto = $_POST['foto'];
                    //remove foto di direktori
                    if(file_exists('./assets/uploads/toko/'.$foto.'')){
                        unlink('./assets/uploads/toko/'.$foto.'');
                    }

                    $id =  1;
                    $data[] =  getPost("nama_toko", TRUE);
                    $data[] =  getPost("alamat_toko", TRUE);
                    $data[] =  getPost("tlp", TRUE);
                    $data[] =  getPost("nama_pemilik", TRUE);
                    $data[] = $newfilename;
                    $data[] = $id;
                    $sql = "UPDATE toko SET nama_toko = ?, alamat_toko = ?, tlp = ?, nama_pemilik = ?, logo = ? WHERE id = ? ";
                    $row = $connectdb->prepare($sql);
                    $row->execute($data);
                }else{
                    set_flashdata("Gagal","edit telah gagal upload !","danger");
                    redirect("index.php");
                }
            }
        }else{
            $id =  1;
            $data[] =  getPost("nama_toko", TRUE);
            $data[] =  getPost("alamat_toko", TRUE);
            $data[] =  getPost("tlp", TRUE);
            $data[] =  getPost("nama_pemilik", TRUE);
            $data[] = $id;
            $sql = "UPDATE toko SET nama_toko = ?, alamat_toko = ?, tlp = ?, nama_pemilik = ? WHERE id = ? ";
            $row = $connectdb->prepare($sql);
            $row->execute($data);
        }

        set_flashdata("Berhasil","edit telah sukses !","success");
        redirect("index.php");
    }
