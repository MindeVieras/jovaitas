<div id="footer">
  <div class="container">
    <div class="footer-nav">

      <div class="column">
        <h4><?php print t('Kontaktai'); ?></h4>
        <ul class="footer-kontaktai">
          <li><i class="fa fa-location-arrow"></i><span>
            <?php print variable_get('shop_address'); ?>
          </span></li>
          <li><i class="fa fa-phone"></i><span>
            <a href="tel:<?php print variable_get('phone_nr'); ?>"><?php print variable_get('phone_nr'); ?></a>
            <a href="tel:<?php print variable_get('phone_nr1'); ?>"><?php print variable_get('phone_nr1'); ?></a>
          </span></li>
          <li><i class="fa fa-envelope"></i><span>
            <a href="mailto:<?php print variable_get('email_addr'); ?>"><?php print variable_get('email_addr'); ?></a>
            <a href="mailto:<?php print variable_get('email_addr1'); ?>"><?php print variable_get('email_addr1'); ?></a>
          </span></li>
        </ul>
      </div>

      <?php
       $footer_nav = menu_tree_all_data('menu-footer-navigation');
       foreach ($footer_nav as $head_link) {
          print '<div class="column">';
          print '<h4>'.$head_link['link']['link_title'].'</h4>';
          print '<ul class="footer-nav-list">';
          foreach ($head_link['below'] as $link) {
            $foot_link_alias = drupal_get_path_alias($link['link']['link_path']);
            print '<li>'.l($link['link']['link_title'], $foot_link_alias).'</li>';
          }
          print '</ul></div>';
       }
      ?>

      <?php
       $footer_nav = menu_tree_all_data('menu-footer-information');
       foreach ($footer_nav as $head_link) {
          print '<div class="column">';
          print '<h4>'.$head_link['link']['link_title'].'</h4>';
          print '<ul class="footer-nav-list">';
          foreach ($head_link['below'] as $link) {
            $foot_link_alias = drupal_get_path_alias($link['link']['link_path']);
            print '<li>'.l($link['link']['link_title'], $foot_link_alias).'</li>';
          }
          print '</ul></div>';
       }
      ?>

      <div class="column">
        <?php
          $payment_title = menu_load('menu-payment-methods');
          $payment_links = menu_load_links('menu-payment-methods');
          print '<h4>'.$payment_title['title'].'</h4><ul class="footer-pay-list">';
          foreach ($payment_links as $pay_link) {
            $pay_link_class = $pay_link['options']['attributes']['class'][0];
            $pay_title = $pay_link['link_title'];
            print '<li><i class="fa fa-'.$pay_link_class.'"></i><a href="' .  $base_path . strtolower($pay_title) . '"><span>'.$pay_title.'</span></a></li>';
          }
          print '</ul>';
        ?>
      </div>
    </div>
  </div>

  <div class="container">
    <?php print render($page['footer']); ?>
  </div>

  <div id="footer-bottom"><div class="container">
    <div class="site-info"><?php print date('Y');?> &copy Jovaitas.lt</div>
    <div class="site-address"><i class="fa fa-map-marker"></i> <?php print variable_get('shop_address');?></div>
  </div></div>

</div>

<a href="" id="scroll-to-top"></a>
