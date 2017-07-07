<?php

$breadcrumbs = new Roots_Breadcrumbs();
$crumbs = $breadcrumbs->get_crumbs();

?>

<nav class="page-breadcrumbs">
  <ol class="breadcrumb">
    <li class="breadcrumb__label">You are here:</li>
    <?php
    $current = array_pop($crumbs);
    ?>
    <?php foreach ($crumbs as $crumb): ?>
      <li><a href="<?php echo esc_attr($crumb['url']); ?>"><?php echo $crumb['title']; ?></a></li>
    <?php endforeach; ?>
    <li class="active"><?php echo $current['title']; ?></li>
  </ol>
</nav>
