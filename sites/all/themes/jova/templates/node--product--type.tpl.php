<article class="node-product-type">

  <?php
    $node_prod = commerce_product_load($node->field_product['und'][0]['product_id']);
    $lang = $node_prod->language;
  ?>

  <div class="prod-img-popup">
    <?php    
      $prod_img_uri = $node_prod->field_images['und'];
      //sort($prod_img_uri, SORT_NUMERIC);
      foreach ($prod_img_uri as $prodimg) {
        print '<a href="'.image_style_url('fullhd', $prodimg['uri']).'" style="background-image:url('.image_style_url('large', $prodimg['uri']).')"></a>';
      }
    ?>
  </div>

  <div class="summary">
    <h2 class="title">
    <?php
      $org_title = $node_prod->title;
      print preg_replace('/\([^)]+\)/','',$org_title);
    ?>
    </h2>

    <div class="kodas"><?php print '<span>'.t('Kodas:').'</span>';print $node_prod->sku; ?></div>

    <div class="price">
      <?php
        $org_amount = $node_prod->commerce_price[$lang][0]['original']['amount'];
        $currency_code = $node_prod->commerce_price[$lang][0]['currency_code'];

        $org_price = commerce_currency_format($org_amount, $currency_code, $object = NULL, $convert = TRUE);
        
        if (!empty($node_prod->field_akcija)) {
          print '<div class="org-price"><del>'.$org_price.'</del></div>';
        }
        
        print render($content['product:commerce_price']);
      ?>
    </div>

    <div class="add-to-cart">
      <?php print render($content['field_product']);?>
    </div>

    <div class="details">
      <?php if(isset($node_prod->field_tipas)){
        print '<div class="detail"><span>'.t('Tipas:').'</span>'.$node_prod->field_tipas['und'][0]['value'].'</div>';
      }?>
      <?php if(isset($node_prod->field_tipas_lemp)){
        print '<div class="detail"><span>'.t('Tipas:').'</span>'.$node_prod->field_tipas_lemp['und'][0]['value'].'</div>';
      }?>
      <?php if(isset($node_prod->field_voltazas)){
        if ($node_prod->field_voltazas['und'][0]['value'] == 1){
          $volt_val = '12v';
        }
        if ($node_prod->field_voltazas['und'][0]['value'] == 2){
          $volt_val = '24v';
        }
        print '<div class="detail"><span>'.t('Voltažas:').'</span>'.$volt_val.'</div>';
      }?>
      <?php if(isset($node_prod->field_galingumas)){
        print '<div class="detail"><span>'.t('Galingumas:').'</span>'.$node_prod->field_galingumas['und'][0]['value'].' w</div>';
      }?>
      <?php if(isset($node->field_gamintojas['und'][0]['taxonomy_term'])){
        print '<div class="detail"><span>'.t('Gamintojas:').'</span>'.$node->field_gamintojas['und'][0]['taxonomy_term']->name.'</div>';
      }?>
    </div>
  
  </div>
  
  <div id="tabs">
    <ul class="tabs-tabs">
      <li class="tab"><a href="#aprasymas">Aprašymas</a></li>
      <li class="tab"><a href="#pristatymas">Pristatymas</a></li>
    </ul>

    <div id="aprasymas" class="tab-cont">
      <?php print $node->body['und'][0]['safe_value']; ?>
    </div>

    <div id="pristatymas" class="tab-cont">
              <?php
        global $user;
        if(in_array('administrator', $user->roles) || in_array('editor', $user->roles)){
          $nEdTitle = '<i class="fa fa-pencil"></i>';
          print l($nEdTitle, 'node/7/edit', array('attributes' => array('class' => array('node-edit-link')),'html' => TRUE));
        }
      ?>
      <?php
        $prist = node_load(7);
        print $prist->body['und'][0]['value'];
      ?>
    </div>
  </div>
  
  <div class="prist-info">
    <div class="pristatymas section"><i class="fa fa-truck"></i>
      <div class="title"><?php print t('Pristaytmas'); ?></div>
      <div class="text"><?php print variable_get('pristatymas'); ?></div>
    </div>
    <div class="siuntimas section"><i class="fa fa-clock-o"></i>
      <div class="title"><?php print t('Siuntimas'); ?></div>
      <div class="text"><?php print variable_get('siuntimas'); ?></div>
    </div>
  </div>

</article>
