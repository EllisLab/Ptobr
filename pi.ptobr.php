<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
						'pi_name'			=> 'Paragraph to &lt;br /&gt;',
						'pi_version'		=> '1.1',
						'pi_author'			=> 'Rick Ellis',
						'pi_author_url'		=> 'http://www.expressionengine.com/',
						'pi_description'	=> 'Swaps paragraph tags with &lt;br /&gt; tags',
						'pi_usage'			=> Ptobr::usage()
					);

/**
 * Ptobr Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			ExpressionEngine Dev Team
 * @copyright		Copyright (c) 2005 - 2009, EllisLab, Inc.
 * @link			http://expressionengine.com/downloads/details/paragraph_to_br/
 */

class Ptobr {

    var $return_data;    
    
	/**
	 * Constructor
	 *
	 * @access	public
	 * @return	void
	 */
    function Ptobr($str = '')
    {
        $this->EE =& get_instance();

		$str = ($str == '') ? $this->EE->TMPL->tagdata : $str;
		
		$str = preg_replace("/<\/p>.*?<p>/s", "<br /><br />", $str);

		$str = str_replace("<p>", "", $str);
		$str = str_replace("</p>", "", $str);
                       
		$this->return_data = $str;
	}

	// --------------------------------------------------------------------
	
	/**
	 * Usage
	 *
	 * Plugin Usage
	 *
	 * @access	public
	 * @return	string
	 */
	function usage()
	{
		ob_start(); 
		?>
		This plugin converts <p> tags to <br /> tags. 

		To use this plugin, wrap anything you want to be processed by it between these tag pairs:

		{exp:ptobr}

		text you want processed

		{/exp:ptobr}


		Version 1.1
		******************
		- Updated plugin to be 2.0 compatible


		<?php
		$buffer = ob_get_contents();
	
		ob_end_clean(); 

		return $buffer;
	}

	// --------------------------------------------------------------------

}

// END CLASS

/* End of file pi.ptobr.php */
/* Location: ./system/expressionengine/third_party/ptobr/pi.ptobr.php */