<?php $this->load->view('header'); ?>

<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <a href="<?php echo base_url() ?>kriteria/form/add" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> Tambah Kriteria</a>
    <br><br>
    <div class="panel panel-default">
        <div style="text-align: center;" class="panel-heading">
            <h2>Daftar Kriteria</h2>
        </div>
        <div class="panel-body">
            <p><?php echo $this->session->flashdata('Pesan_Kriteria') ?></p>
            <form action="post">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10%">No</th>
                            <th style="width: 15%">Kode</th>
                            <th>Nama</th>
                            <th style="width: 10%">Aksi</th>
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
                                    <td><a href="<?php echo base_url() ?>kriteria/form/edit/<?php echo $row->id ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href=" <?php echo base_url() ?>kriteria/del_kriteria/<?php echo $row->id ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div> <!-- /panel -->
</div> <!-- /container -->
<?php $this->load->view('footer'); ?>