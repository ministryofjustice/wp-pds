<?php

$name = get_sub_field('name');
$image = get_sub_field('photo');
$bio   = get_sub_field('biography');

?>

<div class="person person--small col-sm-3 col-xs-6">
  <?php if (!empty($bio)): ?>
  <a href="<?php echo $bio['url']; ?>" title="See <?php echo esc_attr($name); ?>'s full profile">
  <?php endif; ?>

    <img src="<?php echo $image['sizes']['advocate_slide_thumb']; ?>" alt="Photo of <?php echo esc_attr($name); ?>" class="person__photo">
    <div class="person__name"><?php the_sub_field('name'); ?></div>
    
    <?php if (!empty($bio)): ?>
      <div class="person__bio-link">
        <span class="faux-link">Full Profile</span>
      </div>
    <?php endif; ?>

  <?php if (!empty($bio)): ?>
  </a>
  <?php endif; ?>
</div>
