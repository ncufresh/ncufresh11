<?php
/**
 * Armored Core - Template Handler
 * Jessee Hsin-Wen Kung @ 2011.05.24
 * Department of Computer Science and Information Engineering, National Central University
 *
 * HTML and PHP template engine extended from Smarty. Notice that ac_template
 * handles global templates and module templates, while sub-templates (block)
 * should be handled by ac_block
 */
require_once('lib_3rd/Smarty/Smarty.class.php');
require_once('ac_common.php');
require_once(ROOT_PATH.'/config.php');

class ac_template extends Smarty
{
	/**
	 * If current process needs apply main frame, than the value
	 * of variable is_main_frame_using should be true.
	 */
	var $is_main_frame_using;
	
	/**
	 * Configuration array
	 */
	var $currcfg;
	
	/**
	 * Path of current module, which will be parsed and built by constructor
	 */
	var $module_path;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		global $currcfg;
		$this -> Smarty();
		
		$this -> left_delimiter		= '<{';
		$this -> right_delimiter	= '}>';
		
		// $this -> template_dir	= ($input_tpl_dir == null) ? ROOT_PATH."/templates"		: $input_tpl_dir;
		$module_info			= explode("/" ,substr($_SERVER['SCRIPT_FILENAME'], strlen(ROOT_PATH)));
		$this -> module_path	= (count($module_info) > 2) ? ("/module/".$module_info[2]) : "";
		
		$this -> template_dir	= ROOT_PATH.($this -> module_path)."/templates";
		$this -> compile_dir	= ROOT_PATH.($this -> module_path)."/templates_c";
		
		$this -> is_main_frame_using	= (defined('MAIN_FRAME_EXEC') && defined('MAIN_FRAME_TPL'));
		$this -> currcfg				= &$currcfg;
	}
	
	
	/**
	 * Overridding function display() in Smarty with main templates, multi-language and
	 * multi-sub-templates support, which will echo the processed result of HTML. Notice
	 * that method fetch() shouldn't be invoked.
	 *
	 * @param input_tpl_file Path and filename of HTML template file
	 * @param cache_id Optional parameter, please read the manual on http://www.smarty.net/docsv2
	 * @param compile_id Optional parameter, please read the manual on http://www.smarty.net/docsv2
	 */
	public function display($input_tpl_file, $cache_id = null, $compile_id = null)
	{
		if($this -> init_check())
		{
			$result = "";
			if($this -> is_main_frame_using)
			{
				// Step1. Require main frame executable file
				require_once(ROOT_PATH."/".MAIN_FRAME_EXEC);
				$this -> assign('main_block_var', $main_block_var);
				
				/**
				 * Optional:
				 * All templates will be added 'style.css' and 'jquery-*.js' automatically.
				 * If you need to close this function, remove the code bellow this block
				 */
				 
				/* ----- COMMENT CODE UNDER THIS LINE IF YOU DON'T NEED THIS FUNCTION ----- */
				if($this -> currcfg['MODULE_SOURCE'] -> module_name != "system")
				{
					$this -> add_css('style.css');
				}
				/* ----- COMMENT CODE OVER THIS LINE IF YOU DON'T NEED THIS FUNCTION ----- */
				
				
				// Step2. Fetch `currcfg` as current global settings
				$this -> assign('currcfg',		$this -> currcfg);
				$this -> assign('curruser',		$this -> currcfg['USER_SOURCE']);
				$this -> assign('currgroup',	$this -> currcfg['GROUP_SOURCE']);
				$this -> assign('currmodule',	$this -> currcfg['MODULE_SOURCE']);
				
				// Step3. Fetch main frame template file
				$this -> assign('MAIN_CONTENTS_BLOCK', $this -> fetch(DEFAULT_LANG."/".$input_tpl_file));
				
				// Step4. Final output
				Smarty::display(ROOT_PATH."/templates/".DEFAULT_LANG."/".MAIN_FRAME_TPL);
			}
			else
			{
				$this -> assign('currcfg', $this -> currcfg);
				$this -> assign('curruser',		$this -> currcfg['USER_SOURCE']);
				$this -> assign('currgroup',	$this -> currcfg['GROUP_SOURCE']);
				$this -> assign('currmodule',	$this -> currcfg['MODULE_SOURCE']);
				
				
				Smarty::display(DEFAULT_LANG."/".$input_tpl_file);
			}
		}
		else
		{
			echo "<strong>Armored Core</strong>: ac_template:: display(): This method can't be accessed by side-template or block. Please retry by class `ac_block`.";
		}
		
		$this -> currcfg['DB_SOURCE'] -> sql_print_msg();
	}
	
	/**
	 * Templates checking before initialization. Template engine will be stoppedand
	 * show the warning message if current object is called by object of ac_block
	 * objects or MAIN_FRAME_EXEC
	 *
	 * @param is_display True if error message should be displayed
	 * @return True if current template is not main frame, false otherwise
	 */
	public function init_check($is_display = true)
	{
		if(basename($_SERVER['SCRIPT_NAME'])==MAIN_FRAME_EXEC)
		{
			if($is_display)
			{
				echo "<strong>Armored Core</strong>: ac_template:: object of `ac_template` can't be called by `MAIN_FRAME_EXEC` or objects of `ac_block`.<br />";
			}
			return false;
		}
		else
		{
			return true;
		}
	}
	
	/**
	 * CSS (Cascading Style Sheets) adder. Notice that you must put your *.css file
	 * in templates/ (system module) directory or module/[module_name]/templates
	 * (module) directory. If you want to add CSS file from root, 2nd paramater must
	 * be true
	 * 
	 * @param file_name File name of CSS to be added
	 * @param main_frame If current CSS file belongs to system module, the parameter should be true
	 * @return True if CSS file existed, false otherwise
	 */
	public function add_css($file_name, $main_frame = false)
	{		
		if($main_frame && file_exists(ROOT_PATH."/templates/".DEFAULT_LANG."/".$file_name))
		{
			$this -> currcfg['CSS_HEADER'] .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"".URL_ROOT_PATH."/templates/".DEFAULT_LANG."/".$file_name."\" />\n";
			return true;
		}
		else
		if(!$main_frame && file_exists($this -> template_dir."/".DEFAULT_LANG."/".$file_name))
		{
			$this -> currcfg['CSS_HEADER'] .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"".URL_ROOT_PATH.($this -> module_path)."/templates/".DEFAULT_LANG."/".$file_name."\" />\n";
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * CSS (Cascading Style Sheets) adder, with pure-text as input parameter
	 * 
	 * @param input_str CSS code to be added
	 */
	public function add_css_text($input_str)
	{
		$this -> currcfg['CSS_HEADER'] .= "<style type=\"text/css\">\n".$input_str."\n</style>";
	}
	
	/**
	 * Java Script adder. Notice that you must put your *.js file in templates/
	 * (system module) directory or module/[module_name]/templates (module) directory.
	 * If you want to add JS file from root, 2nd paramater must be true.
	 * 
	 * @param file_name File name of JS to be added
	 * @param main_frame If current JS file belongs to system module, the parameter should be true
	 * @return True if JavaScript file existed, false otherwise
	 */
	public function add_js($file_name, $main_frame = false)
	{
		if($main_frame && file_exists(ROOT_PATH."/lib/".$file_name))
		{
			$this -> currcfg['JS_HEADER'] .= "<script type=\"text/javascript\" src=\"".URL_ROOT_PATH."/lib/".$file_name."\"></script>\n";
			return true;
		}
		else
		if(!$main_frame && file_exists(ROOT_PATH.($this -> module_path)."/lib/".$file_name))
		{
			$this -> currcfg['JS_HEADER'] .= "<script type=\"text/javascript\" src=\"".URL_ROOT_PATH.($this -> module_path)."/lib/".$file_name."\" /></script>\n";
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * JavaScript adder, with pure-text as input parameter
	 * 
	 * @param input_str JavaScript code to be added
	 */
	public function add_js_text($input_str)
	{
		$this -> currcfg['JS_HEADER'] .= "<script type=\"text/javascript\">\n".$input_str."\n</script>";
	}
	
	/**
	 * Make main_frame to be displayed or not.
	 *
	 * @param input True if main_frame should be displayed, false otherwise
	 */
	public function set_display($input)
	{
		if(is_bool($input))
		{
			$this -> is_main_frame_using = $input;
		}
	}
}

?>
