<?= $this->extend('layouts/admin/_master') ?>

<?= $this->section('title') ?>
Tambah Tipe Kamar
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <form action="<?= route_to('room.store') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Tipe Kamar</label>
            <input name="type" type="text" class="form-control form-control-user" placeholder="Masukan tipe kamar...">

            <?php if (isset(session()->getFlashdata('error')['type'])) : ?>
              <code><?= session()->getFlashdata('error')['type'] ?></code>
            <?php endif ?>
          </div>

          <div class="form-group">
            <label for="">Jumlah Kamar</label>
            <input name="quantity" type="number" class="form-control form-control-user" placeholder="Masukan jumlah kamar...">

            <?php if (isset(session()->getFlashdata('error')['quantity'])) : ?>
              <code><?= session()->getFlashdata('error')['quantity'] ?></code>
            <?php endif ?>
          </div>

          <div class="form-group">
            <label for="">Foto Kamar</label>
            <input name="image" type="file" class="form-control" style="padding: .2rem;" accept="image/*">

            <?php if (isset(session()->getFlashdata('error')['image'])) : ?>
              <code><?= session()->getFlashdata('error')['image'] ?></code>
            <?php endif ?>
          </div>

          <button type="reset" class="btn btn-secondary">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
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