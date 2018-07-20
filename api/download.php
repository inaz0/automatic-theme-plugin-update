<?php

require_once('packages.php');
// we store the folder with the updated plugin out of scope from direct access for security and confidentiality reason
$update_folder = '../update/';

if( $download_values[$_GET['licence']] != $_GET['key_down'] )
	return false;
	
	
    // loop over all the theme and plugin arrays
    foreach ( $packages as $package ) {
    	
        // loop over all the versions for each theme and plugin
        foreach ( $package['versions'] as $version ) {
        	
			$download = $update_folder . $version['file_name'];
            
            if ( file_exists( $download ) ) {
            
            	//get the file content
                $file = file_get_contents( $download );

                //set the headers to force a download
                header( "Content-type: application/force-download" );
                header( "Content-Disposition: attachment; filename=\"" . str_replace( " ", "_", $version['file_name'] ) . "\"" );

                //echo the file to the user
                echo $file;
            }
        }
    }

?>
