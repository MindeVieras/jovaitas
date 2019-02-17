  <div class="container-fluid">

    <?php include 'header.php'; ?>

    <div class="container"><?php print $messages; ?></div>

    <div class="container"><div id="main">

      <div id="main_preloader"></div>
      
      <div id="content">

        <div class="slideshow">
          <?php
            print views_embed_view('slideshow', 'block');
          ?>
        </div>

        <div class="home-naujausi karusele-wrapper">
          <?php
            $block = module_invoke('views','block_view', 'nauji-block');
            print '<header>';
            print '<h2 class="block-title">'.$block['subject'].'</h2>';
            print '<div class="karusele-arrows"></div>';
            print '</header>';
            print render($block['content']);
          ?>
        </div>

        <div class="home-akcijos karusele-wrapper">
          <?php
            $block = module_invoke('views','block_view', 'akcijos-block');
            print '<header>';
            print '<h2 class="block-title">'.$block['subject'].'</h2>';
            print '<div class="karusele-arrows"></div>';
            print '</header>';
            print render($block['content']);
          ?>
        </div>

      </div>

      <?php include 'sidebar.php'; ?>

    </div></div>

    <?php include 'footer.php'; ?>

  </div>
