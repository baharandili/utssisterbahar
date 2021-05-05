<script type="text/javascript"></script>
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #303641;
        color: #C1C3C6
      }
    </style>
<u><marquee><h2> UTS Sister Bahar Andili 1184002 </h2></marquee></u>
<br>
<center>
<h4>Upload Zip Anda Di Bawah Ini</h4>
<form method='post' action='' name='conn' enctype='multipart/form-data'>
 <input type='file' name='zip' value='pilih file'>
 <input type='submit' name='upload' value='upload' />
</form>


<?php

if ($_FILES) {
    $fileName = $_FILES['zip']['tmp_name'];
    $name = $_FILES['zip']['name'];
    $zip = new ZipArchive();
    if ($zip->open($fileName)) {
        echo "<h3> Nama File: " . $name . "<h3>";
        echo '<h4>Ukuran File: ' . filesize($fileName) . '</h4>';
        echo '<h4>Isi File: ' . $zip->numFiles . '</h4>';
        echo "<h4>List Isi Dalam File: </h4>";
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $stat = $zip->statIndex($i);
            echo basename($stat['name']) . "<br>";
        }
        echo "<p>";
        echo 'File <b>'. $name .'</b> Data file tersimpan, silahkan upload kembali <a href="https://utsbaharandilisister.herokuapp.com"> Klik Disini</a>';
        $zip->close();
    } 
}
?>
</center>
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