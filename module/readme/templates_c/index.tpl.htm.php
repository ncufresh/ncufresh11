<?php /* Smarty version 2.6.26, created on 2011-05-23 23:17:25
         compiled from zh_tw/index.tpl.htm */ ?>
<div class="new_module_main">
<h2>Hello ArmoredCore! 這是一個測試模組 :)</h2>
<ol>
  <li>在建立新模組時，完整複製此資料夾到新模組資料夾下，可建立基本的檔案結構。</li>
  <li>在templates/<?php echo $this->_tpl_vars['currcfg']['DEFAULT_LANG']; ?>
資料夾底下的style.css預設會被載入，不需額外呼叫</li>
  <li>如果你需要引入其他的CSS樣式檔，可以用下面的方式呼叫：<br /><code>$currtpl -> add_css("x.css");</code></li>
  <li>如果你需要引入其他的JavaScript檔，可以用下面的方式呼叫：<br /><code>$currtpl -> add_js("y.js");</code></li>
  <li>下面是一個資料庫的呼叫和使用範例：<br />
    <div class="table_var">ac_module資料表</div>
    
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['array_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
       <div class="table_value"> <?php echo $this->_tpl_vars['array_2D'][$this->_sections['i']['index']]['module_name']; ?>
 - <?php echo $this->_tpl_vars['array_2D'][$this->_sections['i']['index']]['module_desc']; ?>
 </div>
    <?php endfor; endif; ?>
  </li>
  
  <li>下面是一個權限判斷範例：
    <ol type="a">
      <li>如果你是管理員，你會看到O</li>
      <li>如果你是一般使用者，你會看到X。</li>
    </ol>
    你現在看到的是：<strong><?php echo $this->_tpl_vars['is_admin']; ?>
</strong></li>
</ol>
</div>