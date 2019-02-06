<div class="naujausias">

<?php
dsm($content);
      $img_uri = $content['product:field_images'][0]['#item']['uri'];
      $img = image_style_url('thumbnail', $img_uri);
      $nauj_img = file_create_url($img_uri);
?>

  <div class="img-wrapper" style="background-image:url(<?php print $img ?>)">
    <?php
      print l('', drupal_get_path_alias('node/'.$node->nid), array('attributes' => array('class' => array('image'))));
    ?>
  </div>

  <div class="text">
    <?php $nauj_title = $content['product:title_field'][0]['#markup']; ?>
    <div class="nauj-title">
      <a href="<?php print $node_url ?>" title="<?php print $nauj_title ?>"><?php print $nauj_title ?></a>
    </div>

    <div class="price">
      <?php print render($content['product:commerce_price']); ?>
    </div>
  </div>

</div>
