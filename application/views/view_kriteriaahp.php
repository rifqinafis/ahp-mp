<?php $this->load->view('header'); ?>

<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h4>Perbandingan Kriteria Berpasangan</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 17%;">Kriteria</th>
                        <?php foreach ($kriteria as $key => $value) { ?>
                            <th style="text-align: center;"><?php echo $value->kode ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kriteria as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo "($value->kode) $value->nama" ?></td>
                            <?php foreach ($ahp['hasil'][$key] as $keys => $values) { ?>
                                <td style="text-align: center;"><?php echo $values ?></td>
                        <?php }
                        } ?>
                        </tr>
                        <tr>
                            <th style="background-color: #AED6F1 ">Total</th>
                            <?php foreach ($ahp['total_bawah'] as $key => $value) { ?>
                                <th style="text-align: center; background-color: #AED6F1"><?php echo $value ?></th>
                            <?php } ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- /panel -->
    <br>
    <hr>
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h4>Normalisasi Kriteria Berpasangan</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 17%;">Kriteria</th>
                        <?php foreach ($kriteria as $key => $value) { ?>
                            <th style="text-align: center;"><?php echo $value->kode ?></th>
                        <?php } ?>
                        <th style="text-align: center; background-color: #AED6F1">Jumlah</th>
                        <th style="text-align: center; background-color: #AED6F1">Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kriteria as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo "($value->kode) $value->nama" ?></td>
                            <?php foreach ($ahp1['hasil'][$key] as $keys => $values) { ?>
                                <td style="text-align: center;"><?php echo $values ?></td>
                            <?php } ?>
                            <th style="text-align: center; background-color: #AED6F1"><?php echo $ahp1['jumlah'][$key] ?></th>
                            <th style="text-align: center; background-color: #AED6F1"><?php echo $ahp1['bobot'][$key] ?></th>
                        <?php } ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- /panel -->
    <br>
    <hr>
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h4>Konsistensi Kriteria</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;width: 20%">Jumlah Kriteria</th>
                        <th style="text-align: center;width: 20%">Lambda Max</th>
                        <th style="text-align: center;width: 20%">CI</th>
                        <th style="text-align: center;width: 20%">CR</th>
                        <th style="text-align: center;width: 20%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;"><?php echo count($ahp1['bobot']); ?></td>
                        <td style="text-align: center;"><?php echo $ahp2['lamdamax']; ?></td>
                        <td style="text-align: center;"><?php echo $ahp2['ci']; ?></td>
                        <td style="text-align: center;"><?php echo $ahp2['cr']; ?></td>
                        <?php
                        if ($ahp2['cr'] <= 0.1) { ?>
                            <th style="text-align: center;background-color: #2ECC71;">Konsisten</th>
                        <?php } else { ?>
                            <th style="text-align: center;background-color: #E74C3C;">Tidak Konsisten</th>
                        <?php
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- /panel -->
    <a href="<?php echo base_url() ?>kriteriaahp/form/add" class="btn btn-sm btn-primary">
        <i class="glyphicon glyphicon-refresh"></i> Ulangi Perbandingan</a>
    <br><br>
</div> <!-- /container -->
<?php $this->load->view('footer'); ?>