<?php
/**
 * Armored Core - Block Class
 * Jessee Hsin-Wen Kung @ 2011.05.24
 * Department of Computer Science and Information Engineering, National Central University
 * 
 * Side template handler extended from Smarty. Notice that ac_block is not a
 * global handler, each object created by `ac_block` handles only ONE block.
 * 
 * If you need to create blocks in one pages, use following commands:
 *		$block = new ac_block( $bid );
 *
 * where parameter bid is the serial number of requested block in data table
 * ac_block. The class implemented __toString() magic methods, which means
 * that you can simply call:
 * 		echo $block
 *
 * to echo all HTML after side template compiled by Smarty. Notice that method
 * __toString() is mapped to method fetch().
 */
require_once('lib_3rd/Smarty/Smarty.class.php');
require_once('ac_common.php');
require_once(ROOT_PATH.'/config.php');

class ac_block extends Smarty
{
	/**
	 * Configuration array
	 */
	var $currcfg;
	
	/**
	 * Database connection handler
	 */
	var $currdb;
	
	/**
	 * Block information, with all columns fetched from ac_block
	 */
	var $block_info;
	
	/**
	 * Module path which contains current block
	 */
	var $module_path;
	
	/**
	 * Should be false if the operation of creating block object failed
	 */ 
	var $is_block_exist;
	
	/**
	 * Get block (side template) by requested bid, and the corresponded module
	 * will be loaded. Notice that any relative path MUST be replaced by absolute
	 * path (use URL_ROOT_PATH), or the image, css and js including tags will be
	 * invalid
	 *
	 * @param input_bid Serial number of requested block object, recorded in data table ac_block
	 */
	public function __construct($input_bid)
	{
		// Step1. Initialize
		global $currcfg;
		$this -> currcfg	= &$currcfg;
		$this -> currdb		= &$currcfg['DB_SOURCE'];
		
		$this -> Smarty();
		$this -> left_delimiter		= '<{';
		$this -> right_delimiter	= '}>';
		
		
		// Step2. Select the corresponded data of requested block
		$block_src	= $this -> currdb -> sql_query("SELECT `ac_block`.*, `ac_module`.`module_name` FROM `ac_block` RIGHT JOIN `ac_module` ON `ac_block`.`mid` = `ac_module`.`mid` WHERE `ac_block`.`bid` = '".$input_bid."'");
		if($this -> currdb -> sql_num_rows($block_src) > 0)
		{
			// Step3. Fetch data of requested block
			$this -> block_info = $this -> currdb -> sql_fetch_assoc($block_src);
			
			// Step4. Create path information and Smarty template directory/compile directory information
			$this -> module_path	= ($this -> block_info['module_name'] == "system") ? "" : "/module/".($this -> block_info['module_name']);
			
			$this -> template_dir	= ROOT_PATH.($this -> module_path)."/templates/".DEFAULT_LANG."/block";
			$this -> compile_dir	= ROOT_PATH.($this -> module_path)."/templates_c";
			
			// Step5. Fetch finished
			$this -> is_block_exist	= true;
		}
		else
		{
			echo "<strong>Armored Core</strong>: ac_block:: __construct(): block is not installed properly. Please reinstall this block.";
			$this -> is_block_exist = false;
		}
	}
	
	/**
	 * Output side template's HTML source code after processed
	 * 
	 * @return Result of block object in string, which should be printed by echo
	 */
	public function fetch_block()
	{
		$block_result = "";
		
		if($this -> is_block_exist)
		{
			// Step1. Embed executable file
			require_once(ROOT_PATH.($this -> module_path)."/block/".$this -> block_info['frame_exec']);
			$this -> assign('block_var', $block_var);
			
			/**
			 * Optional:
			 * All blocks will be added 'style.css' automatically.
			 * If you need to close this function, remove the code bellow this block
			 */
			 
			/* ----- COMMENT CODE UNDER THIS LINE IF YOU DON'T NEED THIS FUNCTION ----- */
			if($this -> block_info['module_name'] != "system" && ($this -> block_info['module_name'] != $this -> currcfg['MODULE_SOURCE'] -> module_name))
			{
				$this -> add_css("style.css");
			}
			/* ----- COMMENT CODE OVER THIS LINE IF YOU DON'T NEED THIS FUNCTION ----- */
			
			// Step2. Fetch `currcfg` as current global settings
			$this -> assign('currcfg',		$this -> currcfg);
			$this -> assign('curruser',		$this -> currcfg['USER_SOURCE']);
			$this -> assign('currgroup',	$this -> currcfg['GROUP_SOURCE']);
			$this -> assign('currmodule',	$this -> currcfg['MODULE_SOURCE']);
			
			// Step3. Output
			$block_result .= $this -> fetch($this -> block_info['frame_tpl']);
		}
		else
		{
			$block_result .= "<strong>Armored Core</strong>: ac_block:: fetch_block(): block is not installed properly. Please reinstall this block.";
		}
		
		return $block_result;
	}
	
	/**
	 * display(): void
	 * Denied base class function
	 * 
	 * @param resource_name Dummy parameter
	 * @param cache_id Dummy parameter
	 * @param compile_id Dummy parameter
	 */
	public function display($resource_name, $cache_id = null, $compile_id = null)
	{
		echo "<strong>Armored Core</strong>: ac_block:: display(): function <strong><u>ac_block::display()</u></strong> is disabled, please fetch html resource string by <strong><u>ac_block::fetch_block()</u></strong>.";
	}
	
	/**
	 * Adding the CSS file to the global CSS header
	 *
	 * @param file_name Stylesheet file name
	 * @return true if stylesheet existed and can be embedded, false otherwise
	 */
	public function add_css($file_name)
	{
		if(file_exists($this -> template_dir."/../".$file_name))
		{
			$this -> currcfg['CSS_HEADER'] .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"".URL_ROOT_PATH.($this -> module_path)."/templates/".DEFAULT_LANG."/".$file_name."\" />\n";
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>