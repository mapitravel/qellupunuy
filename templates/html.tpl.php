<?php
	global $base_root;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
		xml:lang="<?php print $language->language; ?>" 
        version="XHTML+RDFa 1.0" 
        dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>
        xmlns:og="http://ogp.me/ns#">
<head profile="<?php print $grddl_profile; ?>">
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php print $styles; ?><?php print $scripts; ?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript">
  window.___gcfg = {lang: '<?php print $GLOBALS['gplang']; ?>'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</head>
<body class="<?php print $classes; ?> <?php print 'banner-' . $language->language; ?>" <?php print $attributes;?>>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
      FB.init({appId: '<?php print theme_get_setting('fb:app_id'); ?>', status: true, cookie: true,
               xfbml: true});
    };
    (function() {
      var e = document.createElement('script'); e.async = true;
      e.src = document.location.protocol +
        '//connect.facebook.net/<?php print $GLOBALS['fblang']; ?>/all.js';
      document.getElementById('fb-root').appendChild(e);
    }());
  </script> 
<?php print $page_top; ?> <?php print $page; ?> <?php print $page_bottom; ?>
</body>
</html>
