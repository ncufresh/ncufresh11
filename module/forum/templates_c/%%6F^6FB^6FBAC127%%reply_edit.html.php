<?php /* Smarty version 2.6.26, created on 2011-08-03 20:38:21
         compiled from zh_tw/reply_edit.html */ ?>
<form method="post">
    <div class="content">
        <label for="textarea">¤º®e</label>
        <textarea id="textarea" name="content"><?php echo $this->_tpl_vars['reply']['content']; ?>
</textarea>
    </div>
    <div class="submit">
        <?php forum_token_field(); ?>
        <input type="submit" />
    </div>
</form>