<?= $this->extend('layouts/user/_master') ?>

<?= $this->section('content') ?>
<section class="tm-banner">
  <div class="tm-container-outer tm-banner-bg" style="min-height: 10vh;">
    <div class="container">

      <div class="row tm-banner-row tm-banner-row-header">
        <div class="col-xs-12">
          <div class="tm-banner-header">
            <p class="tm-banner-subtitle">Here is our awesome facilities</p>
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
          <strong>Hotel Facilities</strong>
        </h2>

        <div class="row">
          <?php foreach ($hotels as $room) : ?>
            <div class="col-4">
              <div class="thumbnail">
                <a href="/<?= $room['image'] ?>" target="_blank">
                  <img src="/<?= $room['image'] ?>" alt="Lights" style="width:100%">
                  <div class="caption mt-2">
                    <h4><?= $room['name'] ?></h4>
                  </div>
                </a>
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