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
    <h1>Form Formulasi Sample</h1>
    <hr>
    <hr>
    <table align="center">
        <tbody>
            <tr>
                <th style="width: 10%;">Tanggal</th>
                <td style="width: 15%;">: <?= date('D, d-m-Y | H:i:s', strtotime($permintaan->permintaan_tanggal_masuk)) ?></td>
                <th style="width: 10%;">Penanggung Jawab</th>
                <td style="width: 15%;">: <?= $permintaan->permintaan_penanggung_jawab ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <th style="width: 25%;">Nama Customer</th>
                <td style="width: 15%;">: <?= $form->form_nama_customer ?></td>
                <th style="width: 25%;">Status </th>
                <td style="width: 15%;">: <?= $formstatus->status_nama ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <th style="width: 25%;">Permintaan Sample</th>
                <td style="width: 15%;">: <?= $form->form_permintaan_sample ?></td>
                <th style="width: 25%;">ID Project</th>
                <td style="width: 15%;">: <?= $form->form_id ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <th style="width: 25%;">Marketing</th>
                <td style="width: 15%;">: <?= $form->form_marketing ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <table border="1" align="center">
        <thead>
            <tr style="text-align: center;">
                <th style="width: 8%;">No</th>
                <th style="width: 20%;">Komposisi</th>
                <th style="width: 8%;">Warna</th>
                <th style="width: 10%;">Aroma/Rasa</th>
                <th style="width: 10%;">Cair/Powder</th>
                <th style="width: 10%;">Manfaat/Konsep</th>
                <th style="width: 10%;">Gramasi</th>
                <th style="width: 20%;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>
                    <?php $no = 1;
                    if (!empty($komposisi)) foreach ($komposisi as $q) :
                    ?>
                        [<?= $q->barang_kode ?>] <?= $q->barang_nama ?> (<?= $q->detail_komposisi_qty ?> <?= $q->detail_komposisi_satuan ?>)<br>
                    <?php endforeach ?>
                </td>
                <td>
                    <?= $permintaan->permintaan_warna ?>
                </td>
                <td>
                    <?= $permintaan->permintaan_aroma ?>
                </td>
                <td>
                    <?= $permintaan->permintaan_tekstur ?>
                </td>
                <td>
                    <?= $permintaan->permintaan_manfaat ?>
                </td>
                <td>
                    <?= $permintaan->permintaan_gramasi ?>
                </td>
                <td>
                    <?= $permintaan->permintaan_keterangan ?>
                </td>
            </tr>


            <?php $no = 1;
            foreach ($revisi as $q) :
            ?>
                <tr>
                    <td style="text-align: center;">Revisi <?= $no++ ?></td>
                    <td>
                        <?php
                        foreach ($q as $key => $value) {
                            echo '[' . $value->barang_kode . '] ' . $value->barang_nama . ' (' . $value->revisi_komposisi_qty . ' ' . $value->revisi_komposisi_satuan . ')<br>';
                        }
                        ?>
                    </td>
                    <td>
                        <?= $q[0]->revisi_warna ?>
                    </td>
                    <td>
                        <?= $q[0]->revisi_aroma ?>
                    </td>
                    <td>
                        <?= $q[0]->revisi_tekstur ?>
                    </td>
                    <td>
                        <?= $q[0]->revisi_manfaat ?>
                    </td>
                    <td>
                        <?= $q[0]->revisi_gramasi ?>
                    </td>
                    <td>
                        <?= $q[0]->revisi_keterangan ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>