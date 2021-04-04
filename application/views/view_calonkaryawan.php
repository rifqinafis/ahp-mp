<?php $this->load->view('header'); ?>

<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <a href="<?php echo base_url() ?>calonkaryawan/form/add" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Calon Karyawan</a>

        <a href="<?php echo base_url() ?>calonkaryawan/hapusall" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin ingin menghapus semua data ini?')">
            <i class="fas fa-trash"></i> Hapus Semua Data</a>
        <br><br>
        <div style="text-align: center;" class="panel-heading">
            <h2>Daftar Calon Karyawan</h2>
        </div>
        <p><?php echo $this->session->flashdata('Pesan_Calonkaryawan') ?> </p>
        <div class="panel-body">
            <table class="table table-striped myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
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
                                <td><?php echo $row->kode ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->alamat ?></td>
                                <td><?php echo $row->telp ?></td>
                                <td><a href="<?php echo base_url() ?>calonkaryawan/form/edit/<?php echo $row->id ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url() ?>calonkaryawan/hapus/<?php echo $row->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
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