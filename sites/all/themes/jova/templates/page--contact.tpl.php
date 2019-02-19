<div class="container-fluid">

    <?php include 'header.php'; ?>

    <div class="container"><?php print $messages; ?></div>

    <div class="container"><div id="main">

      <div id="main_preloader"></div>
      
      <div id="content">

        <?php if($title || $breadcrumb): ?>
          <div id="content-top">
            <h1 class="title" id="page-title"><?php print $title; ?></h1>
            <?php print $breadcrumb; ?>
          </div>
        <?php endif; ?>

        <div class="content">

          <div class="contacts">

            <div class="conts-block">
              <i class="fa fa-location-arrow"></i>
              <div class="inner">
                <h3><?php print t('Adresas');?></h3>
                <p><?php print variable_get('shop_address'); ?></p>
              </div>
            </div>

            <div class="conts-block">
              <i class="fa fa-phone"></i>
              <div class="inner">
                <h3><?php print t('Telefonas');?></h3>
                <p><?php print variable_get('phone_nr'); ?></p>
                <p><?php print variable_get('phone_nr1'); ?></p>
              </div>
            </div>

            <div class="conts-block">
              <i class="fa fa-fax"></i>
              <div class="inner">
                <h3><?php print t('Faksas');?></h3>
                <p><?php print variable_get('fax_nr'); ?></p>
                <p><?php print variable_get('fax_nr1'); ?></p>
              </div>
            </div>

            <div class="conts-block">
              <i class="fa fa-envelope"></i>
              <div class="inner">
                <h3><?php print t('El. paštas');?></h3>
                <p><?php print variable_get('email_addr'); ?></p>
                <p><?php print variable_get('email_addr1'); ?></p>
              </div>
            </div>

          </div>

          <div class="cont-form-wrapper">
            <h2><?php print t('Parašykite mums'); ?></h2>
            <?php print render($page['content']); ?>

            <img src="<?php print path_to_theme(); ?>/images/pastatas.jpg" />
          
          </div>
        
        </div>


      </div>

      <?php include 'sidebar.php'; ?>

    </div></div>

    <div id="map"></div>

    <?php include 'footer.php'; ?>

  </div>


<script>
  function initMap() {
    var contLatLng = {lat: 54.931091, lng: 23.967370};
    var mapDiv = document.getElementById('map');
    var map = new google.maps.Map(mapDiv, {
        center: contLatLng,
        scrollwheel: false,
        zoom: 14
    });
    var marker = new google.maps.Marker({
      map: map,
      position: contLatLng,
      title: 'Jovaitas'
    });
  }
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_9j8GALirmOkHDv2rDqrL-Nqqm2coZHA&callback=initMap">
</script>
