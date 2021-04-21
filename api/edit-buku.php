<?php 
    include('config.php');
    session_start();

    $id            = $_POST['id_buku'];
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
    $gambar_lama = $_POST['old_file'];

    
    if($ukuran < 1044070) {
        if(empty($gambar)) { 

            $query = mysqli_query($conn, "UPDATE buku SET id_buku='$id', id_kategori='$kategori', isbn='$isbn', judul='$judul', pengarang='$pengarang',
                penerbit='$penerbit', th_terbit='$th_terbit', tempat_terbit='$tempat_terbit', deskripsi='$deskripsi', gambar='$gambar_lama', lokasi_buku='$lokasi_buku', 
                jml_buku='$jml_buku', tgl_input='$tgl_input' WHERE id_buku='$id'") or die(mysqli_error($conn));

            if($query) {
                $_SESSION['msgSuccess'] = "Book has been updated!";
                header("Location: ../page/buku.php");
                exit();
            } else {
                $_SESSION['msgFail'] = "Book failed to update!";
                header("Location: ../page/buku.php");
                exit();
            }
        } else {
            if(in_array($ekstensi, $jenis) === true) {
                if($gambar_lama !== "default.jpg") {
                    $gambar_baru = $id.'.'.$ekstensi;
                    unlink('../assets/image/upload/buku/'.$gambar_lama);
                    move_uploaded_file($file_tmp, '../assets/image/upload/buku/'.$gambar_baru);

                    $query = mysqli_query($conn, "UPDATE buku SET id_buku='$id', id_kategori='$kategori', isbn='$isbn', judul='$judul', pengarang='$pengarang',
                        penerbit='$penerbit', th_terbit='$th_terbit', tempat_terbit='$tempat_terbit', deskripsi='$deskripsi', gambar='$gambar_baru', lokasi_buku='$lokasi_buku', jml_buku='$jml_buku', tgl_input='$tgl_input'
                        WHERE id_buku='$id'") or die(mysqli_error($conn));
        
                    if($query) {
                        $_SESSION['msgSuccess'] = "Book has been updated!";
                        header("Location: ../page/buku.php");
                        exit();
                    } else {
                        $_SESSION['msgFail'] = "Book failed to update!";
                        header("Location: ../page/edit-buku.php?buku=$id");
                        exit();
                    }
                } else {
                    $query = mysqli_query($conn, "UPDATE buku SET id_buku='$id', id_kategori='$kategori', isbn='$isbn', judul='$judul', pengarang='$pengarang',
                        penerbit='$penerbit', th_terbit='$th_terbit', tempat_terbit='$tempat_terbit', deskripsi='$deskripsi', gambar='default.jpg', lokasi_buku='$lokasi_buku', jml_buku='$jml_buku', tgl_input='$tgl_input'
                        WHERE id_buku='$id'") or die(mysqli_error($conn));
        
                    if($query) {
                        $_SESSION['msgSuccess'] = "Book has been updated!";
                        header("Location: ../page/buku.php");
                        exit();
                    } else {
                        $_SESSION['msgFail'] = "Book failed to update!";
                        header("Location: ../page/edit-buku.php?buku=$id");
                        exit();
                    }
                }
            }
        }
    } else {
        $_SESSION['msgFail'] = "Ukuran gambar terlalu besar!";
        header("Location: ../page/edit-buku.php?buku=$id");
        exit();
    }
?>