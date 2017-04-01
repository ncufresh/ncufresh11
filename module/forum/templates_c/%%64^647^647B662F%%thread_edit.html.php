<?php /* Smarty version 2.6.26, created on 2011-08-05 01:18:07
         compiled from zh_tw/thread_edit.html */ ?>
<form method="post">
    <div class="title">
        <label for="textarea">標題</label>
        <input id="title" name="title" type="text" value="<?php echo $this->_tpl_vars['thread']['title']; ?>
" />
        <span></span>
    </div>
    <div class="category">
        <label for="category">分類</label>
        <select id="category" name="cid">
            <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
            <?php if ($this->_tpl_vars['category']['id'] == $this->_tpl_vars['thread']['cid']): ?>
            <option select="select" value="<?php echo $this->_tpl_vars['category']['id']; ?>
"><?php echo $this->_tpl_vars['category']['name']; ?>
</option>
            <?php else: ?>
            <option value="<?php echo $this->_tpl_vars['category']['id']; ?>
"><?php echo $this->_tpl_vars['category']['name']; ?>
</option>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </select>
    </div>
    <div class="content">
        <label for="textarea">內容</label>
        <textarea id="textarea" name="content"><?php echo $this->_tpl_vars['thread']['content']; ?>
</textarea>
    </div>
    <div class="submit">
        <?php forum_token_field(); ?>
        <input type="submit" />
    </div>
</form>