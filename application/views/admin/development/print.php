<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/partials/head') ?>
    <style>
        h1 {
            text-align: center;
        }

        pre {
            /* font-family: Source Sans Pro, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; */
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            padding-bottom: 0px;
            padding-top: 0px;
            /* display: table-row; */
            /* text-align: center; */
        }

        table {
            border: 1px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h1>Form Development dan Analisa</h1>
    <hr>
    <hr>
    <table align="center">
        <tbody>
            <tr>
                <th style="width: 10%;">ID</th>
                <td style="width: 15%;">: <?= $dev->development_id ?></td>
                <th style="width: 10%;">Developer</th>
                <td style="width: 15%;">: <?= $dev->development_developer ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <th style="width: 25%;">Status</th>
                <td style="width: 15%;">: <?= $dev->status_nama ?></td>
                <th style="width: 25%;">Jenis Sample</th>
                <td style="width: 15%;">: <?= $dev->development_jenis_sample ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>: <?= date('D, d-m-Y | H:i:s', strtotime($dev->development_tanggal_masuk)) ?></td>
                <th>Attachment</th>
                <td>: <?= $dev->development_dokumen ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <table border="1" align="center">
        <thead>
            <tr style="text-align: center;">
                <th style="width: 20%;">Komposisi</th>
                <th style="width: 8%;">Warna</th>
                <th style="width: 10%;">Aroma/Rasa</th>
                <th style="width: 10%;">Cair/Powder</th>
                <th style="width: 10%;">Manfaat/Konsep</th>
                <th style="width: 10%;">Gramasi</th>
                <th style="width: 20%;">Metodologi</th>
                <th style="width: 20%;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php
                    if (!empty($komposisi)) foreach ($komposisi as $q) :
                    ?>
                        [<?= $q->barang_kode ?>] <?= $q->barang_nama ?> (<?= $q->development_komposisi_qty ?> <?= $q->development_komposisi_satuan ?>)<br>
                    <?php endforeach ?>
                </td>
                <td>
                    <?= $dev->development_warna ?>
                </td>
                <td>
                    <?= $dev->development_aroma ?>
                </td>
                <td>
                    <?= $dev->development_tekstur ?>
                </td>
                <td>
                    <?= $dev->development_manfaat ?>
                </td>
                <td>
                    <?= $dev->development_gramasi ?>
                </td>
                <td>
                    <?= $dev->development_metodologi ?>
                </td>
                <td>
                    <?= $dev->development_keterangan ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <h4 style="text-align: center;">Form Development dan Analisa</h4>
    <table align="center" border="1" style="width: 1200px;">
        <thead>
            <tr style="text-align: center;">
                <th>#</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Analisa</th>
                <th>Hasil Analisa</th>
                <th>Researcher</th>
                <th>Attachment</th>
            </tr>
        </thead>
        <tbody>
            <?php $aa = 1;
            if (!empty($analisisDokumen)) {
                foreach ($analisisDokumen as $key => $g) : ?>
                    <tr>
                        <td><?= $aa++ ?></td>
                        <td><?= date('D, d-m-Y', strtotime($g['analisis_tanggal_mulai'])) ?></td>
                        <td><?= date('D, d-m-Y', strtotime($g['analisis_tanggal_selesai'])) ?></td>
                        <td><?= $g['analisis_analisa'] ?></td>
                        <td><?= $g['analisis_hasil'] ?></td>
                        <td><?= $g['analisis_research'] ?></td>
                        <td>
                            <?php
                            foreach ($g['analisis_dokumen'] as $key => $value) { ?>
                                <a href="<?= base_url('assets/development/' . $value['analisis_dokumen_dokumen']) ?>"><?= $value['analisis_dokumen_dokumen']; ?></a>
                                <br>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>