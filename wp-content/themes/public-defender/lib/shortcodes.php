<?php

/**
 * Custom shortcodes for this theme are defined here.
 */

function sc_solicitors_offices($atts) {
  ob_start();
  template_part('templates/shortcodes/solicitors_offices', compact('atts'));
  return ob_get_clean();
}
add_shortcode('solicitors_offices', 'sc_solicitors_offices');
