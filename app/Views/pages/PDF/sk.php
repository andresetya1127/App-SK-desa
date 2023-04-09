<style>
    .judul {
        text-align: center;
    }

    .nama {
        text-transform: uppercase;
    }

    .capitalize {
        text-transform: capitalize;
    }

    th {
        height: 26px;
    }

    .center {
        text-align: center;
    }

    .justify {
        text-align: justify;
    }
</style>
<?php foreach ($pdf as $key => $value) : ?>
    <div class="judul">
        <b><u class="nama">SURAT KETERANGAN <?= $value['jenis_surat']; ?></u></b><br>
        <span>Nomor: 470/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ LTN/<?= date('Y') ?></span>
    </div>

    <!-- Yang Bertanda tangan -->
    <div class="">
        <br class="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Kepala Desa Lantan Kecamatan Batukliang Utara Kabupaten Lombok Tengah dengan ini menerangkan bahwa :
    </div>
    <br>

    <!-- Info Request -->
    <table>
        <tr>
            <th width="15"></th>
            <th><b>Nama</b></th>
            <th width="6%" class="center">:</th>
            <th width=""><b class="nama"><?= $value['nama']; ?> </b></th>
        </tr>
        <tr>
            <th width="15"></th>
            <th><b>NIK</b></th>
            <th width="6%" class="center">:</th>
            <th width=""><b class="nama"><?= $value['nik']; ?> </b></th>
        </tr>
        <tr>
            <th width="15"></th>
            <th>Tempat/Tanggal Lahir</th>
            <th width="6%" class="center">:</th>
            <th width="" class="capitalize"><?= $value['tmp_lahir'] . ', ' . $value['tgl_lahir']; ?></th>
        </tr>
        <tr>
            <th width="15"></th>
            <th>Jenis Kelamin</th>
            <th width="6%" class="center">:</th>
            <th width="" class="capitalize"><?= $value['jk']; ?></th>
        </tr>
        <tr>
            <th width="15"></th>
            <th>Pekerjaan</th>
            <th width="6%" class="center">:</th>
            <th width="" class="capitalize"><?= $value['pekerjaan']; ?></th>
        </tr>
        <tr>
            <th width="15"></th>
            <th>Alamat</th>
            <th width="6%" class="center">:</th>
            <th width="" class="capitalize"><?= $value['alamat']; ?></th>
        </tr>
    </table>


    <!-- Text Dalaam Surat -->
    <!-- Text Dalaam Surat -->
    <?php if ($value['txt1']) : ?>
        <p class="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value['txt1']; ?></p>
    <?php endif; ?>
    <?php if ($value['txt2']) : ?>
        <p class="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value['txt2']; ?></p>
    <?php endif; ?>
    <p class="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>

    <table class="center">
        <tr>
            <th></th>
            <th>
                <p>Lantan, <?= date('d F Y') ?></p>
            </th>
        </tr>
        <tr>
            <th></th>
            <th class="tgl">

                <?php $ttd = '';
                if ($value['jabatan'] == 'Kepala Desa') {
                    $ttd = 'Kepala Desa Lantan';
                } else {
                    $ttd = 'An.Kepala Desa Lantan<br>' . $value['jabatan'];
                } ?>

                <?= $ttd; ?>
            </th>
        </tr>
        <tr>
            <th></th>
            <th>
                <br><br><br><br><br><br>
                <b><u>( <?= $value['name_contact']; ?> )</u></b><br>
            </th>
        </tr>
    </table>
<?php endforeach ?>