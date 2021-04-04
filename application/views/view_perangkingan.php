<?php $this->load->view('header'); ?>

<div class="container">
    <a href="<?php echo base_url() ?>hasilperangkingan/update" class="btn btn-sm btn-primary">
        <i class="fas fa-sync"></i> Update Ranking</a>
    <br><br>
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h2>Data Hasil Perangkingan Calon Karyawan</h2>
        </div>
        <br>
        <div class="panel-body">
            <table class="table table-striped myTable">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 10%">Rank</th>
                        <th style="text-align: center;">Kode</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Alamat</th>
                        <th style="text-align: center;">No. Telp</th>
                        <th style="text-align: center;">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($datar)) { ?>
                        <tr>
                            <td colspan="8">Data tidak ditemukan</td>
                        </tr>
                        <?php
                    } else {
                        $no = 0;
                        foreach ($datar as $row => $value) {
                            $no++;
                        ?>
                            <tr>
                                <td align="center"><?php echo $no ?></td>
                                <td align="center"><?php echo $value->kode ?></td>
                                <td align="center"><?php echo $value->nama ?></td>
                                <td align="center"><?php echo $value->alamat ?></td>
                                <td align="center"><?php echo $value->telp ?></td>
                                <td align="center"><?php echo number_format($value->nilai, 4) ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /panel -->

</div> <!-- /container -->
<?php $this->load->view('footer'); ?>