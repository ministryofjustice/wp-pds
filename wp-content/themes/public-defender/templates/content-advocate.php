<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <a class="download-cv" href="<?= get_metadata('post', get_the_ID(), 'advocate-cv', true) ?>">
        Download CV
      </a>
    </header>
    <div class="entry-content">
      <?= get_field("general"); ?>
    </div>
    <?php if(get_field("advisory")): ?>
    <div class="entry-content">
      <h2>Advisory</h2>
      <?= get_field("advisory"); ?>
    </div>
    <?php endif; ?>
    <?php if(get_field("expertise")): ?>
    <div class="entry-content">
      <h2>Expertise</h2>
      <?= get_field("expertise"); ?>
    </div>
    <?php endif; ?>
    <?php if(have_rows('notable_cases')): ?>
    <div class="entry-content">
      <h2>Notable Cases</h2>
      <p>Set out below is a selection of cases in which <?= get_the_title(); ?> has been involved, but it should not be
regarded as exhaustive.</p>
      <?php while(have_rows('notable_cases')): the_row(); ?>
      <h3><?= get_sub_field('specialism'); ?></h3>
      <?= get_sub_field('cases'); ?>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
    <?php if(get_field("notes")): ?>
    <div class="entry-content">
      <h2>To note</h2>
      <?= get_field("notes"); ?>
    </div>
    <?php endif; ?>
    <div class="entry-content advocate-contact">
      <h2>Contact Details</h2>
      <div class="row">
        <div class="col-md-6">
          <p>Robin Driscoll, Senior Clerk<br />
          Public Defender Service Advocacy Unit<br />
          Business Suite, Ground Floor<br />
          102 Petty France<br />
          London<br />
          SW1H 9AJ<br />
          DX: 328 London</p>
        </div>
        <div class="col-md-6">
          <p>Inquiries to Robin Driscoll, Senior Clerk<br />
          <strong>Telephone:</strong> 020 3334 4253<br />
          <strong>Mobile:</strong> 07468 709022<br />
          <strong>Email:</strong> pdsclerks@legalaid.gsi.gov.uk<br />
          <strong>Website:</strong> http://publicdefenderservice.org.uk</p>
        </div>
      </div>
      <p>Offices in Cardiff, Swansea, Pontypridd, Cheltenham, Darlington &amp; London.<br />
      Available to meet solicitors and clients at any convenient location.</p>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
