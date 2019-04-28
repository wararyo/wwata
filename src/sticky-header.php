<div id="sticky-header" class="sticky-header" :class="{'is-shown':isShown}">
  <div class="sticky-header-inner">
    <span class="sticky-header-title"><?=get_the_title();?></span>
    <div class="share">
      <span>Share with:</span>
      <?php get_template_part('share'); ?>
    </div>
  </div>
</div>