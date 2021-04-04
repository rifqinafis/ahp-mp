<?php $this->load->view('header'); ?>

<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <a href="<?php echo base_url() ?>user/form/add" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> Tambah User Aplikasi</a>
    <br><br>
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h2>Daftar User Aplikasi</h2>
        </div>
        <div class="panel-body">
            <p><?php echo $this->session->flashdata('Pesan_User') ?> </p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th style="width: 10%;">Aksi</th>
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
                        foreach ($data as $row) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row->username ?></td>
                                <td><?php echo $row->nama_lengkap ?></td>
                                <td><?php echo $row->jabatan ?></td>
                                <td><a href="<?php echo base_url() ?>user/form/edit/<?php echo $row->id ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url() ?>user/hapus/<?php echo $row->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>

                                </td>
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