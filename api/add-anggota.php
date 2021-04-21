<?php 
    include('config.php');
    session_start();

    $nim    = $_POST['nim'];
    $pwd    = md5($_POST['password']);
    $nama   = $_POST['nama'];
    $jekel  = $_POST['jekel'];
    $ttl    = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $telp   = $_POST['telp'];

    $jenis	  = array('png','jpg','jpeg');
    $gambar   = $_FILES['file']['name'];
    $x        = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran	  = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if(!empty($gambar)) {
        if(in_array($ekstensi, $jenis) === true) {
            if($ukuran < 1044070) {
    
                $id_anggota = $_SESSION['sub_id'].'-'.$nim;
                $id_app     = $_SESSION['id_app'];

                $gambar_baru = $id_anggota.'.'.$ekstensi;
                move_uploaded_file($file_tmp, '../assets/image/upload/user/'.$gambar_baru);

                $query      = mysqli_query($conn, "INSERT INTO user VALUES('$nim', '$pwd')");
                $query_2    = mysqli_query($conn, "INSERT INTO anggota VALUES('$id_anggota', '$id_app', '$nim', '$nama', '$jekel', '$ttl', '$alamat', '$telp', '$gambar_baru')") or die(mysqli_error($conn));
    
                if($query_2) {
                    $_SESSION['msgSuccess'] = "Member has been saved!";
                    header("Location: ../page/anggota.php");
                    exit();
                } else {
                    $_SESSION['msgFail'] = "Save failed!";
                    header("Location: ../page/add-anggota.php");
                    exit();
                }
            } else {
                $_SESSION['msgFail'] = "Image to big!";
                header("Location: ../page/add-anggota.php");
                exit();
            }
        } else {
            $_SESSION['msgFail'] = "Image not supported!";
            header("Location: ../page/add-anggota.php");
            exit();
        }
    } else {
        $gambar     = "default.jpg";
        $id_anggota = $_SESSION['sub_id'].'-'.$nim;
        $id_app     = $_SESSION['id_app'];

        $query      = mysqli_query($conn, "INSERT INTO user VALUES('$nim', '$pwd')");
        $query_2    = mysqli_query($conn, "INSERT INTO anggota VALUES('$id_anggota', '$id_app', '$nim', '$nama', '$jekel', '$ttl', '$alamat', '$telp', '$gambar')") or die(mysqli_error($conn));

        if($query_2) {
            $_SESSION['msgSuccess'] = "Member has been saved!";
            header("Location: ../page/anggota.php");
            exit();
        } else {
            $_SESSION['msgFail'] = "Save failed!";
            header("Location: ../page/add-anggota.php");
            exit();
        }
    }
?>