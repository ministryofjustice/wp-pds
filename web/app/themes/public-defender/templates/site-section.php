<?php

$title = array(
  'advocates' => 'PDS Advocacy Unit',
  'solicitors' => 'PDS Solicitors',
);

$section = get_site_section();

?>

<?php if ($section): ?>
  <div class="site-section">
    <?php echo $title[$section]; ?>
  </div>
<?php endif; ?>
