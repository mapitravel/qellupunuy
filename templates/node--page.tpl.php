<?php
 global $base_root;
 $path = $base_root . $node_url;
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div id="node-inner"> <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
    <?php print render($title_prefix); ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php print render($title_suffix); ?>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <div class="content"<?php print $content_attributes; ?>>
      <div id="tour-bar">
        <div class="bar-social">
          <h5><?php print t('Share:'); ?></h5>
          <ul>
            <li class="social">
              <g:plus action="share" annotation="bubble" height="15" href="<?php print $path; ?>"></g:plus>
            </li>
            <li class="social">
              <fb:like href="<?php print $path; ?>" send="false" layout="button_count" width="100" show_faces="false"></fb:like>
            </li>
            <li class="social"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php print $path; ?>" data-count="horizontal" data-via="Hoteles_Peru" data-lang="<?php print $GLOBALS['twlang']; ?>">Tweet</a></li>
          </ul>
        </div>
        <div class="bar-langs">
          <h5><?php print t('Also available in:'); ?></h5>
          <ul>
            <?php if(render($content['field_langen'])) : ?>
            <li><a href="<?php print strip_tags(render($content['field_langen'])); ?>"><img class="lang-en" src="http://media.perunoticias.net/images/iconos/flag-lang-en.png" /> <?php print $title; ?></a></li>
            <?php endif; ?>
            <?php if(render($content['field_br'])) : ?>
            <li><a href="<?php print strip_tags(render($content['field_br'])); ?>"><img class="lang-br" src="http://media.perunoticias.net/images/iconos/flag-lang-br.png" /> <?php print $title; ?></a></li>
            <?php endif; ?>
            <?php if(render($content['field_langes'])) : ?>
            <li><a href="<?php print strip_tags(render($content['field_langes'])); ?>"><img class="lang-es" src="http://media.perunoticias.net/images/iconos/flag-lang-es.png" /> <?php print $title; ?></a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
    </div>
    <div class="meta"> <?php print render($content['links']); ?> <?php print render($content['comments']); ?> </div>
    <div class="fb-comments" data-href="<?php print $path; ?>" data-num-posts="5" data-width="635"></div>
  </div>
</div>
<!-- /.node --> 
