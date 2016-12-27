<?php
defined('TYPO3_MODE') or die();

// Example for adding Additional Functions to Searchbar
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['searchbar']['additionalFunctions']['tx_searchbarpassword'] = [
    'title' => 'Password Generator',
    'namespaceOfClass' => 'SvenJuergens\\SearchbarPassword\\Password'
];