<?php $this->load->view('header'); ?>

<?php
if ($aksi == 'aksi_add') {
    $id = "";
    $kode = "";
    $nama = "";
} else {
    foreach ($qdata as $rowdata) {
        $id = $rowdata->id;
        $kode = $rowdata->kode;
        $nama = $rowdata->nama;
    }
}
?>
<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h4>Form Kriteria</h4>
        </div>
        <br>
        <div class="panel-body">
            <form action="<?php echo base_url() ?>kriteria/form/<?php echo $aksi ?>" method="post">
                <table class="table table-striped">
                    <tr>
                        <td style="width:15%;">Kode Kriteria</td>
                        <td>
                            <div class="col-sm-2">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                                <input type="text" name="kode_kriteria" class="form-control" value="<?php echo $kode; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%;">Nama Kriteria</td>
                        <td>
                            <div class="col-sm-5">
                                <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>">
                            </div>
                        </td>
                    </tr>
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

<?php $this->load->view('footer'); ?>