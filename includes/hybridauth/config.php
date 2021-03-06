<?php
#AUTOGENERATED BY HYBRIDAUTH 2.1.0 INSTALLER - Monday 12th of November 2012 10:17:14 AM

/*!
 * HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return
array(
		"base_url" => "http://www.bandsheep.com/includes/hybridauth/",

		"providers" => array (
				// openid providers
				"OpenID" => array (
						"enabled" => true
				),

				"AOL"  => array (
						"enabled" => true
				),

				"Yahoo" => array (
						"enabled" => false,
						"keys"    => array ( "id" => "", "secret" => "" )
				),

				"Google" => array (
						"enabled" => true,
						"keys"    => array ( "id" => "347228096057.apps.googleusercontent.com", "secret" => "XRE6CztBjS1VDAPItZ9j4I14" )
				),

				"Facebook" => array (
						"enabled" => true,
						"keys"    => array ( "id" => "172485432889920", "secret" => "82aa0f77a7ab6be7e97e48c1f5430a6e" ),
						"display" => "popup"
				),

				"Twitter" => array (
						"enabled" => true,
						"keys"    => array ( "key" => "15AmqhQQq62OtMAubmIEBQ", "secret" => "L03ztBpQ2DfieFWdYgDCWVDxrWNJd2zUeoiX7klN8" )
				),

				// windows live
				"Live" => array (
						"enabled" => false,
						"keys"    => array ( "id" => "", "secret" => "" )
				),

				"MySpace" => array (
						"enabled" => false,
						"keys"    => array ( "key" => "", "secret" => "" )
				),

				"LinkedIn" => array (
						"enabled" => false,
						"keys"    => array ( "key" => "", "secret" => "" )
				),

				"Foursquare" => array (
						"enabled" => false,
						"keys"    => array ( "id" => "", "secret" => "" )
				),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,

		"debug_file" => ""
);
