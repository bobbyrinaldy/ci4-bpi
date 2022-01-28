<?= $this->extend('layouts/user/_master') ?>

<?= $this->section('content') ?>
<section class="tm-banner">
  <div class="tm-container-outer tm-banner-bg">
    <div class="container">

      <div class="row tm-banner-row tm-banner-row-header">
        <div class="col-xs-12">
          <div class="tm-banner-header">
            <p class="tm-banner-subtitle">We assist you to choose the best.</p>
          </div>
        </div> <!-- col-xs-12 -->
      </div> <!-- row -->
      <div class="row tm-banner-row" id="tm-section-search">

        <form action="<?= route_to('guess.reservation') ?>" method="post" class="tm-search-form tm-section-pad-2 mb-5" autocomplete="off">
          <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
              Data tidak lengkap, silahkan periksa kembali dan coba lagi.
            </div>
          <?php endif ?>
          <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
              <?= session()->getFlashdata('success') ?>
            </div>
          <?php endif ?>
          <div class="row justify-content-center">
            <div class="form-row tm-search-form-row justify-content-between">
              <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3 text-center">
                <label for="check_in">Tanggal Masuk</label>
                <input name="check_in" type="text" class="form-control border" id="check_in" placeholder="Check In">
              </div>
              <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3 text-center">
                <label for="check_out">Tanggal Keluar</label>
                <input name="check_out" type="text" class="form-control border" id="check_out" placeholder="Check Out">
              </div>

              <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3 text-center">
                <label for="qty">Jumlah Kamar</label>
                <input name="room_total" type="number" class="form-control border" placeholder="Jumlah Kamar" id="qty">
              </div>

              <div class="form-horizontal form-general w-100 m-4 d-none" id="form-order">
                <div class="">
                  <h2 class="mb-4" style="border-bottom: 1.5px solid #69c6ba;padding-bottom:10px">Form Pemesanan</h2>
                  <div class="form-group">
                    <label for="">Nama Pemesan</label>
                    <input type="text" class="form-control border" name="name" placeholder="Masukan Nama Pemesan...">
                  </div>

                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control border" name="email" placeholder="Masukan Email Pemesan...">
                  </div>

                  <div class="form-group">
                    <label for="">No. Handphone</label>
                    <input type="text" class="form-control border" name="phone" placeholder="Masukan No. Handphone...">
                  </div>

                  <div class="form-group">
                    <label for="">Nama Tamu</label> <small>(Optional)</small>
                    <input type="text" class="form-control border" name="guess_name" placeholder="Masukan Nama Tamu...">
                  </div>

                  <div class="form-group">
                    <label for="type">Tipe Kamar</label>
                    <select class="form-control border" name="room_id" id="type">
                      <option value="" disabled selected>Pilih Tipe Kamar</option>
                      <?php foreach ($rooms as $room) : ?>
                        <option value="<?= $room['id'] ?>"> <?= $room['type'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="justify-content-center align-items-center d-flex">
                    <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase col-4 mt-2" id="btn-submit">Pesan</button>
                  </div>

                </div>
              </div>
            </div>


            <button type="button" class="btn btn-primary tm-btn tm-btn-search text-uppercase col-4 mt-2" id="btn-order">Lanjutkan..</button>
          </div>
        </form>

      </div> <!-- row -->
      <div class="tm-banner-overlay"></div>
    </div> <!-- .container -->
  </div> <!-- .tm-container-outer -->
</section>

<section class="p-5 tm-container-outer tm-bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">
        <h2 class="text-uppercase mb-4">
          <strong>Tentang Kami</strong>
        </h2>
        <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque et sint excepturi voluptas porro fugiat nulla accusamus tenetur placeat eos ipsam, voluptates recusandae omnis totam adipisci quidem nostrum necessitatibus. Ipsa.</p>
        <!-- <a href="#" class="text-uppercase btn-primary tm-btn">Continue explore</a> -->
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  $(function() {
    $('select').select2({
      // theme: 'bootstrap4',
      // dropdownPosition: 'below'
    })
    var pickerCheckIn = datepicker('#check_in', {
      formatter: (input, date, instance) => {
        const value = date.toLocaleDateString()
        input.value = value // => '1/1/2099'
      }
    });
    var pickerCheckOut = datepicker('#check_out', {
      formatter: (input, date, instance) => {
        const value = date.toLocaleDateString()
        input.value = value // => '1/1/2099'
      }
    });
    $('#btn-order').click(function(e) {
      const check_in = $('#check_in').val();
      const check_out = $('#check_in').val();
      const qty = $('#qty').val();
      if (!check_in || !check_out || !qty) {
        swal('Form belum terisi, silahkan periksa kembali.')
      } else {
        $(this).addClass('d-none');
        $('#btn-submit').addClass('d-block');
        $('#form-order').toggleClass('d-block d-none')
      }

    });
  });
</script>

<?= $this->endSection() ?>