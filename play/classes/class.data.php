<?php
/**
  * Advanced HiddenProject Content Management System - Data Handler
  *
  * Copyright (c) 2012 Naufal Hardiansyah (www.gremory.cu.cc)
  * The program is distributed under the terms of the GNU General Public License 
  *
  * This file is part of Advanced HiddenProject Content Management System (AdvHPContentMS).
  * 
  * AdvHPContentMS is free software: you can redistribute it and/or modify
  * it under the terms of the GNU General Public License as published by
  * Naufal Hardiansyah, either version 3 of the License, or any later version.
  * 
  * AdvHPContentMS is distributed in the hope that it will be useful,
  * but WITHOUT ANY WARRANTY; without even the implied warranty of
  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  * GNU General Public License for more details.
  * 
  * You should have received a copy of the GNU General Public License
  * along with AdvHPContentMS. If not, see <http://www.gnu.org/licenses/>.
**/
/** 
  * Warning: This class is under development!
  * At the moment, the only one that uses this class is "{root}/?index.php?gameversion" which retrieves game version in DOM format
  * The reason i didn't finish this class is because it is kinda complicated and i really got mind fucked this time
  * I hope someone would continue and improve it, wonder who? I'm sure there's someone that is able to solve this puzzle out there.
**/

class DataHandler {
    /** INITIALIZES VARIABLES **/
    var $DATA, $CHILD = null, $XML, $DOM, $TYPE, $OUTPUT = null;

    /** CLASS CONSTRUCTOR **/
    function DataHandler($type = null, $parent = null) {
        $this->DATA = new stdClass();
        switch ($type = strtoupper($type)) {
            case 'XML':
                $this->TYPE = strtoupper($type);
                $this->XML = new SimpleXMLElement('<' . $parent . '></' . $parent . '>');
                $this->DOM = null;
                break;
            case 'DOM':
                $this->TYPE = strtoupper($type);
                $this->XML = null;
                $this->DOM = new DOMDocument();
                break;
            default:
                $this->TYPE = strtoupper($type);
                $this->XML = null;
                $this->DOM = null;
                break;
        }
    }

    function addData($name, $value, $sub = null) {
        if (isset($sub)) {
		    $test = count(get_object_vars($this->CHILD));
            $this->CHILD[$test] = array( 0 => $name, 1 => $value, 2 => $sub);			
        } else
            $this->DATA->$name = $value;
    }
	
    function addChild($child) {
        return $this->XML->addChild($child);
    }

    function removeChild($name) {
        $child = $this->XML->getElementsByTagName($name)->item(0);
        return $this->XML->removeChild($child);
    }

    function removeData($name) {
        unset($name);
    }
	
    function ObjectToArray($object) {
        $Array = is_object($object) ? get_object_vars($object) : $object;
        $Data = array();

        foreach ($Array as $Key => $Value) {
            $Value = (is_array($Value) OR is_object($Value)) ? $this->ObjectToArray($Value) : $Value;
            $Data[$Key] = $Value;
        }
		
        return $Data;
    }

    function ParseData() {
        /** PARSES OBJECT DATA **/
        $Data = ($this->ObjectToArray($this->DATA));
        foreach ($Data as $Key => $Value) {
            switch (strtoupper($this->TYPE)) {
                case 'XML':
                    $this->XML->addAttribute($Key, $Value);
                    break;
                case null:
                default:
                    $this->OUTPUT =  $this->OUTPUT == null ? $Key . '=' . $Value : $this->OUTPUT . '&' . $Key . '=' . $Value;
                    break;
            }
        }
		
        /** PARSES CHILDS **/
        $Data = $this->CHILD;
        if ($Data != null) {
            foreach ($Data as $Key => $Value) {
                switch (strtoupper($this->TYPE)) {
                    case 'XML':
                        $Data[$Key][2]->addAttribute($Data[$Key][0], $Data[$Key][1]);
                        break;
                    case null:
                    default:
                        break;
                }
            }
        }

        /** XML TO STRING **/
        if (strtoupper($this->TYPE) != null AND strtoupper($this->TYPE) == 'XML') {
            $XMLDOM = dom_import_simplexml($this->XML);
            $this->OUTPUT = $XMLDOM->ownerDocument->saveXML($XMLDOM->ownerDocument->documentElement);
        }

        /** RETURN OUTPUT **/
        return $this->OUTPUT;
    }
}
?>