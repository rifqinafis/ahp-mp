<?php $this->load->view('header'); ?>

<?php
if ($aksi == 'aksi_add') {
    $id = "";
    $kode = "";
    $nama = "";
    $alamat = "";
    $telp = "";
} else {
    foreach ($dataq as $rowdata) {
        $id = $rowdata->id;
        $kode = $rowdata->kode;
        $nama = $rowdata->nama;
        $alamat = $rowdata->alamat;
        $telp = $rowdata->telp;
    }
}
?>
<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h4>Form Calon Karyawan</h4>
        </div>
        <br>
        <div class="panel-body">
            <form action="<?php echo base_url() ?>calonkaryawan/form/<?php echo $aksi ?>" method="post">
                <table class="table table-striped">
                    <tr>
                        <td style="width:15%;">Kode</td>
                        <td>
                            <div class="col-sm-3">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                                <input type="text" name="kode" required class="form-control" value="<?php echo $kode; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="nama" required class="form-control" value="<?php echo $nama ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="alamat" required class="form-control" value="<?php echo $alamat ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="telp" required class="form-control" value="<?php echo $telp ?>">
                            </div>
                        </td>
                    </tr>
                    <?php foreach ($qdata as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->nama ?></td>
                            <td>
                                <div class="col-sm-2">
                                    <?php
                                    $cek = $this->db->query('SELECT * FROM nilaikaryawan WHERE ida = ? AND kodek = ? ', array($id, $value->kode))->row();
                                    if ($aksi == 'aksi_add') { ?>
                                        <input style="text-align: center;" type="hidden" class="form-control" readonly value="<?php echo $value->kode ?>" name="<?php echo "kodek[" . $key . "]" ?>">
                                        <input type="number" min="0" max="5" name="<?php echo "nilai[" . $key . "]" ?>" required class="form-control" value="">
                                    <?php } else { ?>
                                        <input style="text-align: center;" type="hidden" class="form-control" readonly value="<?php echo $value->kode ?>" name="<?php echo "kodek[" . $key . "]" ?>">
                                        <input type="number" min="0" max="5" name="<?php echo "nilai[" . $key . "]" ?>" required class="form-control" value="<?php echo $cek->nilai ?>">
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <button type="reset" class="btn btn-default">Batal</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!-- /panel -->
</div>
<!-- /container -->