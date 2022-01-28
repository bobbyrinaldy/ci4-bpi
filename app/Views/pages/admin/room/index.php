<?= $this->extend('layouts/admin/_master') ?>

<?= $this->section('title') ?>
Daftar Tipe Kamar
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
      <div class="col align-items-center col d-flex justify-content-end mt-2 text-center">
        <a href="<?= route_to('room.create') ?>" class="btn btn-primary m-2">
          <span class="fas fa-plus"></span> Tambah
        </a>
      </div>
      <hr>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="room-table" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tipe</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Image</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data as $room) : ?>
                <tr>
                  <td class="text-center">
                    <?= $no++ ?>
                  </td>
                  <td class="text-center"><?= $room['type'] ?></td>
                  <td class="text-center"><?= $room['quantity'] ?></td>
                  <td class="text-center">
                    <img src="/<?= $room['image'] ?>" width="150" height="auto">
                  </td>
                  <td width="20%" class="text-center">
                    <a href="<?= route_to('room.edit', $room['id']) ?>" class="btn btn-warning">
                      <span class="fas fa-edit"></span>
                    </a>
                    <a href="<?= route_to('room.delete', $room['id']) ?>" class="btn btn-danger">
                      <span class="fas fa-trash"></span>
                    </a>
                  </td>
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