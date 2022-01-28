<?= $this->extend('layouts/user/_master') ?>

<?= $this->section('content') ?>
<section class="tm-banner">
  <div class="tm-container-outer tm-banner-bg" style="min-height: 10vh;">
    <div class="container">

      <div class="row tm-banner-row tm-banner-row-header">
        <div class="col-xs-12">
          <div class="tm-banner-header">
            <p class="tm-banner-subtitle">Our best room is available for you.</p>
          </div>
        </div> <!-- col-xs-12 -->
      </div> <!-- row -->
      <div class="row tm-banner-row" id="tm-section-search">

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
          <strong>Guess Rooms</strong>
        </h2>

        <div class="row">
          <?php foreach ($rooms as $room) : ?>
            <div class="col-4">
              <div class="thumbnail">
                <a href="/<?= $room['image'] ?>" target="_blank">
                  <img src="/<?= $room['image'] ?>" alt="Lights" width="200" height="100">
                  <div class="caption mt-2">
                    <h4><?= $room['type'] ?></h4>
                    <p>(<?= $room['quantity'] ?> Kamar)</p>
                  </div>
                </a>
              </div>
              <div class="text-left mt-3">
                <h6>
                  <strong>Fasilitas Kamar :</strong>
                </h6>
                <ul style="line-height: 2rem;">
                  <?php foreach ($room['facilities'] as $facility) : ?>
                    <li style="margin-left: -15px"><?= $facility->name ?></li>
                  <?php endforeach ?>
                </ul>


              </div>

            </div>
          <?php endforeach ?>

        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  $(function() {

  });
</script>

<?= $this->endSection() ?>