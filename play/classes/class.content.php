<?php
class ContentCMS extends mysqli implements Configurations {
    public $MySQL, $Output, $CacheData, $Variables, $Loadtime, $NoCache, $BufferVars;

    public function ContentCMS($NoCache = false) {
        $this->Loadtime = microtime(true);
        $this->BufferVars = $this->Variables = array();
        $this->NoCache = (Configurations::DebugMode) ? true : $NoCache;
        
        ob_start(array ($this, 'bufferEnd'));    
        
        $this->CacheData = new stdClass();
        $this->CacheData->Location = $_SERVER['DOCUMENT_ROOT'] . getenv('SiteRoot') . 'caches/' . md5(session_id() . $_SERVER['REQUEST_URI']);
        $this->CacheData->Timeout = (file_exists($this->CacheData->Location) AND (time() - mt_rand(120, 300) < filemtime($this->CacheData->Location)));
        
        $this->MySQL = new stdClass();
        $this->MySQL->Connection = null;
        $this->MySQL->TotalQuery = 0;
        $this->MySQL->Configurations = null;
        
        set_error_handler(array($this, 'HandleError'));        

        if ($this->CacheData->Timeout && !$this->NoCache) {          
            $SESSION = new stdClass();
            $SESSION->ID = session_id();
            $SESSION->TIME = date("F d Y H:i:s", filemtime($this->CacheData->Location));
                
            $EXTENSION = pathinfo(isset($_GET['path']) ? $_GET['path'] : $_SERVER['SCRIPT_NAME'], PATHINFO_EXTENSION);
            switch (strtolower($EXTENSION)) {
            case 'css':
                header('Content-Type: text/css');
                break;
            case 'php':
            case 'asp':
            case 'html':
                header('Content-Type: text/html');
                break;
            default:
                header('Content-Type: text/plain');
                break;
            }

            $this->Output = gzinflate(file_get_contents($this->CacheData->Location));
            $this->FlushContent(false); 
        }
		
		//if (md5(exec("hostname")) != Configurations::License) die();
    }

    function bufferEnd($buffer) {
        $this->BufferVars['{Build_Version}'] = 'HiddenProject CMS Build ' . Configurations::Build . ' (Author: Naufal Hardiansyah)';
        $this->BufferVars['{Load_Time}'] = 'Debug: Script executed in '.round((microtime(true) - $this->Loadtime) / 60, 3).' seconds with ' . $this->MySQL->TotalQuery . ' queries ' . ($this->CacheData->Timeout && !$this->NoCache ? '(Cached Session)' : null); 
        $this->BufferVars['{Site_Root}'] = getenv('SiteRoot'); 
        return (str_replace(array_keys($this->BufferVars), array_values($this->BufferVars), $buffer));
    }

    function ClearCaches() {
        unlink($this->CacheData->Location);
    }
    
    function HandleError($ErrorNo, $ErrorMessage, $ErrorFile, $ErrorLine, $ErrorCustom = false) {
        if (!(error_reporting() & $ErrorNo) AND !$ErrorCustom)
        return;

        /** PARSE ERROR TYPE **/
        switch ($ErrorNo) {
        case E_USER_ERROR:
            $ErrorType = 'Fatal Error';
            break;
        case E_USER_WARNING:
            $ErrorType = 'Warning';
            break;
        case E_USER_NOTICE:
            $ErrorType = 'Notice';
            break;
        default:
            $ErrorType = 'Unknown Error';
            break;
        }
        
        $this->SystemExit($ErrorMessage, $ErrorLine, $ErrorFile);
    }
    
    
    public function RetrieveTemp($temp) {
        $template = 'templates/' . Configurations::Template . "/template.{$temp}.html";

        if (!file_exists($template))
        $this->SystemExit('Template not found: ' . $template, __LINE__, __FILE__);

        $data[0][0] = fopen($template, "r");
        $data[0][1] = fread($data[0][0], filesize($template));
        fclose($data[0][0]);

        return $data[0][1];
    }
    
    public function connectDB() {
        parent::__construct(Configurations::MySQLHost, Configurations::MySQLUser, Configurations::MySQLPass, Configurations::MySQLData);
        if (mysqli_connect_error())
        $this->SystemExit(mysqli_connect_errno() . mysqli_connect_error(), __LINE__, __FILE__);
        else
        $this->MySQL->Connection = true;
    }
    
    public function DBase($type, $params = array()) {
        if (!$this->MySQL->Connection)
        $this->SystemExit('No available MySQLi connection', __LINE__, __FILE__);
        
        switch (strtoupper($type)) {
        case 'QUERY':
            if ($Query = parent::query($params[0])) {
                $this->MySQL->TotalQuery++;
                return $Query;
            } else
            $this->SystemExit('MySQLi failed to query: ' . $params[0], __LINE__, __FILE__);
            break;
        case 'PREPARE':
            if ($Query = parent::prepare($params[0])) {
                $this->MySQL->TotalQuery++;
                return $Query;
            } else
            $this->SystemExit('MySQLi failed to prepare: ' . $params[0], __LINE__, __FILE__);
            break;
        case 'ESCAPESTRING':                
            if ($Escape = parent::real_escape_string($params[0]))
            return $Escape;
            else
            $this->SystemExit('MySQLi failed to escape: ' . $params[0], __LINE__, __FILE__);                
            break;
        }
    }
    
    public function FlushContent($clean = true) {       
        $this->Output = empty($this->Variables) ? $this->Output : str_replace(array_keys($this->Variables), array_values($this->Variables), $this->Output);

        if ($clean) {
            libxml_use_internal_errors(true);     
            $doc = new DOMDocument();
            $doc->loadHTML($this->Output);
            $goodHtml = $doc->saveHTML();
            $this->Output = trim(preg_replace('/(.*)<body>(.*)<\/body>(.*)/', '\2', $goodHtml));
        }

        print $this->Output;
        ob_end_flush();
        
        if (!$this->CacheData->Timeout && !$this->NoCache) {
            $fp = fopen($this->CacheData->Location, 'w');
            fwrite($fp, gzdeflate($this->Output));
            fclose($fp);
        }
        
        exit(0);
    }
    
    public function SystemExit($text, $line, $file = null) {
        if (ob_get_level()) ob_end_clean();
        header('Content-Type: text/plain');
        print ("$text - " . date("F j, Y, g:i a"));
        print ("\nLocation: $file ($line)");
        exit(1);
    }
}
?>