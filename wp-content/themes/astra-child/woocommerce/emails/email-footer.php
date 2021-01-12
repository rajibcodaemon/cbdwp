<?php
/**
 * Email Footer
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-footer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
				</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
            <td style="margin-top: 20px;">
                <nav style="background-color: #004463; padding: 10px 0; margin-top: 15px;">
                    <h5 style="color: #97adb7; margin: 0 0 10px 0; text-align: center;">Quick Links</h5>
                    <ul style="text-align: center; margin: 0; padding: 0;">
                        <li style="display: inline-block; list-style: none;"><a href="<?php echo get_home_url();?>/privacy-policy" style="display: block; padding: 0 15px; text-decoration: none; font-weight: normal; font-size: 13px; color: #fff;">Privacy Policy</a></li>
                        <li style="display: inline-block; list-style: none;"><a href="<?php echo get_home_url();?>/return-refund-policy" style="display: block; padding: 0 15px; text-decoration: none; font-weight: normal; font-size: 13px; color: #fff;">Refund Policy</a></li>
                        <li style="display: inline-block; list-style: none;"><a href="<?php echo get_home_url();?>/terms-of-service" style="display: block; padding: 0 15px; text-decoration: none; font-weight: normal; font-size: 13px; color: #fff;">Terms &amp; Conditions</a></li>
                    </ul>
                </nav>
                <p style="text-align: center; margin: 0; padding: 10px 0; color: #fff; font-size: 13px; border-top:1px solid #fff;">Copyright &copy; 2020</p>
            </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
