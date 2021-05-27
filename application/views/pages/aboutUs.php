<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $style ?>
</head>

<style>
.pic {
  overflow: hidden;
  width: 150px;
  border-radius: 50%;
  margin: 0 auto 20px auto;
}
</style>
<body>
<?= $nav ?>

<section>
    <div class="container">
      <div class="row col-lg-12">
        <div class="col-lg-12">
          <div class="section-title" data-aos="fade-right">
            <h2>Team LEMO</h2>
            <p>Terdiri dari 4 programmer bijaksana nan tampan.</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row">

            <div style="border-radius:10px; background-color:#f1ca89;" class="col-lg-6">
              <div style="margin-top: 20px;">
                <div class="pic"><img src="<?= base_url('assets/img/coba.jpg') ?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Najim Rizky</h4>
                  <span>FullStack Developer</span>
                  <p>00000040113</p>
                  <div class="social">
                    <a href="https://github.com/najimRizky"><i class="fa fa-github"></i></a>
                    <a href="https://instagram.com/nazky_r"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/najim-rizky/"> <i class="fa fa-linkedin"></i> </a>
                  </div>
                </div>
              </div>
            </div>

            <div style="border-radius:10px; background-color:#e4bad4" class="col-lg-6">
              <div style="margin-top: 20px;">
                <div class="pic"><img src="<?= base_url('assets/img/bona.jpg') ?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Bonaventura Sanjaya</h4>
                  <span>FullStack Developer</span>
                  <p>00000038083</p>
                  <div class="social">
                    <a href="https://github.com/ayaayawae"><i class="fa fa-github"></i></a>
                    <a href="https://instagram.com/bonbonzay"><i class="fa fa-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div style="border-radius:10px; background-color:#fff5b7" class="col-lg-6 mt-4">
              <div style="margin-top: 20px;">
                <div class="pic"><img src="<?= base_url('assets/img/filbert.jpg') ?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Filbert Khouwira</h4>
                  <span>FullStack Developer</span>
                  <p>00000039724</p>
                  <div class="social">
                    <a href="https://github.com/filbert29"><i class="fa fa-github"></i></a>
                    <a href="https://www.facebook.com/filbert.khouwira.5"><i class="fa fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/filbertkhouwira/"><i class="fa fa-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div style="border-radius:10px; background-color:#00ead3" class="col-lg-6 mt-4">
              <div style="margin-top: 20px;">
                <div class="pic"><img src="<?= base_url('assets/img/farhan.png') ?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Mohamad Farhan</h4>
                  <span>UI/UX</span>
                  <p>00000037928</p>
                  <div class="social">
                    <a href="https://github.com/kejauhan"><i class="fa fa-github"></i></a>
                    <a href="https://twitter.com/farhaannmf"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.instagram.com/farhannmf_/"><i class="fa fa-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
  </section>

<?= $footer ?>
</body>
</html>