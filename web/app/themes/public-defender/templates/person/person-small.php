<?php

$col_width_defaults = array(
  'sm' => 3,
  'xs' => 6,
);

if (isset($col_width)) {
  $col_width = array_merge($col_width_defaults, $col_width);
}
else {
  $col_width = $col_width_defaults;
}

$classes = array();
$classes[] = 'person';
$classes[] = 'person--small';
foreach ($col_width as $bp => $size) {
  $classes[] = "col-{$bp}-{$size}";
}

?>
<div class="<?php echo implode(' ', $classes); ?>">
  <?php if ($profile_link): ?>
  <a href="<?php echo $profile_link; ?>" title="See <?php echo esc_attr($name); ?>’s full profile">
  <?php endif; ?>

    <?php

    $img = '<img src="' . $image['sizes']['person-small'] . '" alt="Photo of ' . esc_attr($name) . '" class="person__photo">';
    $img_meta = wp_get_attachment_metadata($image['ID']);
    $attachment_id = $image['ID'];
    echo wp_image_add_srcset_and_sizes($img, $img_meta, $attachment_id);

    ?>

    <div class="person__name"><?php echo $name; ?></div>

    <?php if (!empty($summary)): ?>
      <div class="person__summary"><?php echo $summary; ?></div>
    <?php endif; ?>

    <?php if ($profile_link): ?>
      <div class="person__bio-link">
        <span class="faux-link">Full Profile</span>
      </div>
    <?php endif; ?>

  <?php if ($profile_link): ?>
  </a>
  <?php endif; ?>
</div>
