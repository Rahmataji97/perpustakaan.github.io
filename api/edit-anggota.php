<?php
    include('config.php');
    session_start();

    $id     = $_POST['id_anggota'];
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
    $gambar_lama = $_POST['old_file'];

    if($ukuran < 1044070) {
        if(empty($gambar)) { 
            $query   = mysqli_query($conn, "UPDATE user SET nim='$nim', password='$pwd' WHERE nim='$nim'");
            $query_2 = mysqli_query($conn, "UPDATE anggota SET id_anggota='$id', nim='$nim', nama_lengkap='$nama', 
                jenis_kelamin='$jekel', tmpt_tgl_lahir='$ttl', alamat='$alamat', telp='$telp', foto='$gambar_lama' 
                WHERE id_anggota='$id'");

            if($query_2) {
                $_SESSION['msgSuccess'] = "Member has been updated!";
                header("Location: ../page/anggota.php");
                exit();
            } else {
                $_SESSION['msgFail'] = "Member failed to edit!";
                header("Location: ../page/anggota.php?id=$id");
                exit();
            }
        } else {
            if(in_array($ekstensi, $jenis) === true) {
                if($gambar_lama !== "default.jpg") {
                    $gambar_baru = $id.'.'.$ekstensi;
                    unlink('../assets/image/upload/user/'.$gambar_lama);
                    move_uploaded_file($file_tmp, '../assets/image/upload/user/'.$gambar_baru);

                    $query_2  = mysqli_query($conn, "UPDATE anggota SET id_anggota='$id', nim='$nim', nama_lengkap='$nama', 
                    jenis_kelamin='$jekel', tmpt_tgl_lahir='$ttl', alamat='$alamat', telp='$telp', foto='$gambar_baru' 
                    WHERE id_anggota='$id'");

                    if($query_2) {
                        $_SESSION['msgSuccess'] = "Member has been saved!";
                        header("Location: ../page/anggota.php");
                        exit();
                    } else {
                        $_SESSION['msgFail'] = "Member failed to edit!";
                        header("Location: ../page/anggota.php?id=$id");
                        exit();
                    }
                } else {
                    $query_2  = mysqli_query($conn, "UPDATE anggota SET id_anggota='$id', nim='$nim', nama_lengkap='$nama', 
                    jenis_kelamin='$jekel', tmpt_tgl_lahir='$ttl', alamat='$alamat', telp='$telp', foto='default.jpg' 
                    WHERE id_anggota='$id'");

                    if($query_2) {
                        $_SESSION['msgSuccess'] = "Member has been saved!";
                        header("Location: ../page/anggota.php");
                        exit();
                    } else {
                        $_SESSION['msgFail'] = "Member failed to edit!";
                        header("Location: ../page/anggota.php?id=$id");
                        exit();
                    }
                }
            }
        }
    } else {
        $_SESSION['msgFail'] = "Edit failed!";
        header("Location: ../page/anggota.php?id=$id");
        exit();
    }
?>