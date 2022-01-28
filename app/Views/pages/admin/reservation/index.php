<?= $this->extend('layouts/admin/_master') ?>

<?= $this->section('title') ?>
Daftar Reservasi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-success w-100">
      <?= session()->getFlashdata('msg') ?>
    </div>
  <?php endif ?>
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="room-table" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tipe Kamar</th>
                <th class="text-center">Nama Pemesan</th>
                <th class="text-center">Email Pemesan</th>
                <th class="text-center">No. Telp Pemesan</th>
                <th class="text-center">Tanggal Checkin</th>
                <th class="text-center">Tanggal Checkout</th>
                <th class="text-center">Total Kamar</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data as $reservation) : ?>
                <tr>
                  <td class="text-center">
                    <?= $no++ ?>
                  </td>
                  <td class="text-center"><?= $reservation['room']->type ?></td>
                  <td class="text-center"><?= $reservation['name'] ?></td>
                  <td class="text-center"><?= $reservation['email'] ?></td>
                  <td class="text-center"><?= $reservation['phone'] ?></td>
                  <td class="text-center"><?= $reservation['check_in'] ?></td>
                  <td class="text-center"><?= $reservation['check_out'] ?></td>
                  <td class="text-center"><?= $reservation['room_total'] ?></td>
                </tr>
              <?php endforeach ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  $(function() {
    $('#room-table').DataTable({})
  });
</script>
<?= $this->endSection() ?>