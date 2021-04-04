<?php $this->load->view('header'); ?>

<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
    <div style="text-align: center;" class="panel-heading">
      <h4>Form Nilai Kriteria</h4>
    </div>
    <div class="panel-body">
      <form action="<?php echo base_url() ?>kriteriaahp/form/<?php echo $aksi ?>" method="post">
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="text-align: center;">Kriteria Pertama</th>
              <th style="text-align: center;">Penilaian</th>
              <th style="text-align: center;">Kriteria Kedua</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data1 as $key => $value) {
              foreach ($data1 as $keys => $values) {
                if ($key < $keys) { ?>
                  <tr>
                    <td style="text-align: center;">
                      <input style="text-align: center;" type="text" class="form-control" readonly value="<?php echo $value->nama ?>">
                      <input style="text-align: center;" type="hidden" class="form-control" readonly value="<?php echo $value->id ?>" name="<?php echo "kriteria1[" . $key . "][" . $keys . "]" ?>">
                    </td>
                    <td style="text-align: center; width: 30%">
                      <select name="<?php echo "nilai[" . $key . "][" . $keys . "]" ?>" class="form-control" required>
                        <?php
                        $cek = $this->db->query('select * from nilaikriteria where kriteria1 = ? and kriteria2 = ?', array($value->id, $values->id))->row();
                        if ($cek->nilai == 1) { ?>
                          <option selected value="1">Sama Penting (1)</option>
                          <option value="2">Mendekati Sedikit Lebih Penting (2)</option>
                          <option value="3">Sedikit Lebih Penting (3)</option>
                          <option value="4">Mendekati Lebih Penting (4)</option>
                          <option value="5">Lebih Penting (5)</option>
                          <option value="6">Mendekati Sangat Penting (6)</option>
                          <option value="7">Sangat Penting (7)</option>
                          <option value="8">Mendekati Mutlak (8)</option>
                          <option value="9">Mutlak (9)</option>
                        <?php } elseif ($cek->nilai == 2) { ?>
                          <option value="1">Sama Penting (1)</option>
                          <option selected value="2">Mendekati Sedikit Lebih Penting (2)</option>
                          <option value="3">Sedikit Lebih Penting (3)</option>
                          <option value="4">Mendekati Lebih Penting (4)</option>
                          <option value="5">Lebih Penting (5)</option>
                          <option value="6">Mendekati Sangat Penting (6)</option>
                          <option value="7">Sangat Penting (7)</option>
                          <option value="8">Mendekati Mutlak (8)</option>
                          <option value="9">Mutlak (9)</option>
                        <?php } elseif ($cek->nilai == 3) { ?>
                          <option value="1">Sama Penting (1)</option>
                          <option value="2">Mendekati Sedikit Lebih Penting (2)</option>
                          <option selected value="3">Sedikit Lebih Penting (3)</option>
                          <option value="4">Mendekati Lebih Penting (4)</option>
                          <option value="5">Lebih Penting (5)</option>
                          <option value="6">Mendekati Sangat Penting (6)</option>
                          <option value="7">Sangat Penting (7)</option>
                          <option value="8">Mendekati Mutlak (8)</option>
                          <option value="9">Mutlak (9)</option>
                        <?php } elseif ($cek->nilai == 4) { ?>
                          <option value="1">Sama Penting (1)</option>
                          <option value="2">Mendekati Sedikit Lebih Penting (2)</option>
                          <option value="3">Sedikit Lebih Penting (3)</option>
                          <option selected value="4">Mendekati Lebih Penting (4)</option>
                          <option value="5">Lebih Penting (5)</option>
                          <option value="6">Mendekati Sangat Penting (6)</option>
                          <option value="7">Sangat Penting (7)</option>
                          <option value="8">Mendekati Mutlak (8)</option>
                          <option value="9">Mutlak (9)</option>
                        <?php } elseif ($cek->nilai == 5) { ?>
                          <option value="1">Sama Penting (1)</option>
                          <option value="2">Mendekati Sedikit Lebih Penting (2)</option>
                          <option value="3">Sedikit Lebih Penting (3)</option>
                          <option value="4">Mendekati Lebih Penting (4)</option>
                          <option selected value="5">Lebih Penting (5)</option>
                          <option value="6">Mendekati Sangat Penting (6)</option>
                          <option value="7">Sangat Penting (7)</option>
                          <option value="8">Mendekati Mutlak (8)</option>
                          <option value="9">Mutlak (9)</option>
                        <?php } elseif ($cek->nilai == 6) { ?>
                          <option value="1">Sama Penting (1)</option>
                          <option value="2">Mendekati Sedikit Lebih Penting (2)</option>
                          <option value="3">Sedikit Lebih Penting (3)</option>
                          <option value="4">Mendekati Lebih Penting (4)</option>
                          <option value="5">Lebih Penting (5)</option>
                          <option selected value="6">Mendekati Sangat Penting (6)</option>
                          <option value="7">Sangat Penting (7)</option>
                          <option value="8">Mendekati Mutlak (8)</option>
                          <option value="9">Mutlak (9)</option>
                        <?php } elseif ($cek->nilai == 7) { ?>
                          <option value="1">Sama Penting (1)</option>
                          <option value="2">Mendekati Sedikit Lebih Penting (2)</option>
                          <option value="3">Sedikit Lebih Penting (3)</option>
                          <option value="4">Mendekati Lebih Penting (4)</option>
                          <option value="5">Lebih Penting (5)</option>
                          <option value="6">Mendekati Sangat Penting (6)</option>
                          <option selected value="7">Sangat Penting (7)</option>
                          <option value="8">Mendekati Mutlak (8)</option>
                          <option value="9">Mutlak (9)</option>
                        <?php } elseif ($cek->nilai == 8) { ?>
                          <option value="1">Sama Penting (1)</option>
                          <option value="2">Mendekati Sedikit Lebih Penting (2)</option>
                          <option value="3">Sedikit Lebih Penting (3)</option>
                          <option value="4">Mendekati Lebih Penting (4)</option>
                          <option value="5">Lebih Penting (5)</option>
                          <option value="6">Mendekati Sangat Penting (6)</option>
                          <option value="7">Sangat Penting (7)</option>
                          <option selected value="8">Mendekati Mutlak (8)</option>
                          <option value="9">Mutlak (9)</option>
                        <?php } else { ?>
                          <option value="1">Sama Penting (1)</option>
                          <option value="2">Mendekati Sedikit Lebih Penting (2)</option>
                          <option value="3">Sedikit Lebih Penting (3)</option>
                          <option value="4">Mendekati Lebih Penting (4)</option>
                          <option value="5">Lebih Penting (5)</option>
                          <option value="6">Mendekati Sangat Penting (6)</option>
                          <option value="7">Sangat Penting (7)</option>
                          <option value="8">Mendekati Mutlak (8)</option>
                          <option selected value="9">Mutlak (9)</option>
                        <?php } ?>

                    </td>
                    <td style=" text-align: center;">
                      <input style="text-align: center;" type="text" class="form-control" readonly value="<?php echo $values->nama ?>">
                      <input style="text-align: center;" type="hidden" class="form-control" readonly value="<?php echo $values->id ?>" name="<?php echo "kriteria2[" . $key . "][" . $keys . "]" ?>">
                    </td>
                  </tr>
            <?php }
              }
            } ?>
          </tbody>
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