<?php 
    include('config.php');
    session_start();

    $id            = $_SESSION['sub_id'].'-'.$_POST['id_buku'];
    $kategori      = $_POST['kategori'];
    $isbn          = $_POST['isbn'];
    $judul         = $_POST['judul'];
    $pengarang     = $_POST['pengarang'];
    $penerbit      = $_POST['penerbit'];
    $th_terbit     = $_POST['th_terbit'];
    $tempat_terbit = $_POST['tmpt_terbit'];
    $deskripsi     = $_POST['deskripsi'];
    $lokasi_buku   = $_POST['lokasi_buku'];
    $jml_buku      = $_POST['jml'];
    $tgl_input     = $_POST['tgl_input'];

    $jenis	  = array('png','jpg','jpeg');
    $gambar   = $_FILES['file']['name'];
    $x        = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran	  = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if(!empty($gambar)) {
        if(in_array($ekstensi, $jenis) === true) {
            if($ukuran < 1044070) {
                $gambar_baru = $id.'.'.$ekstensi;
                move_uploaded_file($file_tmp, '../assets/image/upload/buku/'.$gambar_baru);
                $query = mysqli_query($conn, "INSERT INTO buku VALUES('$id', '$kategori', '$isbn', '$judul', '$pengarang', '$penerbit', 
                    '$th_terbit', '$tempat_terbit', '$deskripsi', '$gambar_baru', '$lokasi_buku', '$jml_buku', '$tgl_input')");
    
                if($query) {
                    $_SESSION['msgSuccess'] = "Buku has been saved!";
                    header("Location: ../page/buku.php");
                    exit();
                } else {
                    $_SESSION['msgFail'] = "Buku failed to save!";
                    header("Location: ../page/add-buku.php");
                    exit();
                }
            } else {
                $_SESSION['msgFail'] = "Image to big!";
                header("Location: ../page/add-buku.php");
                exit();
            }
        } else {
            $_SESSION['msgFail'] = "Failed image not supported!";
            header("Location: ../page/add-buku.php");
            exit();
        }
    } else {
        $gambar = "default.jpg";
        $query  = mysqli_query($conn, "INSERT INTO buku VALUES('$id', '$kategori', '$isbn', '$judul', '$pengarang', '$penerbit', 
        '$th_terbit', '$tempat_terbit', '$deskripsi', '$gambar', '$lokasi_buku', '$jml_buku', '$tgl_input')");

        if($query) {
            $_SESSION['msgSuccess'] = "Buku has been saved!";
            header("Location: ../page/buku.php");
            exit();
        } else {
            $_SESSION['msgFail'] = "Buku failed to save!";
            header("Location: ../page/add-buku.php");
            exit();
        }
    }
    
?>