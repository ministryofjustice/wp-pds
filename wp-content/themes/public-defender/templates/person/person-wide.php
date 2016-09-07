<div class="person person--wide row">
  <?php if ($profile_link): ?>
  <a href="<?php echo $profile_link; ?>" title="See <?php echo esc_attr($name); ?>’s full profile">
  <?php endif; ?>

    <div class="col-sm-4 col-xs-6">
      <img src="<?php echo $image['sizes']['advocate_slide_thumb']; ?>" alt="Photo of <?php echo esc_attr($name); ?>" class="person__photo">
    </div>
    <div class="col-sm-8 col-xs-6">
      <div class="person__name"><?php echo $name; ?></div>

      <?php if (!empty($summary)): ?>
        <div class="person__summary"><?php echo $summary; ?></div>
      <?php endif; ?>

      <?php if ($profile_link): ?>
        <div class="person__bio-link">
          <span class="faux-link">Full Profile</span>
        </div>
      <?php endif; ?>
    </div>

  <?php if ($profile_link): ?>
  </a>
  <?php endif; ?>
</div>
