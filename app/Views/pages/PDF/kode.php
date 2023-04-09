<?php foreach ($pdf as $key) : ?>
<?php session()->set(['kode' => $key['token']]); ?>
<?php session()->set(['kode2' => $key['nik']]); ?>
<?php session()->set(['kode3' => $key['nama']]); ?>
    <?php endforeach; ?>