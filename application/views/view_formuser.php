<?php $this->load->view('header'); ?>

<?php
if ($aksi == 'aksi_add') {
    $id = "";
    $nama = "";
    $jabatan = "";
    $username = "";
} else {
    foreach ($qdata as $rowdata) {
        $id = $rowdata->id;
        $username = $rowdata->username;
        $nama = $rowdata->nama_lengkap;
        $jabatan = $rowdata->jabatan;
    }
}
?>
<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h4>Form User Aplikasi</h4>
        </div>
        <br>
        <div class="panel-body">
            <form action="<?php echo base_url() ?>user/form/<?php echo $aksi ?>" method="post">
                <table class="table table-striped">
                    <tr>
                        <td style="width:15%;">Username</td>
                        <td>
                            <div class="col-sm-2">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                                <input type="text" required="" name="username" class="form-control" value="<?php echo $username; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%;">Nama Lengkap</td>
                        <td>
                            <div class="col-sm-5">
                                <input type="text" required="" name="nama" class="form-control" value="<?php echo $nama; ?>">
                            </div>
                        </td>
                    </tr>
                    <td style="width:15%;">Jabatan</td>
                    <td>
                        <div class="col-sm-5">
                            <input type="text" required="" name="jabatan" class="form-control" value="<?php echo $jabatan; ?>">
                        </div>
                    </td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td>
                            <div class="col-sm-5">
                                <input type="password" required="" name="password" class="form-control" value="">
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