<header id="main-header">

  <div class="header-top"><div class="container">

    <div class="head-top-left">
      <i class="fa fa-clock-o"></i> <?php print variable_get('site_name'); ?> <?php print variable_get('work_hours'); ?>
      <a class="tel-nr" href="tel:<?php print variable_get('phone_nr'); ?>"><i class="fa fa-phone"></i><?php print variable_get('phone_nr'); ?></a>
    </div>

    <div class="login-button">
    </div>
    <ul id="user-menu">
      <?php if ($user->uid) {?>
        <?php
          $userId = $user->uid;
          $userAlias = drupal_get_path_alias('user/'.$userId);
        //print('<pre>');print_r($user_links);print('</pre>');
        ?>

        <li><?php print l('<i class="fa fa-user"></i>Paskyra', $userAlias, array('html'=>true)); ?></li>
        <li><a href="<?php print $base_path . 'user/logout/'; ?>"><i class="fa fa-sign-out"></i>Atsijungti</a></li></ul>

      <?php } else { ?>
        <li><?php print l('<i class="fa fa-sign-in"></i>Prisijungti', '/user', array('html'=>true)); ?></li></ul>
      <?php } ?>


    <?php if ($secondary_menu): ?>
      <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu'), 'heading' => false)); ?>
    <?php endif; ?>

  </div></div>

  <div class="page-header container">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

    <div class="header-search">
      <?php
        $block = module_invoke('views', 'block_view', '-exp-display_products-page');
        print render($block['content']);
      ?>
    </div>

    <div class="header-cart">
      <?php
        $block = module_invoke('dc_ajax_add_cart', 'block_view', 'ajax_shopping_cart');
        print render($block['content']);
      ?>
    </div>

    <?php print render($page['header']); ?>

  </div>

</header>

<?php
  $block_top_bar = module_invoke('jovaitas', 'block_view', 'block_top_bar');
  print $block_top_bar['content'];
?>
