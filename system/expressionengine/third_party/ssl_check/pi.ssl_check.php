<?php

/**
=====================================================
 SSL Check
-----------------------------------------------------
 http://www.intoeetive.com/
-----------------------------------------------------
 Copyright (c) 2011 Yuri Salimovskiy
=====================================================
 This software is based upon and derived from
 ExpressionEngine software protected under
 copyright dated 2004 - 2010. Please see
 http://expressionengine.com/docs/license.html
=====================================================
 File: pi.ssl_check.php
-----------------------------------------------------
 Purpose: Check whether page is accessed over https connection
=====================================================
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
  'pi_name' => 'SSL Check',
  'pi_version' =>'1.0',
  'pi_author' =>'Yuri Salimovskiy',
  'pi_author_url' => 'http://www.intoeetive.com/',
  'pi_description' => 'Check whether page is accessed over https connection',
  'pi_usage' => Ssl_check::usage()
  );

class Ssl_check {
    
    function Ssl_check()
    {        
    	$this->EE =& get_instance(); 
        if(array_key_exists('HTTPS', $_SERVER)) {
			return $this->EE->TMPL->tagdata;
		}
        else
        {
            return $this->EE->TMPL->no_results();
        }
    }
    

  
  // ----------------------------------------
  //  Plugin Usage
  // ----------------------------------------

  // This function describes how the plugin is used.
  //  Make sure and use output buffering

  function usage()
  {
	  ob_start(); 
	  ?>
	This plugin lets you check whether page is accessed using secure (https) connection.
    
    {exp:ssl_check}
    connection is secure
    {if no_results}
    non-secure connection
    {/if}
    {exp:ssl_check}

	  <?php
	  $buffer = ob_get_contents();
		
	  ob_end_clean(); 
	
	  return $buffer;
  }
  // END

}
?>