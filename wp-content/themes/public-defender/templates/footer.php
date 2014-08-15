<footer class="content-info" role="contentinfo">
    <!--<div class="container">-->
    <?php
    // Get Advocacy footer text
    $advocate_page = get_page_by_path('advocates');
    $advocacy_query = new WP_Query(array(
        'post_parent' => $advocate_page->ID,
        'name' => 'contact-us',
        'post_type' => 'page'
    ));
    $advocacy_contact = $advocacy_query->posts[0]->post_content;

    // Get Solicitors footer text
    $solicitors_page = get_page_by_path('solicitors');
    $solicitors_query = new WP_Query(array(
        'post_parent' => $solicitors_page->ID,
        'name' => 'contact-us',
        'post_type' => 'page'
    ));
    $solicitors_contact = $solicitors_query->posts[0]->post_content;

    // Left for legacy reasons
    if (has_nav_menu('footer_navigation')) :
    //wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav navbar-nav'));
    endif;
    ?>
    <section id="footer-newsletter" class="container">
        <div class="col-md-7">
            <h2>Newsletter</h2>
            Sign up to join our newsletter. Stay up-to-date by email.
        </div>
        <div class="col-md-5" id="newsletter-container">
            <div id="newsletter-scroll">
                <button id="newsletter-signup">Sign up for the newsletter</button>
                <div id="newsletter-form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-9">
                                <input class="form-control input-lg" type="email" name="email" id="email">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control input-lg" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="footer-contact" class="container">
        <div class="col-md-8">
            <h2>Contact Us</h2>
        </div>
        <div class="col-md-4">
            <h2>&nbsp;</h2>
        </div>
        <div class="col-md-4">
            <?php
            if (is_tree($advocate_page->ID)) {
                echo $advocacy_contact;
            } else {
                echo $solicitors_contact;
            }
            ?>
        </div>
        <div class="col-md-4">
            <?php
            if (is_front_page() || is_404()) {
                echo $advocacy_contact;
            }
            ?>
        </div>
        <div class="col-md-4 socicons">
            <!--<a href="https://twitter.com/publicdefenderservice"><span class="socicon">a</span><span class="twitter-handle">@publicdefenderservice</span></a>-->
        </div>
    </section>
    <!--</div>-->
</footer>

<script type="text/javascript">
    var emailStatus = "";

    jQuery(document).ready(function($) {
        $("#newsletter-signup").click(function() {
            $('#newsletter-scroll').animate({
                top: "-150px"
            }, 400);
        });
        $("#newsletter-form form").on('submit', function(e) {
            e.preventDefault();
            var email = $("#email").val();
            $.ajax({
                data: {action: 'newsletter_form', email: email},
                type: 'post',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                success: function(data) {
                    console.log(data);
                    emailStatus = data;
                    $('#newsletter-form form').bootstrapValidator('revalidateField', 'email');
                    if(emailStatus==1) {
                        $("#newsletter-form").html("<h4 style='padding-top: 10px'>Thank you!</h4>Your email address has been added to our distribution list.</p>");
                    }
                }
            });
        });
        $("#newsletter-form #email").on('input', function(e) {
            emailStatus = "";
            $('#newsletter-form form').bootstrapValidator('revalidateField', 'email');
        });
        $('#newsletter-form form').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                email: {
                    validators: {
                        emailAddress: {
                            message: 'The value is not a valid email address'
                        },
                        notEmpty: {
                            message: 'An email address is required'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                if (emailStatus === 'error-email-exists') {
                                    return {
                                        valid: false,
                                        message: 'That email address is already on the mailing list'
                                    };
                                }

                                return true;
                            }
                        }
                    }
                }
            }
        });
    });

</script>

<?php wp_footer(); ?>