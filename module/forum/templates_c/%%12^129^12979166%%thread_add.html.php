<?php /* Smarty version 2.6.26, created on 2011-08-04 21:54:57
         compiled from zh_tw/thread_add.html */ ?>
<form method="post">
    <div class="title">
        <label for="title">標題</label>
        <input id="title" name="title" type="text" />
        <span></span>
    </div>
    <div class="category">
        <label for="category">分類</label>
        <select id="category" name="cid">
            <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
            <option value="<?php echo $this->_tpl_vars['category']['id']; ?>
"><?php echo $this->_tpl_vars['category']['name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
    </div>
    <div class="content">
        <label for="textarea">內容</label>
        <textarea id="textarea" name="content"></textarea>
    </div>
    <div class="submit">
        <?php forum_token_field(); ?>
        <input type="submit" />
    </div>
</form>