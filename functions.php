<?php

  $icmhwinners = new KrogerWinnersDownload;

    if(!isset($downloadcontent)){
      $downloadcontent='<div id="password-form"  style="visibility:hidden;display:none;"><div id="download-area"><div id="download-code">
                <form id="icmhwinners-calculator" method="post" action="" class="login roundall">
                  <strong>Enter Code</strong>
                  <fieldset class="inner">
                    <input name="icmhwinners-password" id="icmhwinners-password" type="password" placeholder=" " />
                    <input name="icmhwinners-submit-login" id="icmhwinners-submit-login" type="submit" class="icmhwinners-btn" value="BINGO" "> 
                  </fieldset>
                </form>
               </div>
               <div id="close-password"><a  href="javascript:hideDiv(\'password-form\')">Type in secret or click to close window.</a></div>
               </div></div></div>';
    }
    $pass = '';
  /** Process login */
  if( isset($_POST['icmhwinners-submit-login']) ){

    if( $icmhwinners->login($_POST['icmhwinners-password']) ){
      $pass = $_POST['icmhwinners-password'];
      $photo_id = $pass . '.jpg';
      
      
      $downloadcontent = '<div id="password-form"  style="display:block;visibility:visible;"><div id="download-area"><div id="download-code">
                  <strong>Good Job</strong>
                    <div id="iframe-content" style="overflow:hidden;margin:0 auto;display:block;position:relative;">
                      <iframe height="424" width="324" src="http://creativebeej.com/chineseschool.php"></iframe>
                    </div>
                
               </div><div id="close-password"><a  href="javascript:hideDiv(\'password-form\')">You win.  Click to close window.</a></div>
      </div>
    </div>
                   ';

  
    }else{
      $downloadcontent='<div id="password-form"  style="display:block;visibility:visible;"><div id="download-area"><div id="download-code">
                <form id="icmhwinners-calculator" method="post" action="" class="login roundall">
                  <strong>Enter Code</strong>
                  <fieldset class="inner">
                    <input name="icmhwinners-password" id="icmhwinners-password" type="password" placeholder=" " />
                    <input name="icmhwinners-submit-login" id="icmhwinners-submit-login" type="submit" class="icmhwinners-btn" value="BINGO" />
                  </fieldset>
                </form>
               </div>
               <div id="wrong-code"><em>the ID code you entered is not recognized</em></div><div id="close-password"><a  href="javascript:hideDiv(\'password-form\')">Type in secret or click to close window.</a></div>
      </div>
    </div>';
    }
    
    
  }
  /** Clear $_SESSION['icmhwinners-data'] */
  elseif( isset($_POST['clear-session-data']) ){
    $_SESSION['icmhwinners-data'] = array();
    die();  
  }

  
/**
 * 
 */
class KrogerWinnersDownload {
  public $views_directory;
  public $cookiename;
  public $debug;
  public $debug_log;
  public $access_log;
  public $fh;
  public $field_options;
  public $last_calc;
  protected $view;
  protected $users;
  
  /** Instantiate our class */
  public function __construct(){
    if( !isset($_SESSION) ){
      session_start();
    }
    $this->config();
    return;
  }
  
  /** Close this instance of the class */
  public function __destruct(){
    $_SESSION['last-calculation'] = $this->last_calc;
    if( $this->fh ){
      fclose($this->fh);
    }
  }
  
  /**
   * Load configuration options
   * @return bool
   */
  protected function config(){
    
    
    /** Set the name for the cookie set during login */
    $this->cookiename = 'icmhwinners';
    
    /** If set to true, we'll show our work in $this->debug_log */
    $this->debug = true;
    $this->debug_log = dirname(__FILE__) . '/logs/debug.log';
    
    /** Access logs */
    $this->access_log = dirname(__FILE__) . '/logs/access.log';
    
    /**
     * Set the value for $this->users
     * Format: $passwords[PASSWORD] = NAME
     */
    $passwords = array();
    $passwords['musicisfun!'] = 'Passord Used';
    $passwords['suckonweinberg'] = 'Passord Used';
    $passwords['weinbergmeansweiner'] = 'Passord Used';
    $passwords['herro!'] = 'Passord Used';
    $passwords['sweatersandthesudafeds'] = 'Passord Used';
    $passwords['wevesomuchyettolearn'] = 'Passord Used';
    $passwords['waterboardingissilly'] = 'Passord Used';
    $this->users = $passwords;
    
    return true;
  }
  
  /**
   * Verify a user's password, returning either the matching username or false
   * @param str $password - User-provided password
   * @return mixed
   */
  protected function check_login($password){
    return ( isset($this->users[$password]) ? $this->users[$password] : false );
  }
  
  /**
   * Handle user login
   * @param str $password
   * @return void
   */
  public function login($password){
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    if( $user = $this->check_login($password) ){
      $_SESSION['icmhwinners-user'] = $user;
      setcookie($this->cookiename, $user, time()+(60*60*24*365), '/');
      
      $this->write_access_log($this->users[$password]);
      return true;
    } else {
      $this->error('Invalid password');
      return false;
      
    }
  }
  
  /**
   * Write user info to "logs/log.txt"
   * @param str $username The password used by the user
   * @return bool
   */
  function write_access_log($username){
    if( $handle = fopen($this->access_log, "a") ){ 
      $writestring = date('Y-m-d H:i:s') . "\t{$_SERVER['REMOTE_ADDR']}\t{$username}\n";
      fwrite($handle, $writestring);
      fclose($handle);
      return true;

    }
    return false;
  }
  
  /**
   * Auto-login if the cookie is set and valid
   * @return bool
   */
  protected function auto_login(){
    if( isset($_COOKIE[$this->cookiename]) ){
      $this->login( array_search($_COOKIE[$this->cookiename], $this->users, true) );
    }
    return false;
  }
  
  /**
   * Set errors
   * @param mixed $error
   * @return void
   */
  protected function error($error=false){
    $errors = ( isset($_SESSION['icmhwinners-errors']) && is_array($_SESSION['icmhwinners-errors']) ? $_SESSION['icmhwinners-errors'] : array() );
    if( $error ){
      if( is_array($error) ){
        $errors = array_merge($errors, $error);
      } else {
        $errors[] = $error;
      }
    }
    $_SESSION['icmhwinners-errors'] = $errors;
    return;
  }
  
  /**
   * If there are errors, show them in a flash notice, then clear $this->errors
   * @return void;
   */
  public function show_errors(){
    if( isset($_SESSION['icmhwinners-errors']) && is_array($_SESSION['icmhwinners-errors']) && !empty($_SESSION['icmhwinners-errors']) ){
      echo '<ul class="flash error">';
      foreach( $_SESSION['icmhwinners-errors'] as $e ){
        echo '<li>' . $e . '</li>';
      }
      echo '</ul>';
      
      // Clear our errors in $_SESSION
      $_SESSION['icmhwinners-errors'] = array();
    }
  }
  
  /**
   * Helper function: return the path to this directory from the document root, ending with a trailing slash
   * @return str
   */
  public function root_path(){
    $root = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname(__FILE__));
    $root .= ( substr($root, 0, -1) != '/' ? '/' : '' );
    return ( substr($root, 0, 1) != '/' ? '/' : '' ) . $root;
  }
  
  
  /**
   * Clear the log file to start anew
   * @return bool
   */
  public function clear_log(){
    if( $this->debug && file_exists($this->debug_log) ){
      if( $fh = fopen($this->debug_log, 'w') ){
        fwrite($fh, 'Begin clean log file (' . basename($this->debug_log) . "):\nFile created " . date('Y-m-d H:i:s'));
        fclose($fh);
        return true;
      } else {
        print 'Notice: unable to clear logfile ' . basename($this->debug_log);
        return false;
      }
    }
  }
}

?>