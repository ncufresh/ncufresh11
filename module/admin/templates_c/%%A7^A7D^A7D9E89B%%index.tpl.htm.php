<?php /* Smarty version 2.6.26, created on 2011-08-05 15:43:31
         compiled from zh_tw/index.tpl.htm */ ?>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
var array_module = <?php echo $this->_tpl_vars['array_module_js']; ?>
;
var array_block = <?php echo $this->_tpl_vars['array_block_js']; ?>
;
var array_group = <?php echo $this->_tpl_vars['array_group_js']; ?>
;

function button_module_new_form_check()
{
	var isFormCorrect = true;
	var currMsgNum = 1;
	var errorMessage = "表單未正確填寫：\n";
	
	// Step1. Format of module name
	if(!$('#form_module_add_module_name').val().match(/^[_0-9a-zA-Z]{1,32}$/))
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 模組名稱僅允許底線、英文與數字");
	}
	
	// Step2. Repeatence of module name
	var isSameModuleNameFound = false;
	for(i=0; i<array_module.length; i++)
	{
		if(array_module[i]['module_name'] == $('#form_module_add_module_name').val())
		{
			isSameModuleNameFound = true;
			break;
		}
	}
	if(isSameModuleNameFound)
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 不允許新增重複的模組");
	}
	
	// Step3. Show the message, return value
	if(!isFormCorrect)
	{
		alert(errorMessage);
	}
	
	return isFormCorrect;
}


function button_module_edit(mid)
{
	// Step1. Find index from module array
	var index;
	for(i=0; i<array_module.length; i++)
	{
		if(array_module[i]['mid'] == mid)
		{
			index = i;
			break;
		}
	}

	// Step2. Fetch corresponded information
	$('#form_module_edit_module_desc').val(array_module[i]['module_desc']);
	$('#form_module_edit_mid').val(mid);
	
	// Step3. Show the dialog
	$('#admin_module_edit').dialog({
		title: "修改模組資訊",
		height: 160,
		width: 400
	});
}

function botton_module_delete()
{
	return delete_check = confirm("確認刪除此模組？\n\n注意：此動作僅將資料庫中的紀錄移除\n　　　您必須手動將模組目錄刪除。");
}

function button_module_adm_manage_form_check()
{
	var isFormCorrect = true;
	var currMsgNum = 1;
	var errorMessage = "表單未正確填寫：\n";
	
	// Step1. Check if user or group exist
	var is_u_g_exist = false;
	J.ajax({
		url: 'ajax_info_request.php',
		async: false,
		data:{
			action: 'is_u_g_exist',
			u_g_type: $('#form_adm_manage_u_g_type').val(),
			u_g_name: $('#form_adm_manage_u_g_name').val(),
		},
		success:function(content){
			is_u_g_exist = (content == '1') ? true : false;
		}
	});
	
	if(!is_u_g_exist)
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 指定的使用者名稱或群組不存在！\n");
	}
	
	// Step2. Check if corresponded user/group is in the administrator list
	var index;
	for(i=0; i<array_module.length; i++)
	{
		if(array_module[i]['mid'] == $('#form_adm_manage_mid').val())
		{
			index = i;
			break;
		}
	}
	
	var isSameAdmFound = false;
	for(i=0; i<array_module[i]['adm_' + $('#form_adm_manage_u_g_type').val()].length; i++)
	{
		if(array_module[i]['adm_' + $('#form_adm_manage_u_g_type').val()][i][$('#form_adm_manage_u_g_type').val() == 'user' ? 'username' : 'group_name'] == $('#form_adm_manage_u_g_name').val())
		{
			isSameAdmFound = true;
			break;
		}
	}
	
	if(isSameAdmFound)
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 指定的使用者名稱或群組已經屬於該模組管理員！\n");
	}
	
	// Step3. Show the message, return value
	if(!isFormCorrect)
	{
		alert(errorMessage);
	}
	
	return isFormCorrect;
}

function button_module_adm_manage(mid)
{
	$('input#form_adm_manage_mid').val(mid);
	$('#admin_module_adm_manage').dialog({
		title: "新增管理者/管理群組",
		height: 160,
		width: 400
	});
}

function button_module_adm_delete()
{
	return delete_check = confirm("確認將此管理者/管理群組移除？");
}

function button_block_edit(bid)
{
	// Step1. Find index from block array
	var index;
	for(i=0; i<array_block.length; i++)
	{
		if(array_block[i]['bid'] == bid)
		{
			index = i;
			break;
		}
	}
	
	// Step2. Fetch corresponded information
	$('#form_block_edit_block_name').val(array_block[index]['block_name']);
	$('select#form_block_edit_mid').val(array_block[index]['mid']);
	$('#form_block_edit_frame_exec').val(array_block[index]['frame_exec']);
	$('#form_block_edit_frame_tpl').val(array_block[index]['frame_tpl']);
	$('#form_block_edit_block_desc').val(array_block[index]['block_desc']);
	$('#form_block_edit_bid').val(array_block[index]['bid']);
	
	// Step3. Show the dialog
	$('#admin_block_edit').dialog({
		title: "修改子樣板資訊",
		height: 280,
		width: 400
	});
}

function button_block_edit_form_check()
{
	var isFormCorrect = true;
	var currMsgNum = 1;
	var errorMessage = "表單未正確填寫：\n";
	
	// Step1. Check block_name
	if($('#form_block_edit_block_name').val() == "")
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 子樣板名稱不可為空\n");
	}
	
	// Step2. Check frame_exec
	if(!$('#form_block_edit_frame_exec').val().match(/^([._0-9a-zA-Z]+)(\.php)$/))
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 執行檔必須為PHP副檔名 (英數字元、點或底線)\n");
	}
	
	// Step3. Check frame_tpl
	if(!$('#form_block_edit_frame_tpl').val().match(/^([._0-9a-zA-Z]+)(\.htm)$/))
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 樣板檔必須為htm副檔名 (英數字元、點或底線)\n");
	}
	
	// Step4. Show the message, return value
	if(!isFormCorrect)
	{
		alert(errorMessage);
	}
	
	return isFormCorrect;
}

function button_block_new_form_check()
{
	var isFormCorrect = true;
	var currMsgNum = 1;
	var errorMessage = "表單未正確填寫：\n";
	
	// Step1. Check block_name
	if($('#form_block_new_block_name').val() == "")
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 子樣板名稱不可為空\n");
	}
	
	// Step2. Check frame_exec
	if(!$('#form_block_new_frame_exec').val().match(/^([._0-9a-zA-Z]+)(\.php)$/))
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 執行檔必須為PHP副檔名 (英數字元、點或底線)\n");
	}
	
	// Step3. Check frame_tpl
	if(!$('#form_block_new_frame_tpl').val().match(/^([._0-9a-zA-Z]+)(\.htm)$/))
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 樣板檔必須為htm副檔名 (英數字元、點或底線)\n");
	}
	
	// Step4. Check if same block at same module has been registered
	var isFrameExecReg = false;
	J.ajax({
		url: 'ajax_info_request.php',
		async: false,
		data:{
			action: 'is_frame_exec_exist',
			mid: $('#form_block_new_mid').val(),
			frame_exec: $('#form_block_new_frame_exec').val()
		},
		success:function(content){
			isFrameExecReg = (content == '1' ? true : false);
		}
	});
	
	if(isFrameExecReg)
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 同模組底下的執行檔 (" + ($('#form_block_new_frame_exec').val()) + ") 已註冊！\n");
	}
	
	// Step5. Show the message, return value
	if(!isFormCorrect)
	{
		alert(errorMessage);
	}
	
	return isFormCorrect;
}

function button_block_delete()
{
	return delete_check = confirm("確認刪除子樣板？\n\n注意：此動作僅將資料庫中的紀錄移除\n　　　您必須手動將子樣板檔案刪除。");
}

function button_group_new_form_check()
{
	var isFormCorrect = true;
	var currMsgNum = 1;
	var errorMessage = "表單未正確填寫：\n";
	
	// Step1. Check format of group_name
	if(!$('#form_group_new_group_name').val().match(/^[_0-9a-zA-Z]+$/))
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 群組名稱必須為英文、數字或底線的組合");
	}
	
	// Step2. Check if corresponded group exist or not
	var isGroupExist = false;
	J.ajax({
		url: 'ajax_info_request.php',
		async: false,
		data:{
			action: 'isGroupExist',
			group_name: $('#form_group_new_group_name').val()
		},
		success:function(content){
			isGroupExist = (content == '1' ? true : false);
		}
	});
	
	if(isGroupExist)
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 群組名稱已經存在，不可重複");
	}
	
	// Step3. Show the message, return value
	if(!isFormCorrect)
	{
		alert(errorMessage);
	}
	
	return isFormCorrect; 
}

function button_group_delete()
{
	return delete_check = confirm("確認刪除此群組？");
}

function button_group_edit(gid)
{
	// Step1. Find index from block array
	var index;
	for(i=0; i<array_group.length; i++)
	{
		if(array_group[i]['gid'] == gid)
		{
			index = i;
			break;
		}
	}
	
	// Step2. Fetch corresponded information
	$('#form_group_edit_group_name').val(array_group[index]['group_name']);
	$('#form_group_edit_group_desc').val(array_group[index]['group_desc']);
	$('#form_group_edit_gid').val(array_group[index]['gid']);
	
	// Step3. Show the dialog
	$('#admin_group_edit').dialog({
		title: "修改群組資訊",
		height: 160,
		width: 400
	});
}

function button_group_edit_form_check()
{
	var isFormCorrect = true;
	var currMsgNum = 1;
	var errorMessage = "表單未正確填寫：\n";
	
	// Step1. Check format of group_name
	if(!$('#form_group_edit_group_name').val().match(/^[_0-9a-zA-Z]+$/))
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 群組名稱必須為英文、數字或底線的組合");
	}
	
	// Step2. Check if corresponded group exist or not
	for(i=0; i<array_group.length; i++)
	{
		if(array_group[i]['group_name'] == $('#form_group_edit_group_name').val() && array_group[i]['gid'] != $('#form_group_edit_gid').val())
		{
			isFormCorrect = false;
			errorMessage += (currMsgNum++ + ". 群組名稱已經存在，不可重複");
			break;
		}
	}
	
	
	// Step3. Show the message, return value
	if(!isFormCorrect)
	{
		alert(errorMessage);
	}
	
	return isFormCorrect; 
}

function button_group_member_delete()
{
	return delete_check = confirm("確認將此一群組成員移除？");
}

function button_group_memeber_new(gid)
{	
	// Step2. Fetch corresponded information
	$('#form_group_member_new_username').val("");
	$('#form_group_member_new_gid').val(gid);
	
	// Step3. Show the dialog
	$('#admin_group_new_member').dialog({
		title: "新增成員",
		height: 160,
		width: 400
	});
}

function button_group_memeber_new_form_check()
{
	var isFormCorrect = true;
	var currMsgNum = 1;
	var errorMessage = "表單未正確填寫：\n";

	// Step1. Check if user exist
	var isUserExist = false;
	J.ajax({
		url: 'ajax_info_request.php',
		async: false,
		data:{
			action: 'isUserExist',
			username: $('#form_group_member_new_username').val()
		},
		success:function(content){
			isUserExist = (content == '1' ? true : false);
		}
	});
	if(!isUserExist)
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 指定的使用者不存在\n");
	}
	
	// Step2. Check if user in the group
	var group_index;
	for(i=0; i<array_group.length; i++)
	{
		if(array_group[i]['gid'] == $('#form_group_member_new_gid').val())
		{
			group_index = i;
			break;
		}
	}
	
	for(i=0; i<array_group[group_index]['member'].length; i++)
	{
		if(array_group[group_index]['member'][i]['username'] == $('#form_group_member_new_username').val())
		{
			isFormCorrect = false;
			errorMessage += (currMsgNum++ + ". 指定的使用者已經在群組中！\n");
			break;
		}
	}
	
	// Step3. Show the message, return value
	if(!isFormCorrect)
	{
		alert(errorMessage);
	}
	
	return isFormCorrect;
}

function button_user_new_form_check()
{
	var isFormCorrect = true;
	var currMsgNum = 1;
	var errorMessage = "表單未正確填寫：\n";
	
	// Step1. Check username & password is not empty
	if($('#form_user_new_username').val() == "" || $('#form_user_new_password').val() == "")
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 帳號或密碼不可為空！");
	}
	
	// Step2. Check there is no same username
	var isUserExist = false;
	J.ajax({
		url: 'ajax_info_request.php',
		async: false,
		data: {
			action: 'isUserExist',
			username: $('#form_user_new_password').val()
		},
		success:function(content){
			isUserExist = (content == '1') ? true : false;
		}
	});
	if(isUserExist)
	{
		isFormCorrect = false;
		errorMessage += (currMsgNum++ + ". 帳號已被註冊！");
	}
	
	// Step3. Show the message, return value
	if(!isFormCorrect)
	{
		alert(errorMessage);
	}
	return isFormCorrect;
}

$(document).ready(function(){
	$('#admin_main').tabs();
});
</script>
<div id="admin_main">
  <ul>
    <li><a href="#admin_main-1">關於</a></li>
    <li><a href="#admin_main-2">模組管理</a></li>
    <li><a href="#admin_main-3">子樣板管理</a></li>
    <li><a href="#admin_main-4">群組管理</a></li>
    <li><a href="#admin_main-5">使用者管理</a></li>
  </ul>
  <!--<br /><div class="warning_block">發生錯誤</div><br />-->
  <div id="admin_main-1">
    <div class="table_sec_title">專案資訊</div>
    <div class="table_item">
      <div class="column_left">專案名稱</div>
      <div class="column_right"><?php echo $this->_tpl_vars['currcfg']['PROJECT_NAME']; ?>
</div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">開發框架/版本</div>
      <div class="column_right"><?php echo $this->_tpl_vars['currcfg']['FRAMEWORK_NAME']; ?>
 (版本<?php echo $this->_tpl_vars['currcfg']['FRAMEWORK_VERSION']; ?>
)</div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">樣板引擎/版本</div>
      <div class="column_right">Smarty <?php echo '2.6.26'; ?>
</div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">JS/AJAX函式庫</div>
      <div class="column_right">JQuery 1.5.1<br />JQuery UI 1.8.13<br />DD_belatedPNG 0.0.8a</div>
      <br class="clear" />
    </div>
    
    <br /><br />
    
    <div class="table_sec_title">聯絡資訊</div>
    <div class="table_item">
      <div class="column_left">作者</div>
      <div class="column_right">龔信文 (Jessee Hsin-Wen Kung)</div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">系級</div>
      <div class="column_right">國立中央大學 資訊工程學系 100級A班</div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">E-mail</div>
      <div class="column_right">965002025 @ cc.ncu.edu.tw</div>
      <br class="clear" />
    </div>
    
    <br /><br />
  </div>
  
  <div id="admin_main-2">
    <div class="table_sec_title">說明</div>
    可在此註冊模組，並指派各模組的管理員。請注意模組名稱即您的模組目錄名稱，且當您註冊一個新模組X之後，您必須手動複製 <code>/module/new_module</code> 底下所有的檔案與子目錄至您的模組目錄 <code>/module/x</code> 之下，以建立新模組的檔案結構。<br /><br />
    模組可針對目前登入的使用者，判斷是否具有管理員權限，如下：
    <div class="tab_code">
      <span class="comment">// 以下程式若回傳為true，代表$curruser具有目前這個模組的管理權限</span><br />
      <code>$currmodule -> is_admin();</code><br /><br />
      <span class="comment">// 以下程式若回傳為true，代表$curruser具有整個網站的管理權限<br />// 且其他任意模組的$currmodule -> is_admin()均為真</span><br />
      <code>$currmodule -> is_system();</code><br />
    </div>
    <br /><br />
    
    <div class="table_sec_title">
      <div class="column_left">改 刪 管理者 </div>
      <div class="column_right">模組名稱 / 模組敘述 / 模組管理員</div>
      <br class="clear" />
    </div>
    
    <?php unset($this->_sections['module']);
$this->_sections['module']['name'] = 'module';
$this->_sections['module']['loop'] = is_array($_loop=$this->_tpl_vars['array_module']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['module']['show'] = true;
$this->_sections['module']['max'] = $this->_sections['module']['loop'];
$this->_sections['module']['step'] = 1;
$this->_sections['module']['start'] = $this->_sections['module']['step'] > 0 ? 0 : $this->_sections['module']['loop']-1;
if ($this->_sections['module']['show']) {
    $this->_sections['module']['total'] = $this->_sections['module']['loop'];
    if ($this->_sections['module']['total'] == 0)
        $this->_sections['module']['show'] = false;
} else
    $this->_sections['module']['total'] = 0;
if ($this->_sections['module']['show']):

            for ($this->_sections['module']['index'] = $this->_sections['module']['start'], $this->_sections['module']['iteration'] = 1;
                 $this->_sections['module']['iteration'] <= $this->_sections['module']['total'];
                 $this->_sections['module']['index'] += $this->_sections['module']['step'], $this->_sections['module']['iteration']++):
$this->_sections['module']['rownum'] = $this->_sections['module']['iteration'];
$this->_sections['module']['index_prev'] = $this->_sections['module']['index'] - $this->_sections['module']['step'];
$this->_sections['module']['index_next'] = $this->_sections['module']['index'] + $this->_sections['module']['step'];
$this->_sections['module']['first']      = ($this->_sections['module']['iteration'] == 1);
$this->_sections['module']['last']       = ($this->_sections['module']['iteration'] == $this->_sections['module']['total']);
?>
    <div class="table_item">
      <div class="column_left">
        <a onclick="button_module_edit(<?php echo $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['mid']; ?>
);"><img alt="修改" src="templates/zh_tw/images/button_modify.png" /></a>
        <a onclick="return botton_module_delete();" href="module_edit.php?action=info_delete&mid=<?php echo $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['mid']; ?>
"><img alt="刪除" src="templates/zh_tw/images/button_delete.png" /></a>
        <a onclick="button_module_adm_manage(<?php echo $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['mid']; ?>
);"><img alt="管理者" src="templates/zh_tw/images/button_admin.png" /></a>
      </div>
      <div class="column_right">
        <span class="item_title"><?php echo $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['module_name']; ?>
</span><br />
        <span class="item_desc">
          <?php echo $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['module_desc']; ?>
<br />
          管理群組：
          <?php $_from = $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['adm_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adm_group_item']):
?>
            <?php echo $this->_tpl_vars['adm_group_item']['group_name']; ?>
<a onclick="return button_module_adm_delete();" href="module_edit.php?action=adm_perm_delete&ma_id=<?php echo $this->_tpl_vars['adm_group_item']['ma_id']; ?>
">[刪除]</a>, 
          <?php endforeach; endif; unset($_from); ?>
          <br />
          　管理者：
          <?php $_from = $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['adm_user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adm_user_item']):
?>
            <?php echo $this->_tpl_vars['adm_user_item']['username']; ?>
<a onclick="return button_module_adm_delete();" href="module_edit.php?action=adm_perm_delete&ma_id=<?php echo $this->_tpl_vars['adm_user_item']['ma_id']; ?>
">[刪除]</a>, 
          <?php endforeach; endif; unset($_from); ?>
          <br />
        </span>
      </div>
      <br class="clear" />
    </div>
    <?php endfor; endif; ?>
    <br /><br />
    
    <div id="admin_module_edit" class="dialog">
    <form action="module_edit.php?action=info_edit" method="post">
      <div class="admin_edit_main">
        <div class="admin_edit_left">模組敘述</div>
        <div class="admin_edit_right"><input id="form_module_edit_module_desc" type="text" name="module_desc" value="" maxlength="256" /></div>
        <br class="clear" />
      </div>
      <input id="form_module_edit_mid" name="mid" type="hidden" value="" />
      <input type="submit" value="儲存" />
    </form>
    </div>
    
    <div id="admin_module_adm_manage" class="dialog">
    <form action="module_edit.php?action=adm_perm_add" method="post">
      <div class="admin_edit_main">
        <div class="admin_edit_left">限制對象</div>
        <div class="admin_edit_right">
          <select id="form_adm_manage_u_g_type" name="form_adm_manage_u_g_type">
            <option value="user">使用者</option>
            <option value="group">群組</option>
          </select>
        </div>
        <br class="clear" />
      </div>
      
      <div id="div_module_adm_manage_username" class="admin_edit_main">
        <div class="admin_edit_left">會員/群組名稱</div>
        <div class="admin_edit_right"><input id="form_adm_manage_u_g_name" type="text" name="form_adm_manage_u_g_name" value="" /></div>
        <br class="clear" />
      </div>
      
      <input id="form_adm_manage_mid" type="hidden" name="form_adm_manage_mid" value="" />
      <input type="submit" value="新增管理者/群組" onclick="return button_module_adm_manage_form_check();" />
    </form>
    </div>
    
    <form action="module_edit.php?action=info_add" method="post">
    <div class="table_sec_title">註冊模組</div>
    <div class="table_item">
      <div class="column_left">模組名稱</div>
      <div class="column_right">
        <input id="form_module_add_module_name" type="text" name="new_module_name" maxlength="32" value="" /><br />
        不可為空，必須為英文、數字或底線，與模組目錄名稱相同
      </div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">模組敘述</div>
      <div class="column_right">
        <input type="text" name="new_module_desc" maxlength="256" value="" /><br />
        模組說明、用途...等
      </div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left"></div>
      <div class="column_right">
        <input type="submit" value="註冊模組" onclick="return button_module_new_form_check()" />
      </div>
      <br class="clear" />
    </div>
    </form>
    <br class="clear" />
  </div>
  
  <div id="admin_main-3">
    <div class="table_sec_title">說明</div>
    可在此註冊各模組的子樣板。每個子樣板有所屬的樣板檔(*.tpl.htm)以及執行檔(*.php)，註冊子樣板時請務必加以填寫。以下項目會顯示子樣板的序號(即ac_block資料表中的bid欄位)；當您必須建立一個子樣板時，您可以使用以下程式碼：<br />
    <div class="tab_code">
      <span class="comment">// 取出ac_block資料表中，bid為1的子樣板</span><br />
      <code>$block = new ac_block(1);</code><br />
      <span class="comment">// 引入子樣板所屬模組底下的blockStyle.css檔案</span><br />
      <code>$block -> add_css("blockStyle.css");</code><br />
      <span class="comment">// 印出該子樣板的HTML碼</span><br />
      <code>echo $block -> fetch_block();</code><br />
    </div><br />
    編寫子樣板時不需引入ac_boot.php，但必須檢查開發框架是否已經引入。子樣板中不可使用$currtpl物件。也由於不可使用$currtpl　-> assign()指定變數給樣板檔使用，改由必須宣告固定的$block_var陣列的方式達成。也由於不可使用$currtpl -> display()，故必須於此管理端註冊執行檔與樣板檔。以下為執行檔範例：
    <div class="tab_code">
      <span class="comment">// 檢查開發框架是否已經引入</span><br />
      <code>if(!defined('AC_INCLUDED')) exit();</code><br />
      <span class="comment">// 建立block_var陣列代替變數指定功能</span><br />
      <code>$block_var = array('a' => "StringA", 'b' => "StringB");</code><br />
    </div>
    <br />
    於樣板檔中呼叫&lt;{$block_var.a}&gt;即會顯示StringA。
    <br /><br />
    <div class="table_sec_title">
      <div class="column_left">改 刪</div>
      <div class="column_right">[bid] 所屬模組 - 子樣板名稱 / 子樣板敘述</div>
      <br class="clear" />
    </div>
    <?php unset($this->_sections['block']);
$this->_sections['block']['name'] = 'block';
$this->_sections['block']['loop'] = is_array($_loop=$this->_tpl_vars['array_block']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['block']['show'] = true;
$this->_sections['block']['max'] = $this->_sections['block']['loop'];
$this->_sections['block']['step'] = 1;
$this->_sections['block']['start'] = $this->_sections['block']['step'] > 0 ? 0 : $this->_sections['block']['loop']-1;
if ($this->_sections['block']['show']) {
    $this->_sections['block']['total'] = $this->_sections['block']['loop'];
    if ($this->_sections['block']['total'] == 0)
        $this->_sections['block']['show'] = false;
} else
    $this->_sections['block']['total'] = 0;
if ($this->_sections['block']['show']):

            for ($this->_sections['block']['index'] = $this->_sections['block']['start'], $this->_sections['block']['iteration'] = 1;
                 $this->_sections['block']['iteration'] <= $this->_sections['block']['total'];
                 $this->_sections['block']['index'] += $this->_sections['block']['step'], $this->_sections['block']['iteration']++):
$this->_sections['block']['rownum'] = $this->_sections['block']['iteration'];
$this->_sections['block']['index_prev'] = $this->_sections['block']['index'] - $this->_sections['block']['step'];
$this->_sections['block']['index_next'] = $this->_sections['block']['index'] + $this->_sections['block']['step'];
$this->_sections['block']['first']      = ($this->_sections['block']['iteration'] == 1);
$this->_sections['block']['last']       = ($this->_sections['block']['iteration'] == $this->_sections['block']['total']);
?>
    <div class="table_item">
      <div class="column_left">
        <a onclick="button_block_edit(<?php echo $this->_tpl_vars['array_block'][$this->_sections['block']['index']]['bid']; ?>
);"><img alt="修改" src="templates/zh_tw/images/button_modify.png" /></a>
        <a onclick="return button_block_delete();" href="block_edit.php?action=delete&bid=<?php echo $this->_tpl_vars['array_block'][$this->_sections['block']['index']]['bid']; ?>
"><img alt="刪除" src="templates/zh_tw/images/button_delete.png" /></a>
      </div>
      <div class="column_right">
        <span class="item_title">[<?php echo $this->_tpl_vars['array_block'][$this->_sections['block']['index']]['bid']; ?>
] <?php echo $this->_tpl_vars['array_block'][$this->_sections['block']['index']]['module_name']; ?>
 - <?php echo $this->_tpl_vars['array_block'][$this->_sections['block']['index']]['block_name']; ?>
</span><br />
        <span class="item_desc">
        <?php echo $this->_tpl_vars['array_block'][$this->_sections['block']['index']]['block_desc']; ?>
<br />
        執行檔：<?php echo $this->_tpl_vars['array_block'][$this->_sections['block']['index']]['frame_exec']; ?>
<br />
        樣板檔：<?php echo $this->_tpl_vars['array_block'][$this->_sections['block']['index']]['frame_tpl']; ?>

        </span><br />
      </div>
      <br class="clear" />
    </div>
    <?php endfor; endif; ?>
    
    <div id="admin_block_edit" class="dialog">
      <form action="block_edit.php?action=edit" method="post">
      <div class="admin_edit_main">
        <div class="admin_edit_left">子樣板名稱</div>
        <div class="admin_edit_right"><input type="text" id="form_block_edit_block_name" name="form_block_edit_block_name" value="" /></div>
        <br class="clear" />
      </div>
      <div class="admin_edit_main">
        <div class="admin_edit_left">所屬模組</div>
        <div class="admin_edit_right">
          <select id="form_block_edit_mid" name="form_block_edit_mid">
            <?php unset($this->_sections['module']);
$this->_sections['module']['name'] = 'module';
$this->_sections['module']['loop'] = is_array($_loop=$this->_tpl_vars['array_module']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['module']['show'] = true;
$this->_sections['module']['max'] = $this->_sections['module']['loop'];
$this->_sections['module']['step'] = 1;
$this->_sections['module']['start'] = $this->_sections['module']['step'] > 0 ? 0 : $this->_sections['module']['loop']-1;
if ($this->_sections['module']['show']) {
    $this->_sections['module']['total'] = $this->_sections['module']['loop'];
    if ($this->_sections['module']['total'] == 0)
        $this->_sections['module']['show'] = false;
} else
    $this->_sections['module']['total'] = 0;
if ($this->_sections['module']['show']):

            for ($this->_sections['module']['index'] = $this->_sections['module']['start'], $this->_sections['module']['iteration'] = 1;
                 $this->_sections['module']['iteration'] <= $this->_sections['module']['total'];
                 $this->_sections['module']['index'] += $this->_sections['module']['step'], $this->_sections['module']['iteration']++):
$this->_sections['module']['rownum'] = $this->_sections['module']['iteration'];
$this->_sections['module']['index_prev'] = $this->_sections['module']['index'] - $this->_sections['module']['step'];
$this->_sections['module']['index_next'] = $this->_sections['module']['index'] + $this->_sections['module']['step'];
$this->_sections['module']['first']      = ($this->_sections['module']['iteration'] == 1);
$this->_sections['module']['last']       = ($this->_sections['module']['iteration'] == $this->_sections['module']['total']);
?>
            <option value="<?php echo $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['mid']; ?>
"><?php echo $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['module_name']; ?>
</option>
            <?php endfor; endif; ?>
          </select>
        </div>
        <br class="clear" />
      </div>
      <div class="admin_edit_main">
        <div class="admin_edit_left">執行檔</div>
        <div class="admin_edit_right"><input type="text" id="form_block_edit_frame_exec" name="form_block_edit_frame_exec" value="" /></div>
        <br class="clear" />
      </div>
      <div class="admin_edit_main">
        <div class="admin_edit_left">樣板檔</div>
        <div class="admin_edit_right"><input type="text" id="form_block_edit_frame_tpl" name="form_block_edit_frame_tpl" value="" /></div>
        <br class="clear" />
      </div>
      <div class="admin_edit_main">
        <div class="admin_edit_left">子樣板敘述</div>
        <div class="admin_edit_right"><input type="text" id="form_block_edit_block_desc" name="form_block_edit_block_desc" value="" /></div>
        <br class="clear" />
      </div>
      <input type="hidden" id="form_block_edit_bid" name="form_block_edit_bid" value="" />
      <input type="submit" value="儲存" onclick="return button_block_edit_form_check();" />
      </form>
    </div>
    
    <br /><br />
    <form action="block_edit.php?action=add" method="post">
    <div class="table_sec_title">註冊子樣板</div>
    <div class="table_item">
      <div class="column_left">子樣板名稱</div>
      <div class="column_right">
        <input type="text" id="form_block_new_block_name" name="form_block_new_block_name" maxlength="32" /><br />
        可為任意字元，便於記憶即可
      </div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">所屬模組</div>
      <div class="column_right">
      <select id="form_block_new_mid" name="form_block_new_mid">
        <?php unset($this->_sections['module']);
$this->_sections['module']['name'] = 'module';
$this->_sections['module']['loop'] = is_array($_loop=$this->_tpl_vars['array_module']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['module']['show'] = true;
$this->_sections['module']['max'] = $this->_sections['module']['loop'];
$this->_sections['module']['step'] = 1;
$this->_sections['module']['start'] = $this->_sections['module']['step'] > 0 ? 0 : $this->_sections['module']['loop']-1;
if ($this->_sections['module']['show']) {
    $this->_sections['module']['total'] = $this->_sections['module']['loop'];
    if ($this->_sections['module']['total'] == 0)
        $this->_sections['module']['show'] = false;
} else
    $this->_sections['module']['total'] = 0;
if ($this->_sections['module']['show']):

            for ($this->_sections['module']['index'] = $this->_sections['module']['start'], $this->_sections['module']['iteration'] = 1;
                 $this->_sections['module']['iteration'] <= $this->_sections['module']['total'];
                 $this->_sections['module']['index'] += $this->_sections['module']['step'], $this->_sections['module']['iteration']++):
$this->_sections['module']['rownum'] = $this->_sections['module']['iteration'];
$this->_sections['module']['index_prev'] = $this->_sections['module']['index'] - $this->_sections['module']['step'];
$this->_sections['module']['index_next'] = $this->_sections['module']['index'] + $this->_sections['module']['step'];
$this->_sections['module']['first']      = ($this->_sections['module']['iteration'] == 1);
$this->_sections['module']['last']       = ($this->_sections['module']['iteration'] == $this->_sections['module']['total']);
?>
        <option value="<?php echo $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['mid']; ?>
"><?php echo $this->_tpl_vars['array_module'][$this->_sections['module']['index']]['module_name']; ?>
</option>
        <?php endfor; endif; ?>
      </select>
      </div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">執行檔</div>
      <div class="column_right">
        <input type="text" id="form_block_new_frame_exec" name="form_block_new_frame_exec" maxlength="256" /><br />
        必須為*.php檔案，該檔案必須放置在所屬模組目錄的lib資料夾內
      </div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">樣板檔</div>
      <div class="column_right">
        <input type="text" id="form_block_new_frame_tpl" name="form_block_new_frame_tpl" maxlength="256" /><br />
        必須為*.htm檔案，該檔案必須置放在所屬模組目錄的templates/zh_tw/block資料夾內
      </div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">子樣板敘述</div>
      <div class="column_right">
        <input type="text" id="form_block_new_block_desc" name="form_block_new_block_desc" maxlength="32" /><br />
        說明、描述或使用方式...等
      </div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left"></div>
      <div class="column_right">
        <input type="submit" value="註冊子樣板" onclick="return button_block_new_form_check();"/>
      </div>
      <br class="clear" />
    </div>
    </form>
    <br class="clear" />
  </div>
  
  <div id="admin_main-4">
    <div class="table_sec_title">說明</div>
    可在此新增、修改群組，或新增、移除群組成員。請注意若需調整模組權限，請至模組管理針對群組進行調整。
    <br /><br />
    <div class="table_sec_title">
      <div class="column_left">改 刪 成員</div>
      <div class="column_right">群組名稱 / 群組敘述 / 群組成員</div>
      <br />
    </div>
    <?php unset($this->_sections['group']);
$this->_sections['group']['name'] = 'group';
$this->_sections['group']['loop'] = is_array($_loop=$this->_tpl_vars['array_group']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['group']['show'] = true;
$this->_sections['group']['max'] = $this->_sections['group']['loop'];
$this->_sections['group']['step'] = 1;
$this->_sections['group']['start'] = $this->_sections['group']['step'] > 0 ? 0 : $this->_sections['group']['loop']-1;
if ($this->_sections['group']['show']) {
    $this->_sections['group']['total'] = $this->_sections['group']['loop'];
    if ($this->_sections['group']['total'] == 0)
        $this->_sections['group']['show'] = false;
} else
    $this->_sections['group']['total'] = 0;
if ($this->_sections['group']['show']):

            for ($this->_sections['group']['index'] = $this->_sections['group']['start'], $this->_sections['group']['iteration'] = 1;
                 $this->_sections['group']['iteration'] <= $this->_sections['group']['total'];
                 $this->_sections['group']['index'] += $this->_sections['group']['step'], $this->_sections['group']['iteration']++):
$this->_sections['group']['rownum'] = $this->_sections['group']['iteration'];
$this->_sections['group']['index_prev'] = $this->_sections['group']['index'] - $this->_sections['group']['step'];
$this->_sections['group']['index_next'] = $this->_sections['group']['index'] + $this->_sections['group']['step'];
$this->_sections['group']['first']      = ($this->_sections['group']['iteration'] == 1);
$this->_sections['group']['last']       = ($this->_sections['group']['iteration'] == $this->_sections['group']['total']);
?>
    <div class="table_item">
      <div class="column_left">
        <a onclick="button_group_edit(<?php echo $this->_tpl_vars['array_group'][$this->_sections['group']['index']]['gid']; ?>
)"><img alt="修改群組" src="templates/zh_tw/images/button_modify.png" /></a>
        <a onclick="return button_group_delete();" href="group_edit.php?action=group_delete&gid=<?php echo $this->_tpl_vars['array_group'][$this->_sections['group']['index']]['gid']; ?>
"><img alt="刪除群組" src="templates/zh_tw/images/button_delete.png" /></a>
        <a onclick="button_group_memeber_new(<?php echo $this->_tpl_vars['array_group'][$this->_sections['group']['index']]['gid']; ?>
);"><img alt="新增成員" src="templates/zh_tw/images/button_admin.png" /></a>
      </div>
      <div class="column_right">
        <span class="item_title"><?php echo $this->_tpl_vars['array_group'][$this->_sections['group']['index']]['group_name']; ?>
</span><br />
        <span class="item_desc">
        <?php echo $this->_tpl_vars['array_group'][$this->_sections['group']['index']]['group_desc']; ?>
<br />
        群組成員：
        <?php $_from = $this->_tpl_vars['array_group'][$this->_sections['group']['index']]['member']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['member']):
?>
        <?php echo $this->_tpl_vars['member']['username']; ?>
<a onclick="return button_group_member_delete();" href="group_edit.php?action=member_delete&gl_id=<?php echo $this->_tpl_vars['member']['gl_id']; ?>
">[移除]</a>, 
        <?php endforeach; endif; unset($_from); ?>
        </span>
      </div>
      <br class="clear" />
    </div>
    <?php endfor; endif; ?>
    
    <div id="admin_group_edit" class="dialog">
    <form action="group_edit.php?action=group_edit" method="post">
      <div class="admin_edit_main">
        <div class="admin_edit_left">群組名稱</div>
        <div class="admin_edit_right"><input type="text" id="form_group_edit_group_name" name="form_group_edit_group_name" /></div>
        <br class="clear" />
      </div>
      <div class="admin_edit_main">
        <div class="admin_edit_left">群組描述</div>
        <div class="admin_edit_right"><input type="text" id="form_group_edit_group_desc" name="form_group_edit_group_desc" /></div>
        <br class="clear" />
      </div>
      <input type="hidden" id="form_group_edit_gid" name="form_group_edit_gid" value="" />
      <input type="submit" value="儲存" onclick="return button_group_edit_form_check();" />
    </form>
    </div>
    
    <div id="admin_group_new_member" class="dialog">
    <form action="group_edit.php?action=member_new" method="post">
      <div class="admin_edit_main">
        <div class="admin_edit_left">使用者帳號</div>
        <div class="admin_edit_right"><input type="text" id="form_group_member_new_username" name="form_group_member_new_username" /></div>
        <br class="clear" />     
      </div>
      <input type="hidden" id="form_group_member_new_gid" name="form_group_member_new_gid" value="" />
      <input type="submit" value="新增" onclick="return button_group_memeber_new_form_check();" />
    </form>
    </div>
    <br />
    <br />
    
    <form action="group_edit.php?action=group_add" method="post">
    <div class="table_sec_title">新增群組</div>
    <div class="table_item">
      <div class="column_left">群組名稱</div>
      <div class="column_right">
        <input type="text" id="form_group_new_group_name" name="form_group_new_group_name" /><br />
        限定為英文、數字與底線的組合
      </div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">群組描述</div>
      <div class="column_right">
        <input type="text" id="form_group_new_group_desc" name="form_group_new_group_desc" /><br />
        說明此群組可能包含的使用者種類，或可能指派的權限...等
      </div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left"></div>
      <div class="column_right">
        <input type="submit" value="新增群組" onclick="return button_group_new_form_check();" />
      </div>
      <br class="clear" />
    </div>
    </form>
    <br class="clear" />
  </div>
  
  <div id="admin_main-5">
    <div class="table_sec_title">說明</div>
    可在此新增、註冊使用者。若要指派使用者到特定群組，請使用「群組管理」標籤。若要指派使用者為特定模組管理員，請使用「模組管理」標籤。
    <br /><br />
    <!--<div class="table_sec_title">查詢使用者</div>
    <div class="table_item">
      <div class="column_left"></div>
      <div class="column_right"></div>
      <br class="clear" />
    </div>
    <br /><br />-->
    <form action="user_edit.php?action=new" method="post">
    <div class="table_sec_title">註冊新使用者</div>
    <div class="table_item">
      <div class="column_left">使用者名稱</div>
      <div class="column_right"><input type="text" id="form_user_new_username" name="form_user_new_username" /></div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left">使用者密碼</div>
      <div class="column_right"><input type="password" id="form_user_new_password" name="form_user_new_password" /></div>
      <br class="clear" />
    </div>
    <div class="table_item">
      <div class="column_left"></div>
      <div class="column_right"><input type="submit" value="註冊" onclick="return button_user_new_form_check();" /></div>
      <br class="clear" />
    </div>
    </form>
  </div>
</div>
<br class="clear" />