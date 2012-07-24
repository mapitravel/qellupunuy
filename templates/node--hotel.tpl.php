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
      <?php
		hide($content['field_htlbanner']);
		hide($content['field_langen']);
	?>
      <?php if(render($content['field_htlbanner'])) : ?>
      <div id="hotel-banner"> <img src="<?php print strip_tags(render($content['field_htlbanner'])); ?>" alt="<?php print $title;  ?>"  width="640" /> </div>
      <?php endif; ?>
      <div id="tour-bar">
        <div class="bar-reserva">
          <h5><?php print t('Book now!'); ?></h5>
          <a href="/sites/all/themes/qellupunuy/chats/chat.php" class="button action live-chat"><?php print t('Chat now!'); ?></a> <a href="http://media.perunoticias.net/html/skype.html" class="button no-action live-skype"><?php print t('Call us!'); ?></a> <a href="/reservas-hoteles-peru?hotel=<?php print ($node_url); ?>" class="button no-action"><?php print t('Book now!'); ?></a> </div>
        <div class="bar-social">
          <h5><?php print t('Share this hotel:') ?></h5>
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
    <?php if (block_get_blocks_by_region('similar')): ?>
    <div id="similar"> <?php print render(block_get_blocks_by_region('similar')); ?> </div>
    <?php endif; ?>
    <div class="fb-comments" data-href="<?php print $path; ?>" data-num-posts="5" data-width="635"></div>
  </div>
</div>
<!-- /.node --> 
