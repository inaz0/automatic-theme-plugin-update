<?php 

/**
 * Fichier de configuration de l'api pour répondre au demande de mise à jours des plugins
 * 
 */

$api_url = 'http://api.iticonseil.com/';

$licences = array(
		
		'slug_plugin' => array(
		
				md5('http://www.example.com') => 'kxRlrhukeFZ86ig45gfND7x5veSCeKNx',
				md5('https://www.example.com') => 'kxRlrhukeFZ86ig45gfND7x5veSCeKNx',
				
				md5('https://www.second-example.fr') => 'BYhutqRZSfEhgWYYDrCFBurdNlGzEhb2',
				md5('http://www.second-example.fr') => 'BYhutqRZSfEhgWYYDrCFBurdNlGzEhb2',
		)
		
);

$download_values = array(
		
		'kxRlrhukeFZ86ig45gfND7x5veSCeKNx' => 'pK6zrapbihwXvcfNksqLuJTiakvOTrFw', // key for the control when the site example.com ask for download the update
		'BYhutqRZSfEhgWYYDrCFBurdNlGzEhb2' => '2lslclrbgferpGbhTWNfD0BFIHQDiiIC' // key for the control when the site second-example.fr ask for download the update
);

?>