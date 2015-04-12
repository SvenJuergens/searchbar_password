<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "searchbar_password".
 *
 * Auto generated 10-04-2015 23:54
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Searchbar: Password Generator',
	'description' => 'A password generator for ext: searchbar',
	'category' => 'fe',
	'version' => '2.0.0',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Sven Juergens',
	'author_email' => 't3@blue-side.de',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-7.1.99',
			'searchbar' => '2.0.0-2.9.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	)
);