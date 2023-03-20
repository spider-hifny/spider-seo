<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://spiderseo.co
 * @since             1.0.0
 * @package           Spider SEO
 *
 * @wordpress-plugin
 * Plugin Name:       Spider SEO
 * Plugin URI:        https://spiderseo.co
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Spider SEO
 * Author URI:        https://spiderseo.co/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       spider SEO
 * Domain Path:       /languages
 */

define('SPIDER_SEO_URL', plugins_url('', __FILE__));
define('SPIDER_SEO_LOCAL', dirname(__FILE__));
include( dirname( __FILE__ ) . '/admin-page-framework.php' );
include_once(ABSPATH . 'wp-includes/pluggable.php');
include_once(SPIDER_SEO_LOCAL . '/api/functions.php');
include_once(SPIDER_SEO_LOCAL . '/api/siteToServer.php');
include_once(SPIDER_SEO_LOCAL . '/api/serverToSite.php');
include_once(SPIDER_SEO_LOCAL . '/api/routes.php');

if ( ! class_exists( 'SpiderSEOAdminPageFramework' ) ) {
	return;
}

class SpiderSEO extends SpiderSEOAdminPageFramework {
	const VERSION = '1.0.0';
	const NAME = 'Spider SEO';
	const DESCRIPTION = 'Facilitates WordPress plugin and theme development.';
	const URI = 'https://spiderseo.co';
	const AUTHOR = 'Spider SEO';
	const AUTHOR_URI = 'https://spiderseo.co';
	const COPYRIGHT = 'Copyright (c) 2013-2022, Spider SEO';
	const LICENSE = 'MIT <https://opensource.org/licenses/MIT>';
	const CONTRIBUTORS = '';
	/**

	* Sets up pages. 

	*/

	public function setUp() {
		$current_user = wp_get_current_user();

		$this->setRootMenuPage( 'Spider SEO' ,plugins_url( 'assets/image/sidebar-spiderseo-logo.svg', __FILE__ )	,10); 

		$this->addSubMenuItem(

			array(

				'title'     => 'General',

				'page_slug' => 'spider_seo_general'

			)

		);
		$this->addSubMenuItem(

			array(

				'title'     => 'Settings',

				'page_slug' => 'spider_seo_settings'

			)

		);
		$this->addSubMenuItem(

			array(

				'title'     => 'Connect',

				'page_slug' => 'spider_seo_connect'

			)

		);
		
		$this->addInPageTabs(
			'spider_seo_settings', // sets the target page slug
			array(
				'tab_slug'  => 'general',
				'title'     => __( 'General', 'spider-seo-framework-loader' ),
			),
			array(
				'tab_slug'  => 'sync',
				'title'     => __( 'Sync', 'spider-seo-framework-loader' ),
			)
		);
		$this->addSettingSections(    
            array(
				'section_id'    => 'general_section',
				'tab_slug'      => 'general',
				'title'         => 'General',
				'description'   => __('Spider SEO account Data',''),
				'order'         => 1,
			),
			array(
				'section_id'    => 'sync_section',
				'tab_slug'      => 'sync',
				'title'         => 'Sync Data',
				'description'   => 'These are text type fields.',
				'order'         => 1,
            )
        );

		$this->addSettingFields(
			array(
				'field_id'              => 'post_types_to_sync',
				'title'                 => __( 'Posts to sync', 'spider-seo-framework-loader' ),
				'type'                  => 'posttype',
				'section_id'    		=>'sync_section',
				'query'                 => array(
					'public'   => true,
					// '_builtin' => true,
				),
				'select_all_button'     => True,
				'select_none_button'    => True,
				'operator'              => 'and',
				'slugs_to_remove'       => array('Media','revisions'),
			),
			array(    
                'field_id'      => 'submit',
                'type'          => 'submit',
            )
		);
        $this->addSettingFields(
			array(    
                'field_id'      => 'name',
				'page_slug'		=> 'spider_seo_general',
                'section_id'    => 'general_section',
				'title'         => __( 'Company Name', 'spider-seo-framework-loader' ),
                'type'          => 'text',
                'default'       => $current_user->display_name,
				'attributes'        => array(
					'size' => 50,
					'style' => 'float:right; clear:none; display: inline;',
					'placeholder'   =>  __( 'Spider SEO Company.', 'spider-seo-framework-loader' ),
				),
            ),
			array(    
                'field_id'      => 'domain',
                'section_id'    => 'general_section',
				'title'         => __( 'Domain', 'spider-seo-framework-loader' ),
                'type'          => 'text',
				'default'		=> get_site_url(),
				'attributes'        => array(
					'size' => 50,
					'placeholder'   =>  __( 'http://spiderseo.co', 'spider-seo-framework-loader' ),
				),
            ),
			array(    
                'field_id'      => 'your_email',
                'section_id'    => 'general_section',
				'title'         => __( 'Your Email', 'spider-seo-framework-loader' ),
                'type'          => 'email',
                'default'       => $current_user->user_email,
            ),
			array(    
                'field_id'      => 'first_name',
                'section_id'    => 'general_section',
                'title'         => __( 'First Name', 'spider-seo-framework-loader' ),
                'type'          => 'text',
                'default'       => $current_user->user_firstname,
            ),
			array(    
                'field_id'      => 'last_name',
                'section_id'    => 'general_section',
				'title'         => __( 'Last Name', 'spider-seo-framework-loader' ),
                'type'          => 'text',
                'default'       => $current_user->user_lastname,
            ),
			array(    
                'field_id'      => 'password',
                'section_id'    => 'general_section',
				'title'         => __( 'Password', 'spider-seo-framework-loader' ),
                'type'          => 'text',
                'default'       => '',
            ),
			array(    
                'field_id'      => 'submit',
                'type'          => 'submit',
            )
        );
	}

	public function do_spider_seo_general() {

		?>

		<h1>Spider SEO</h1>

		<h3>You have just 3 step to use our service</h3>
		<ol>
			<li>
				go to the settings tap and configure your spider SEO account
			</li>
			<li>
				go select syncable items you need to sync
			</li>
			<li> 
				visit your <a href="http://portal.spiderseo.co">Spider SEO portal</a> 
			</li>
			<li>
				enjoy your time and leave your website to our profitional team
			</li>
		</ol>

		<?php   

	}
	public function do_spider_seo_connect() {

		?>

		<h1>Spider SEO Cloud Connection</h1>
		<h2>finaly you can handover your website data to our expert</h2>
		<h3>by clicking on sync button you gonna have:</h3>
		<ol>
			<li>
				new account on Spider SEO platform 
				<?php if( SpiderSEOAdminPageFramework::getOption( 'SpiderSEO',['general_section','password'] ) ): ?>
					<small class="text-green">
						You can check your  
						<a href="<?=get_site_url()?>/wp-admin/admin.php?page=spider_seo_settings">account Data</a>
					</small>
				<?php else:?>
					<small class="text-red">
						you have not finished your account data please finish it first to enable sync 
						<a href="<?=get_site_url()?>/wp-admin/admin.php?page=spider_seo_settings">account Data</a>
					</small>
				<?php endif;?>
			</li>
			<li>
				synced data as backup for you and let us know how can we help you
				<?php if( SpiderSEOAdminPageFramework::getOption( 'SpiderSEO',['sync_section','post_types_to_sync'] ) ): ?>
					<small class="text-green">
						You can check your  
						<a href="<?=get_site_url()?>/wp-admin/admin.php?page=spider_seo_settings&tab=sync">Data to sync</a>
					</small>
				<?php else:?>
					<small class="text-red">
						you did not gives us a permission to sync your data please finish it first to enable syncing 
						<a href="<?=get_site_url()?>/wp-admin/admin.php?page=spider_seo_settings&tab=sync">Data to sync</a>
					</small>
				<?php endif;?>
			</li>
			<li> 
				visit your <a href="http://portal.spiderseo.co">Spider SEO portal</a> 
			</li>
			<li>
				enjoy your time and leave your website to our profitional team
			</li>
		</ol>
		<?php 
		$disableSync= SpiderSEOAdminPageFramework::getOption( 'SpiderSEO',['general_section','password'] ) && 
					  SpiderSEOAdminPageFramework::getOption( 'SpiderSEO',['sync_section','post_types_to_sync'] )
						?"":"disabled";
		?>
		<button class="spider-seo-sync" <?=$disableSync?> > sync </button>
		<div class="sync-loader">
			<img src="<?=plugins_url( 'assets/image/cloud-loader.gif', __FILE__ )?>"/>
		</div>
		

		<?php   

	}
}
new SpiderSEO;

