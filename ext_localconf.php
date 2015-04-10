<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

// Example for adding Additional Functions to Searchbar
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['searchbar']['additionalFunctions']['tx_searchbarpassword'] = array(
    'title' => 'Password Generator',
    'filePath' => t3lib_extMgm::extPath($_EXTKEY) . 'Classes/class.tx_searchbarpassword.php'
);

?>