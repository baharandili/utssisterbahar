<link rel="stylesheet" type="text/css" href="assets/bootflat-admin/css/bootstrap.min.css">
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-600af30ce920424c"></script>
<h2> UTS Sister Bahar Andili 1184002 </h2>
<p>
<h4>Upload Zip lalu klik upload</h4>
<form method='post' action='' name='conn' enctype='multipart/form-data'>
 <input type='file' name='zip' value='pilih file'><br/>
 <input type='submit' name='upload' value='upload' />
</form>

<?php

if ($_FILES) {
    $fileName = $_FILES['zip']['tmp_name'];
    $name = $_FILES['zip']['name'];
    $zip = new ZipArchive();
    if ($zip->open($fileName)) {
        echo "<h3> Name: " . $name . "<h3>";
        echo '<h4>File size: ' . filesize($fileName) . '</h4>';
        echo '<h4>Total files: ' . $zip->numFiles . '</h4>';
        echo "<h4>Isi Dalam File: </h4>";
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $stat = $zip->statIndex($i);
            echo basename($stat['name']) . "<br>";
        }
        echo "<p>";
        echo 'File <b>'. $name .'</b> Telah tersimpan, upload file kembali <a href="https://utsrizaluardisisbar.herokuapp.com"> Reload</a>';
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