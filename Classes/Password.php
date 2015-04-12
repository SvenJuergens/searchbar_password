<?php
namespace SvenJuergens\SearchbarPassword;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\MathUtility;

class Password {

	public function execute(&$row, &$searchEngineInput){
		$length = '15';
		if(!empty($searchEngineInput) 
			&& MathUtility::canBeInterpretedAsInteger( $searchEngineInput['1'] )){
			$length = (int)$searchEngineInput['1'];
		}
		echo $this->generate( array('length' => $length) );
		exit;
	}


	/**
	 * Generate the new password
	 *••••••••
	 * ORIGINAL : http://snipplr.com/view/21907/
	 *
	 * @access public
	 * @param array $params
	 * @return string
	 **/
	public function generate($params = array()) {

		$length     = (!array_key_exists('length', $params))     ? 15     : $params['length'];
		$use_lower  = (!array_key_exists('use_lower', $params))  ? TRUE   : $params['use_lower'];
		$use_upper  = (!array_key_exists('use_upper', $params))  ? TRUE   : $params['use_upper'];
		$use_number = (!array_key_exists('use_number', $params)) ? TRUE   : $params['use_number'];
		$use_custom = (!array_key_exists('use_custom', $params)) ? '-_()' : $params['use_custom'];

		$upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$lower = "abcdefghijklmnopqrstuvwxyz";
		$number = "0123456789";

		$seed_length = 0;
		$seed        = '';

		if($use_upper === TRUE){
			$seed_length += 26;
			$seed .= $upper;
		}
		if($use_lower === TRUE){
			$seed_length += 26;
			$seed .= $lower;
		}
		if($use_number === TRUE){
			$seed_length += 10;
			$seed .= $number;
		}
		if(!empty($use_custom)){
			$seed_length +=strlen($use_custom);
			$seed .= $use_custom;
		}
		for($i = 1; $i <= $length; $i++){
			$password .= $seed{rand(0,$seed_length-1)};
		}
		return $password;
	} // End of generate
}
