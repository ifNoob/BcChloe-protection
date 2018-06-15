<?php
/*
Plugin Name: BcChloe Protection
Plugin URI: https://github.com/ifNoob/BcChloe-protection
Description: WordPress html not imgdrag | copy&paste | sourcecode | printscreen protection
Author: BcChloe
Author URI: https://bcchloe.jp
Text Domain: bcchloe-protection
Version: 1.1.1
License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

// Exit If Accessed Directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**==========================
* Define Constants
===========================*/
define( 'BC_PR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BC_PR_PLUGIN_URL', plugins_url( '' , __FILE__) );
//global $foo;

class BcChloe_Protection {

    protected $nonce_name = 'bcchloe_protection';
    protected $post_url = '';

		public $plugin_version = '1.1';

    public static function bcchloe_protection_init() {
        new self;
    }

	public function __construct() {
    add_action( 'init', array( &$this, 'bc_protection' ));
	}

/**-----------------
* Protection js output
-----------------*/
	function bc_protection() {
		if ( !is_user_logged_in() ) {
			wp_enqueue_style( 'bc-protection-drag', BC_PR_PLUGIN_URL . '/assets/css/bc-drag.css', array(), '', true );
			wp_enqueue_script( 'bc-protection-drag', BC_PR_PLUGIN_URL . '/assets/js/bc-img-drag.min.js' , array(), '', true );
			wp_enqueue_script( 'bc-protection-click', BC_PR_PLUGIN_URL . '/assets/js/bc-right-click.min.js' , array(), '', true );
			wp_enqueue_script( 'bc-protection-print', BC_PR_PLUGIN_URL . '/assets/js/bc-print.min.js' , array(), '', true );
			wp_enqueue_script( 'bc-protection-prtscr', BC_PR_PLUGIN_URL . '/assets/js/bc-prtscr.min.js' , array(), '',true );
		}
	}	// bc_protection

}	// End BcChloe_Protection

if ( class_exists( 'BcChloe_Protection' ) ) {
	new BcChloe_Protection();
}

?>
