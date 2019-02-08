
<div id="header_top_message">
  <?php print($content); ?>

  <?php if (is_shop_admin()) { ?>
      
    <a title="Redaguoti" href="<?php print($edit_url); ?>" class="edit-link"><i class="fa fa-edit"></i></a>
    
  <?php } ?>

</div>
