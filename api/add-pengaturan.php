<?php 
    include('config.php');
    session_start();

    $id_aplikasi    = $_POST['id_aplikasi'];
    $id_admin       = $_SESSION['id_admin'];
    $username       = $_POST['username'];
    $password       = md5($_POST['password']);
    $nama_aplikasi  = $_POST['nama_aplikasi'];
    $sub_id         = $_POST['sub_id'];
    $instansi       = $_POST['instansi'];
    $max_pinjam     = $_POST['max_pinjam'];
    $max_hari       = $_POST['max_hari'];
    $jml_denda      = $_POST['jml_denda'];
    $gambar_lama1   = $_POST['old_file1'];
    $gambar_lama2   = $_POST['old_file2'];

    $file1 = $_FILES['file1'];
    $file2 = $_FILES['file2'];

    // ADMIN PICT
    $upload1   = upload($file1);
    $gambar1   = $upload1['gambar'];
    $file_tmp1 = $upload1['file_tmp'];
    $ekstensi1 = $upload1['ekstensi'];

    // APP PICT
    $upload2   = upload($file2);
    $gambar2   = $upload2['gambar'];
    $file_tmp2 = $upload2['file_tmp'];
    $ekstensi2 = $upload2['ekstensi'];

    if(empty($file1['name'])) {

        $update_admin = mysqli_query($conn, "UPDATE admin SET username='$username', 
        password='$password', foto='$gambar_lama1' WHERE id_admin='$id_admin'");

        if(empty($file2['name'])) {

            $update_setting = mysqli_query($conn, "UPDATE setting SET nama_aplikasi='$nama_aplikasi', 
            sub_id='$sub_id', instansi='$instansi', logo='$gambar_lama2', max_pinjam='$max_pinjam', max_hari='$max_hari', 
            jml_denda='$jml_denda' WHERE id_aplikasi='$id_aplikasi'");

        } else {

            if($gambar_lama2 !== "default.jpg") {

                $gambar_baru2 = $id_aplikasi.'.'.$ekstensi2; 
                unlink('../assets/image/upload/setting/'.$gambar_lama2);
                move_uploaded_file($file_tmp2, '../assets/image/upload/setting/'.$gambar_baru2);
                $update_setting = mysqli_query($conn, "UPDATE setting SET nama_aplikasi='$nama_aplikasi', 
                sub_id='$sub_id', instansi='$instansi', logo='$gambar_baru2', max_pinjam='$max_pinjam', max_hari='$max_hari', 
                jml_denda='$jml_denda' WHERE id_aplikasi='$id_aplikasi'");
            
            } else {
                
                
                $update_setting = mysqli_query($conn, "UPDATE setting SET nama_aplikasi='$nama_aplikasi', 
                sub_id='$sub_id', instansi='$instansi', logo='default.jpg', max_pinjam='$max_pinjam', max_hari='$max_hari', 
                jml_denda='$jml_denda' WHERE id_aplikasi='$id_aplikasi'");

            }

        }
    } else {
        
        if($gambar_lama1 !== "default.jpg") {
            
            $gambar_baru1 = $id_admin.'.'.$ekstensi1;
            unlink('../assets/image/upload/setting/'.$gambar_lama1);
            move_uploaded_file($file_tmp1, '../assets/image/upload/setting/'.$gambar_baru1);
            $update_admin = mysqli_query($conn, "UPDATE admin SET username='$username', 
            password='$password', foto='$gambar_baru1' WHERE id_admin='$id_admin'");


        } else {
            
            $update_admin = mysqli_query($conn, "UPDATE admin SET username='$username', 
            password='$password', foto='default.jpg' WHERE id_admin='$id_admin'");

        }

        if(empty($file2['name'])) {
            
            $update_setting = mysqli_query($conn, "UPDATE setting SET nama_aplikasi='$nama_aplikasi', 
            sub_id='$sub_id', instansi='$instansi', logo='$gambar_lama2', max_pinjam='$max_pinjam', max_hari='$max_hari', 
            jml_denda='$jml_denda' WHERE id_aplikasi='$id_aplikasi'");

        } else {

            if($gambar_lama2 !== "default.jpg") {

                $gambar_baru2 = $id_aplikasi.'.'.$ekstensi2; 
                unlink('../assets/image/upload/setting/'.$gambar_lama2);
                move_uploaded_file($file_tmp2, '../assets/image/upload/setting/'.$gambar_baru2);
                $update_setting = mysqli_query($conn, "UPDATE setting SET nama_aplikasi='$nama_aplikasi', 
                sub_id='$sub_id', instansi='$instansi', logo='$gambar_baru2', max_pinjam='$max_pinjam', max_hari='$max_hari', 
                jml_denda='$jml_denda' WHERE id_aplikasi='$id_aplikasi'");
            
            } else {
                
                $update_setting = mysqli_query($conn, "UPDATE setting SET nama_aplikasi='$nama_aplikasi', 
                sub_id='$sub_id', instansi='$instansi', logo='default.jpg', max_pinjam='$max_pinjam', max_hari='$max_hari', 
                jml_denda='$jml_denda' WHERE id_aplikasi='$id_aplikasi'");

            }

        }
    }
    
    if($update_admin || $update_setting) {
        $_SESSION['msgSuccess'] = "Setting has been saved!";
        header("Location: ../page/pengaturan.php");
        exit();
    } else {
        $_SESSION['msgFail'] = "Setting failed to save!";
        header("Location: ../page/pengaturan.php");
        exit();
    }

    function upload($file) {
        $jenis	  = array('png','jpg','jpeg');
        $gambar   = $file['name'];
        $x        = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $ukuran	  = $file['size'];
        $file_tmp = $file['tmp_name'];

        if(in_array($ekstensi, $jenis) === true) {
            if($ukuran < 1044070) {
                $result = array();
                $result = array(
                    'gambar' => $gambar,
                    'ukuran' => $ukuran,
                    'file_tmp' => $file_tmp,
                    'ekstensi' => $ekstensi
                );
                return $result;
            } else {
                return "File is to big!";
            }
        }
    }
?>