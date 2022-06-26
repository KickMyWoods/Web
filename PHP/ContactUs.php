<?php
$send = false;
if(isset($_POST["submit"])){
    $saran = json_decode(file_get_contents("../json/ContactUs.json"));
    $saran[] = [
    "status" => $_POST["status"],
    "username" => $_POST["username"],
    "saran" => $_POST["saran"]
    ];
    $stream = fopen("../json/ContactUs.json", "w");
    fwrite($stream, json_encode($saran));
    fclose($stream);
    $send = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
    crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />

    <title>UAS Fakultas Sains dan Informatika</title>
</head>
<body>

    <div class="container kontak">
    <h3 class="text-center mb-4"> Berikan <b>Saran</b> dan <b>Masukan</b> Anda <b>Disini</b></h3>
    <!-- dropdown -->
    <form action="" method="POST">
        
    <div class="input-group mb-5">
        <label class="input-group-text bg-danger" for="inputGroupSelect01"
        >Status</label
        >
        <select class="form-select" id="inputGroupSelect01" name="status" required>
        <option selected>Departemen</option>
        <option value="Dosen/Staff Universitas">Dosen/Staff Universitas</option>
        <option value="Mahasiswa">Mahasiswa</option>
        <option value="Lainnya">Lainnya..</option>
        </select>
    </div>
    <!-- end-dropdown -->

    <!-- input-group -->
    <div class="input-group flex-nowrap mt-2">
        <span class="input-group-text bg-danger" id="addon-wrapping">@</span>
        <input
        type="text"
        class="form-control"
        placeholder="Username"
        aria-label="Username"
        aria-describedby="addon-wrapping" name="username" required
        />
    </div>
    <!---->
    <div class="input-group mt-5 mb-5">
        <span class="input-group-text bg-danger">Kritik/Saran</span>
        <textarea class="form-control" aria-label="With textarea" name="saran" required></textarea>
    </div>
    <div id="liveAlertPlaceholder" class="mt-4"></div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-danger" name="submit" id="liveAlertBtn">Submit</button>
    </div>
    
    </form>
    <!-- end-input-group -->
    <footer class="footer-kontak text-center mt-5">
        <p>&copy; Copyright 2022 | Fakultas Sains dan Informatika</p>
    </footer>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"
    ></script>
    <script src="js/kontak.js"></script>

    <?php if($send):?>
    <script>terkirim("Terima Kasih, Masukan Anda Telah Terkirim!", "success");</script>
    <?php endif; ?>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
</html>
