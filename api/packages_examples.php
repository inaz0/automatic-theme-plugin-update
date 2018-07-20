<?php

$packages = array();

require_once('../licences.php');

/*

 * @todo : ajouter une regex pour controler la chaine de la licence : 32 caractères chiffres / lettres (maj et min)
 */

$licence_used    = '';
$key_to_download = '';

//-- on dans une demande d'info
if( !empty($_POST['action']) ){
	
	if( !empty($_POST['licence']) && !empty($_POST['api-key']) ){
	
		if( $_POST['licence'] !== $licences[$args->slug][$_POST['api-key']] ){
	
			return false;
		}
		else{
			
			
			$licence_used    = $_POST['licence'];
			$key_to_download = $download_values[$_POST['licence']];
		}
	}
}

// Plugin with update info
$packages['my_plugin'] = array( //Replace plugin with the plugin slug that updates will be checking for
    'versions' => array(
        '1.7.2' => array( //Array name should be set to current version of update
            'version' => '1.7.2', //Current version available
            'date' => '2018-07-19', //Date version was released
            'author' => 'Inazo', //Author name - can be linked using html - <a href="http://link-to-site.com">Author Name</a>
            'requires' => '4.7.4', // WP version required for plugin
            'tested' => '4.9.7', // WP version tested with
            'homepage' => 'https://www.kanjian.fr', // Site devoted to your plugin if available
            'downloaded' => '48', // Number of times downloaded
            'external' => '', // Unused
            //plugin.zip is the same as file_name
            'package' => $api_url.'/download.php?licence='.$licence_used.'&key_down='.$key_to_download,
            //file_name is the name of the file in the update folder.
            'file_name' => 'my_plugin.zip',
            'sections' => array(
                /* Plugin Info sections tabs.  Each key will be used as the title of the tab, value is the contents of tab.
                  Must be lowercase to function properly
                  HTML can be used in all sections below for formating.  Must be properly escaped ie a single quote would have to be \'
                  Screenshot section must use exteranl links for img tags.
                 */
                'description' => 'Description of Plugin', //Description Tab
                'installation' => 'Install Info', //Installaion Tab
                'screen shots' => 'Screen Shots', //Screen Shots
                'change log' => 'Change log', //Change Log Tab
                'faq' => 'FAQ', //FAQ Tab
                'other notes' => 'Other Notes'    //Other Notes Tab
            )
        )
    ),
    'info' => array(
        'url' => 'https://www.kanjian.fr'  // Site devoted to your plugin if available
    )
);
