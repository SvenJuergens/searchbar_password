<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Sven Juergens <t3@blue-side.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

class tx_searchbarpassword {

    public function execute(&$row, &$searchEngineInput){
        $length = '15';
        if(!empty($searchEngineInput) && $this->testInt($searchEngineInput['1'])){
            $length = intval($searchEngineInput['1']);
        }
        echo $this->generate(array('length' => $length));
        exit;
    }

    public function testInt($value){
        if(class_exists(t3lib_utility_Math)){
             return t3lib_utility_Math::canBeInterpretedAsInteger($value);
        }else{
            return t3lib_div::testInt($value);
        }
    }

    /**
     * Generate the new password
     *
     * ORIGINAL : http://snipplr.com/view/21907/
     *
     * @access public
     * @param array $params
     * @return string
     **/
    public function generate($params = array())
    {

        $length     = (!array_key_exists('length', $params))     ? 15     :     $params['length'];
        $use_lower  = (!array_key_exists('use_lower', $params))  ? TRUE   :  $params['use_lower'];
        $use_upper  = (!array_key_exists('use_upper', $params))  ? TRUE   :  $params['use_upper'];
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
