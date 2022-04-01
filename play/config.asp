<?php
/** 
  * Advanced HiddenProject Content Management System - CMS Configurations
  * Copyright (c) 2012 Naufal Hardiansyah (www.gremory.cu.cc)
  * 
  * DEVELOPER NOTES:
  * - As for the MainRoot; if you're going to change constant, please also modify the .htaccess
  * - Internet Explorer 9 is currently not supported by the following CMS, 
  * you might want to change the IESuppport constant. By default, it is enabled (true)
**/

interface Configurations {
    /** CMS BUILD INFO **/ 
    const Build = '1.0';
    const Template = 'crevision';
    const License = '4ad81c7e99320407b9dab52aa1faba73';
	
    /** SERVER INFORMATION **/
    const ServerName = 'kqw4 Lands';
    const ServerDescription = 'MMORPG';
    const ServerCompany = 'AR';    

    const OwnerName = 'Magnetic';
    const OwnerEmail = 'rudolphsutton19@yahoo.com';
    const FacebookId = 'AdventureRealmPS';
    
    /** MYSQL DATA **/
    const MySQLHost = 'localhost';
    const MySQLUser = 'root';
    const MySQLPass = '';
    const MySQLData = 'altrion_v3';
    
    const DebugMode = false;    
    const Advertisements = false;
    const IESupport = true;

    /** PAYPAL STUFF **/    
    const PayPalEmail = "rudolphsutton19@yahoo.com";
    const PayPalSuccessURL = 'shop.php?gen';
    const PayPalFailureURL = 'shop.php?error';
    const PayPalRMethod = 2;
    const PayPalPMethod = 'fso';
    const PayPalCCode = 'USD';
    const PayPalLanguage = 'US';
    const PayPalServer = 'https://www.paypal.com/cgi-bin/webscr';
    
    /** GAME CONFIGURATIONS **/
    const CharacterFile = 'gamefiles/character3.swf';
    const RegistrationFile = 'gamefiles/newuser/AdventurerLandingR3.swf';
    const GameLoader = 'gamefiles/FaleonQWLoader.swf';
    const GameFile = 'KQW_Cliente20.swf';
    const GameBG = 'dreambg.swf';
    const NewRelease = 'Bug Fixes!';
    const GameUpdates = '<font color="#FFD683">Become a VIP and get AdventureCoins</font><br>This server unfortunately cannot last forever without donations. We have very limited money and the server will have to be shutdown if we cannot afford the server\'s rent at the end of the month. You can help us to keep the up and get access to fancy exclusive stuff by becoming a VIP! Show your support and love to HiddenProject.<br /><u><a href="/upgrade" target="_blank">Click here.</a></u><br/><br/><font color="#FFD683">New Factions</font><br>So today I managed to made it work, somehow. Please report any bugs you find here: <u><a href="/contact" target="_blank">https://entityisland.com/contact</a></u><br/><br/><font color="#FFD683">Like and Share us on Facebook!</font><br>Post your user name and screenshot on our facebook and fan page wall and win FREE 15.000 AdventureCoins. We will only pick 3 lucky players. The more you post/share, the bigger your chance to win!<br /><br />Fanpage Link: <u><a href="https://www.facebook.com/HiddenServer" target="_blank">https://www.facebook.com/HiddenServer</a></u>';
}

putenv("SiteRoot=/");
putenv("TimeZone=Asia/Jakarta");

error_reporting(E_ALL);
date_default_timezone_set(getenv('TimeZone'));

ini_set('display_errors', Configurations::DebugMode ? 1 : 0);
ini_set('memory_limit', '700M');
ini_set("max_execution_time", 120);
?>