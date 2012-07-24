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
      <div id="main-content" class="grid_16">
        <div id="main-content-inner">
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
            <!-- -->
            <div id="home-main" class="grid_12 alpha">
              <div id="welcome"><?php print render($page['welcome']); ?></div>
              <div class="clear"></div>
              <?php print render($page['homemain']); ?>
              <div class="clear"></div>
              <div id="home-left" class="grid_6 alpha"> <?php print render($page['homeleft']); ?> </div>
              <div id="home-right" class="grid_6 omega"> <?php print render($page['homeright']); ?> </div>
            </div>
            <div id="home-bar" class="grid_4 omega"> <?php print render($page['homebar']); ?> </div>
            <!-- -->
            <div class="clear"></div>
          </div>
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
