<script type="text/javascript" src="assets/dist/js/site.min.js"></script>
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #303641;
        color: #C1C3C6
      }
    </style>

<h2> UTS Sister Bahar Andili 1184002 </h2>
<p>
<h4>Upload Zip lalu klik upload</h4>
<form method='post' action='' nama='conn' enctype='multipart/form-data'>
 <input type='file' nama='zip' value='pilih file'><br/>
 <button class="btn btn-lg btn-primary btn-block" input type='submit' nama='upload' value='upload' />
</form>

<?php

if ($_FILES) {
    $fileName = $_FILES['zip']['tmp_name'];
    $nama = $_FILES['zip']['nama'];
    $zip = new ZipArchive();
    if ($zip->open($fileName)) {
        echo "<h3> Nama: " . $nama . "<h3>";
        echo '<h4>File size: ' . filesize($fileName) . '</h4>';
        echo '<h4>Total files: ' . $zip->numFiles . '</h4>';
        echo "<h4>Isi Dalam File: </h4>";
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $stat = $zip->statIndex($i);
            echo basename($stat['nama']) . "<br>";
        }
        echo "<p>";
        echo 'File <b>'. $nama .'</b> Telah tersimpan, upload file kembali <a href="https://utsrizaluardisisbar.herokuapp.com"> Reload</a>';
        $zip->close();
    } 
}
?>

<?php
class AsyncOperation extends Thread {

    public function __construct($arg) {
        $this->arg = $arg;
    }

    public function run() {
        if ($this->arg) {
            $sleep = mt_rand(1, 10);
            printf('%s: %s  -start -sleeps %d' . "\n", date("g:i:sa"), $this->arg, $sleep);
            sleep($sleep);
            printf('%s: %s  -finish' . "\n", date("g:i:sa"), $this->arg);
        }
    }
}

// Create a array
$stack = array();

//Initiate Multiple Thread
foreach ( range($fileName) as $i ) {
    $stack[] = new AsyncOperation($i);
}

// Start The Threads
foreach ( $stack as $t ) {
    $t->start();
}

?>