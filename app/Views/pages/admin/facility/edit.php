<?= $this->extend('layouts/admin/_master') ?>

<?= $this->section('title') ?>
Ubah Fasilitas Kamar
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <form action="<?= route_to('facility.update', $facility['id']) ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Tipe Kamar</label>

            <select name="room_id" id="room" class="form-control w-100">
              <option value="" selected disabled>Pilih Tipe Kamar</option>
              <?php foreach ($rooms as $room) : ?>
                <option value="<?= $room['id'] ?>" <?php if ($room['id'] == $facility['room_id']) {
                                                      echo 'selected';
                                                    }  ?>> <?= $room['type'] ?></option>
              <?php endforeach ?>
            </select>

            <?php if (isset(session()->getFlashdata('error')['room_id'])) : ?>
              <code><?= session()->getFlashdata('error')['room_id'] ?></code>
            <?php endif ?>
          </div>

          <div class="form-group">
            <label for="">Nama Fasilitas</label>
            <input name="name" type="text" class="form-control form-control-user" placeholder="Masukan nama fasilitas..." value="<?= $facility['name'] ?>">

            <?php if (isset(session()->getFlashdata('error')['name'])) : ?>
              <code><?= session()->getFlashdata('error')['name'] ?></code>
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
    $('#room').select2({
      theme: 'bootstrap4'
    })
  });
</script>
<?= $this->endSection() ?>