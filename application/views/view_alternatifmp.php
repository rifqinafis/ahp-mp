<?php $this->load->view('header'); ?>

<div class="container">
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h4>Standar Profile Nilai Karyawan</h4>
        </div>
        <div class="panel-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10%">Kriteria</th>
                        <?php foreach ($datak as $row) { ?>
                            <th style="text-align: center;"><?php echo $row->kode ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)) { ?>
                        <tr>
                            <td colspan="8">Data tidak ditemukan</td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr>
                            <td><?php echo "Profile" ?></td>
                            <?php foreach ($datak as $row) { ?>
                                <td style="text-align: center;"><?php echo "5" ?></td>

                        <?php
                            }
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /panel -->
    <br>
    <hr>
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h4>Nilai Karyawan</h4>
        </div>
        <div class="panel-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10%">Kode Karyawan</th>
                        <?php foreach ($datak as $row) { ?>
                            <th style="text-align: center;"><?php echo $row->kode ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)) { ?>
                        <tr>
                            <td colspan="8">Data tidak ditemukan</td>
                        </tr>
                        <?php
                    } else {
                        $no = 0;
                        foreach ($data as $key => $value) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $value->kode ?></td>
                                <?php foreach ($datak as $keys => $values) {
                                    $cek = $this->db->query('SELECT * FROM nilaikaryawan WHERE kodea = ? AND kodek = ? ', array($value->kode, $values->kode))->row(); ?>
                                    <td style="text-align: center;"><?php echo $cek->nilai ?></td>
                                <?php } ?>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /panel -->
    <br>
    <hr>
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h4>GAP Nilai Karyawan</h4>
        </div>
        <div class="panel-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10%">Kode Karyawan</th>
                        <?php foreach ($datak as $row) { ?>
                            <th style="text-align: center;"><?php echo $row->kode ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)) { ?>
                        <tr>
                            <td colspan="8">Data tidak ditemukan</td>
                        </tr>
                        <?php
                    } else {
                        $no = 0;
                        foreach ($data as $key => $value) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $value->kode ?></td>
                                <?php foreach ($datak as $keys => $values) {
                                    $cek = $this->db->query('SELECT * FROM nilaikaryawan WHERE kodea = ? AND kodek = ? ', array($value->kode, $values->kode))->row(); ?>
                                    <td style="text-align: center;"><?php echo $cek->nilai - 5 ?></td>
                                <?php } ?>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /panel -->
    <br>
    <hr>
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h4>Pembobotan Nilai Karyawan</h4>
        </div>
        <div class="panel-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10%">Kode Karyawan</th>
                        <?php foreach ($datak as $row) { ?>
                            <th style="text-align: center;"><?php echo $row->kode ?></th>
                        <?php } ?>
                        <th style="text-align: center; background-color: #AED6F1">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)) { ?>
                        <tr>
                            <td colspan="8">Data tidak ditemukan</td>
                        </tr>
                        <?php
                    } else {
                        foreach ($data as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value->kode ?></td>
                                <?php foreach ($datak as $keys => $values) {
                                    $cek = $this->db->query('SELECT * FROM nilaikaryawan WHERE kodea = ? AND kodek = ? ', array($value->kode, $values->kode))->row();
                                    $gap = ($cek->nilai - 5);
                                    if ($gap == 0) { ?>
                                        <td style="text-align: center;"><?php echo 6 ?></td>
                                    <?php } elseif ($gap == -1) { ?>
                                        <td style="text-align: center;"><?php echo 5 ?></td>
                                    <?php } elseif ($gap == -2) { ?>
                                        <td style="text-align: center;"><?php echo 4 ?></td>
                                    <?php } elseif ($gap == -3) { ?>
                                        <td style="text-align: center;"><?php echo 3 ?></td>
                                    <?php } elseif ($gap == -4) { ?>
                                        <td style="text-align: center;"><?php echo 2 ?></td>
                                    <?php } elseif ($gap == -5) { ?>
                                        <td style="text-align: center;"><?php echo 1 ?></td>
                                <?php }
                                } ?>
                                <th style="text-align: center; background-color: #AED6F1"><?php echo $mp['jumlah'][$key] ?></th>
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