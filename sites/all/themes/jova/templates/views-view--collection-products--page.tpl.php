<?php

/**
 * @file
 * Collection taxonomy term view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 * - $collection_title: The collection term title
 * - $collection_image_url: The collection term image url, if any.
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?> clearfix">

  <div id="content-top">
    <div class="taxonomy-title"><?php print $collection_title; ?></div>

    <?php
      $lemp_tipas_block = module_invoke('facetapi', 'block_view', 'yBkM5ZZHOT0p1W4HBMtnZL1cd2N228FP');
      $xenon_tipas_block = module_invoke('facetapi', 'block_view', 'SNGBYwhKkSB9nDdde0LDrg07bLKTnzHM');
      $voltazas_block = module_invoke('facetapi', 'block_view', 'T9t8Jon7Rs1d7YUXCCn4R1WKUyk0eBpC');
    ?>

    <?php
      if (isset($lemp_tipas_block) || isset($xenon_tipas_block)) {
        print '<div class="filters">';
        print '<div class="filters-label">' . t('Filtruoti:') . '</div>';

        if (isset($lemp_tipas_block)) {
          print '<div data-dropdown="#lemp-tipas-filter" class="btn btn-danger">' . $lemp_tipas_block['subject'] . '</div>';
          print '<div class="dropdown-menu dropdown-anchor-left-center dropdown-has-anchor dark" id="lemp-tipas-filter">';
          print render($lemp_tipas_block['content']);
          print '</div>';
        }

        if (isset($xenon_tipas_block)) {
          print '<div data-dropdown="#xenon-tipas-filter" class="btn btn-danger">' . $xenon_tipas_block['subject'] . '</div>';
          print '<div class="dropdown-menu dropdown-anchor-left-center dropdown-has-anchor dark" id="xenon-tipas-filter">';
          print render($xenon_tipas_block['content']);
          print '</div>';
        }

        if (isset($voltazas_block)) {
          print '<div data-dropdown="#voltazas-filter" class="btn btn-danger">' . t('Voltažas') . '</div>';
          print '<div class="dropdown-menu dropdown-anchor-left-center dropdown-has-anchor dark" id="voltazas-filter">';
          print render($voltazas_block['content']);
          print '</div>';
        }

        print '</div>';
      }
    ?>

      <div class="active-filters">
        <?php
              $curr_srch_block = module_invoke('current_search', 'block_view', 'kickstart_search');
              print render($curr_srch_block['content']);
        ?>
      </div>

  </div>

  <?php if ($exposed): ?>
  <div class="view-filters">
    <?php print $exposed; ?>
  </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
  <div class="attachment attachment-before">
    <?php print $attachment_before; ?>
  </div>
  <?php endif; ?>

  <?php if ($rows): ?>
  <div class="products-container">
    <?php print $rows; ?>
  </div>
  <?php elseif ($empty): ?>
  <div class="view-empty">
    <?php print $empty; ?>
  </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>
