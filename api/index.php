<?php
/* * *****
  Original Plugin & Theme API by Kaspars Dambis (kaspars@konstruktors.com)
  Modified by Jeremy Clark http://clark-technet.com
  Modified by Alexandre JOLY aka Inazo https://www.kanjian.fr
  Donate Link: https://www.paypal.com/donate/?token=gNsLOeiju9RlIZaJQXiPpwuRtSBSkk7h-A7U2o85TCVDAMMp8ybrs7or9Ncpmxm1Y1T7l0&country.x=FR&locale.x=FR
 * ***** */

// Pull user agent  
$user_agent = $_SERVER['HTTP_USER_AGENT'];
file_put_contents('log_pack.txt', serialize($_POST).'__'.$_SERVER['REQUEST_URI'].'__'.serialize($_GET));

//Create one time download link to secure zip file location
if ( stristr( $user_agent, 'WordPress' ) == TRUE ) {
	
    // Process API requests
    $action = $_POST['action'];
    $args   = unserialize( $_POST['request'] );
    
    if ( is_array( $args ) )
        $args = array_to_object( $args );

        
	require_once('packages.php');
    $latest_package = array_shift( $packages[$args->slug]['versions'] );

	// basic_check
    if ( $action == 'basic_check' ) {
    	
        $update_info = array_to_object( $latest_package );
        $update_info->slug = $args->slug;

        if ( version_compare( $args->version, $latest_package['version'], '<' ) ) {
        	
            $update_info->new_version = $update_info->version;
            print serialize( $update_info );
        }
    }

	// plugin_information
    if ( $action == 'plugin_information' ) {
    	
        $data = new stdClass;

        $data->slug = $args->slug;
        $data->version = $latest_package['version'];
        $data->last_updated = $latest_package['date'];
        $data->download_link = $latest_package['package'];
        $data->author = $latest_package['author'];
        $data->external = $latest_package['external'];
        $data->requires = $latest_package['requires'];
        $data->tested = $latest_package['tested'];
        $data->homepage = $latest_package['homepage'];
        $data->downloaded = $latest_package['downloaded'];
        $data->sections = $latest_package['sections'];
        print serialize( $data );
    }

} else {
    /*
      An error message can be displayed to users who go directly to the update url
     */

    echo 'Whoops, this page doesn\'t exist';
}

function array_to_object( $array = array( ) ) {
	
    if ( empty( $array ) || !is_array( $array ) )
        return false;

    $data = new stdClass;
    foreach ( $array as $akey => $aval )
        $data->{$akey} = $aval;
    return $data;
}

?>
