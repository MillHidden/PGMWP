<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PureGameMedia
 */
// this can live in /themes/mytheme/functions.php, or maybe as a dev plugin?
?>



    <div class="row">
      <div id="resetPassword">
            <div id="message"></div>
            <!--this check on the link key and user login/username-->
            <?php
                $errors = new WP_Error();
                $user = check_password_reset_key($_GET['key'], $_GET['login']);
         
                if ( is_wp_error( $user ) ) {
                    if ( $user->get_error_code() === 'expired_key' )
                        $errors->add( 'expiredkey', __( 'Cette clef a expiré, merci de recommencer l\'opération.' ) );
                    else
                        $errors->add( 'invalidkey', __( 'Cette clef ne semble pas valide.' ) );
                }
         
                // display error message
                if ( $errors->get_error_code() )
                    echo $errors->get_error_message( $errors->get_error_code() );
                ?>
         
            <form id="resetPasswordForm" method="post" autocomplete="off" action="reset">
                <?php
                    // this prevent automated script for unwanted spam
                    if ( function_exists( 'wp_nonce_field' ) ) 
                        wp_nonce_field( 'ajax-reset-password-nonce', 'resetpasswordsecurity' );
                ?>
                
                <input type="hidden" name="user_key" id="user_key" value="<?php echo esc_attr( $_GET['key'] ); ?>" autocomplete="off" />
                <input type="hidden" name="user_login" id="user_login" value="<?php echo esc_attr( $_GET['login'] ); ?>" autocomplete="off" />

                <p>
                    <label for="pass1"><?php _e('New password') ?><br />
                    <input type="password" name="pass1" id="pass1" class="input" size="20" value="" autocomplete="off" /></label>
                </p>
                <p>
                    <label for="pass2"><?php _e('Confirm new password') ?><br />
                    <input type="password" name="pass2" id="pass2" class="input" size="20" value="" autocomplete="off" /></label>
                </p>

                <p class="description indicator-hint"><?php _e('Astuce: Un mot de passe devrait contenir au moins 7 charactères. Pour le rendre encore plus sûr, utilisez des lettres majuscules et minuscules, des nombres et des symboles comme ! " ? $ % ^ &amp; ).'); ?></p>

                <br class="clear" />
                
                <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Reset Password'); ?>" />
                    
                </p>
            </form>
        </div>
    </div>
  
    
