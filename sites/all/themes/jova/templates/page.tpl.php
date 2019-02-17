  <div class="container-fluid">

    <?php include 'header.php'; ?>

    <div class="container"><?php print $messages; ?></div>

    <div class="container"><div id="main">

      <div id="main_preloader"></div>
      
      <div id="content">

        <?php if($title || $breadcrumb): ?>
          <div id="content-top">
            <h1 class="title" id="page-title"><?php print $title; ?></h1>
            <?php print $breadcrumb; ?>
          </div>
        <?php endif; ?>

        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['content']); ?>
      </div>

      <?php include 'sidebar.php'; ?>

    </div></div>

    <?php include 'footer.php'; ?>

  </div>
