<?php
 global $base_root;
?>

<div id="main">
  <div id="header">
    <div id="header-inner" class="container_16">
      <h2 id="logo"><a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>" rel="home"><span><?php print $site_name; ?></span></a></h2>
      <?php if ($site_slogan): ?>
      <?php print $site_slogan; ?>
      <?php endif; ?>
      <p id="header-mail"><?php print t('Ask and book tours 24/7:'); ?> <strong>hotelesperu@gmail.com</strong></p>
      <div id="menutop"> <?php print render($page['menutop']); ?> </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
  <!-- //#header -->
  
  <div id="main-container">
    <div id="content" class="container_16">
      <div id="sidebar" class="grid_5">
        <div id="sidebar-inner" class="region region-sidebar"> <?php print render($page['sidebar']); ?> </div>
      </div>
      <div id="main-content" class="grid_11">
        <div id="main-content-inner">
          <div id="content-header">
            <?php if ($title): ?>
            <?php print render($title_prefix); ?>
            <h1 class="title"><?php print $title; ?></h1>
            <?php print render($title_suffix); ?>
            <?php endif; ?>
          </div>
          <!-- /#content-header -->
          
          <div id="content-body">
            <?php if($messages || $page['help']) : ?>
            <div id="extras"> <?php print $messages; ?> <?php print render($page['help']); ?>
              <?php if ($action_links): ?>
              <ul class="action-links">
                <?php print render($action_links); ?>
              </ul>
              <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if ($tabs): ?>
            <div class="tabs"><?php print render($tabs); ?></div>
            <?php endif; ?>
            <?php print render($page['content']); ?> </div>
        </div>
      </div>
      <div class="clear"></div>
      <!-- //#content-body -->
      <div id="sharebar"><?php print render($page['sharebar']); ?></div>
    </div>
    
    <!-- //#content --> 
  </div>
  <div class="clear"></div>
  <!-- //#main-container -->
  <div id="footer">
    <div id="footer-inner" class="container_16 region region-footer"> <?php print render($page['footer']); ?> </div>
  </div>
</div>
