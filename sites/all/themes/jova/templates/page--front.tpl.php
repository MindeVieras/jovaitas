  <div class="container-fluid">

    <?php include 'header.php'; ?>

    <div class="container"><?php print $messages; ?></div>

    <div class="container"><div id="main">

      <div id="content">

        <div class="slideshow">
          <?php
            print views_embed_view('slideshow', 'block');
          ?>
        </div>

        <div class="home-naujausi karusele">
          <?php
            $block = module_invoke('views','block_view', 'nauji-block');
            print '<h2 class="block-title">'.$block['subject'].'</h2>';
            print render($block['content']);
          ?>
        </div>

        <div class="home-akcijos karusele">
          <?php
            $block = module_invoke('views','block_view', 'akcijos-block');
            print '<h2 class="block-title">'.$block['subject'].'</h2>';
            print render($block['content']);
          ?>
        </div>

      </div>

      <?php include 'sidebar.php'; ?>

    </div></div>

    <?php include 'footer.php'; ?>

  </div>
