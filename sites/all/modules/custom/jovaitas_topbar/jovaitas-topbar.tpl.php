<?php

/**
 * @file
 * Template for jovaitas_topbar.
 */
?>

<div id="header_top_message">
  <?php print($content); ?>

  <?php if (is_shop_admin()) { ?>

    <a title="<?php echo t('Redaguoti'); ?>" href="<?php echo $edit_url; ?>" class="edit-link">
      <i class="fa fa-edit"></i>
    </a>

  <?php } ?>

</div>
