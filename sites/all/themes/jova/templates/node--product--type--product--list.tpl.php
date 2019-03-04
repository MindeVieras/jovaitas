
<div class="prod-block">

<?php
  if (isset($node->field_product['und'])){
      $list_prod_node = $node->field_product['und'][0]['product_id'];
  }
  if (isset($node->field_product[0])){
      $list_prod_node = $node->field_product[0]['product_id'];
  }

  $list_prod = commerce_product_load($list_prod_node);
  $lang = $list_prod->language;
  $img_uri = $list_prod->field_images[$lang][0]['uri'];
  $img = image_style_url('large', $img_uri);
  $prod_list_link = drupal_get_path_alias('node/'.$node->nid);
?>

  <div class="image" style="background-image:url(<?php print $img;?>)">
  	<?php
      if (isset($list_prod->commerce_price[$lang][0]['original'])){
        if (($list_prod->commerce_price[$lang][0]['original']['amount']) != ($list_prod->commerce_price[$lang][0]['amount'])) {
          print '<div class="atpigo">'.t('Akcija').'</div>';
        }
      }
      $nauja_preke = $node->created;
      if ((time()-(6*24*60*60)) < $nauja_preke){
        print '<div class="nauja">Nauja!</div>';
      }
      print l('', $prod_list_link, array('attributes' => array('class' => array('prod-list-img')), 'html' => true));

  	?>
  </div>

  <div class="bottom">

    <div class="title">
      <?php
        $org_list_title = preg_replace('/\([^)]+\)/','',$list_prod->title);
        print l($org_list_title, $prod_list_link);
      ?>
    </div>

    <div class="price">
      <?php
        if (isset($list_prod->commerce_price[$lang][0]['original']['amount'])){
          $org_amount = $list_prod->commerce_price[$lang][0]['original']['amount'];
          $currency_code = $list_prod->commerce_price[$lang][0]['currency_code'];
          $org_price = commerce_currency_format($org_amount, $currency_code, $object = NULL, $convert = TRUE);
        } else {
          $org_price = '';
        }

        
        if (isset($list_prod->commerce_stock)){
          if ($list_prod->commerce_stock[$lang][0]['value'] == 0){
             $list_prod_instock = false;
          } else {
            $list_prod_instock = true;
          }
        }

        if (!empty($list_prod->field_akcija)) {
          print '<div class="org-price"><del>'.$org_price.'</del></div>';
        }

        print render($content['product:commerce_price']);

      ?>
    </div>

    <?php if ($list_prod_instock == true) {
        print '<div class="add-to-cart">'.render($content['field_product']).'</div>';
      } else {
        print '<div class="no-stock"><i class="fa fa-ban"></i></div>';
      }
    ?>

  </div>

</div>
