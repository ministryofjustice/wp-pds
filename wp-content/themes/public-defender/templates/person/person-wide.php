<?php

$name = get_sub_field('name');
$image = get_sub_field('photo');
$bio   = get_sub_field('biography');

?>

<div class="person person--wide row">
  <?php if (!empty($bio)): ?>
  <a href="<?php echo $bio['url']; ?>" title="See <?php echo esc_attr($name); ?>'s full profile">
  <?php endif; ?>

    <div class="col-sm-4">
      <img src="<?php echo $image['sizes']['advocate_slide_thumb']; ?>" alt="Photo of <?php echo esc_attr($name); ?>" class="person__photo">
    </div>
    <div class="col-sm-8">
      <div class="person__name"><?php the_sub_field('name'); ?></div>

      <?php if (!empty($bio)): ?>
        <div class="person__bio-link">
          <span class="faux-link">Full Profile</span>
        </div>
      <?php endif; ?>
    </div>

  <?php if (!empty($bio)): ?>
  </a>
  <?php endif; ?>
</div>
