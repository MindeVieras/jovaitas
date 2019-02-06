
<div id="sidebar-first"><div class="inner">

<!--   <div class="block"> -->
<!--     <?php
      $cat_menu_title = menu_load('menu-kategorijos');
      print '<h2>'.$cat_menu_title['title'].'</h2>';
    ?> -->
<!--     <div id="cat-acc"> -->
<!--       <?php
        $cat_menu = menu_tree_all_data('menu-kategorijos');
        foreach ($cat_menu as $cat) {
          $cat_alias = drupal_get_path_alias($cat['link']['link_path']);
          print '<div class="kat-wrapper"><h3>'.l($cat['link']['link_title'], $cat_alias).'</h3>';
          print '<div><ul class="cat-list">';
          foreach ($cat['below'] as $cat_link) {
            $cat_link_alias = drupal_get_path_alias($cat_link['link']['link_path']);
            print '<li>'.l($cat_link['link']['link_title'], $cat_link_alias).'</li>';
          }
          print '</ul></div></div>';
        }
      ?> -->
<!--     </div>
  </div> -->

  <?php print render($page['sidebar_first']); ?>

</div></div>