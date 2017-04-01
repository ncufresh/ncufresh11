<?php /* Smarty version 2.6.26, created on 2011-08-07 21:08:24
         compiled from zh_tw/threads.html */ ?>
<div class="forum">
<!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="http://ncufresh.snowtec.org/module/forum/templates/zh_tw/threads_ie6.css" />
<![endif]-->
    <div id="contents">
        <div id="threads">
        <span id="style"><?php echo $this->_tpl_vars['style']; ?>
</span>
        <div id="breadcrumbs"><?php echo $this->_tpl_vars['breadcrumbs']; ?>
</div>

        <div class="header">
            <label for="sort">文章排序：</label>
            <select id="sort" name="sort">
                <option value="latest">依最新回覆</option>
                <option value="replies">依回覆數量</option>
                <option value="created">依發表時間</option>
                <option value="like">依喜歡次數</option>
            </select>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'zh_tw/pagination.html', 'smarty_include_vars' => array('pagination' => $this->_tpl_vars['pagination'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>

        <a class="post dialog" href="post.php?action=post&fid=<?php echo $this->_tpl_vars['fid']; ?>
" rel="post">發表文章</a>

        <ul class="category">
            <?php if ($this->_tpl_vars['fid'] != 4): ?>
            <?php if ($this->_tpl_vars['cid'] == 0): ?>
            <li class="current"><a href="#category-0">全部</a></li>
            <?php else: ?>
            <li><a href="#category-0">全部</a></li>
            <?php endif; ?>
            <?php endif; ?>
            <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
            <?php if ($this->_tpl_vars['category']['id'] == $this->_tpl_vars['cid']): ?>
            <li class="current"><a href="#category-<?php echo $this->_tpl_vars['category']['id']; ?>
"><?php echo $this->_tpl_vars['category']['name']; ?>
</a></li>
            <?php else: ?>
            <li><a href="#category-<?php echo $this->_tpl_vars['category']['id']; ?>
"><?php echo $this->_tpl_vars['category']['name']; ?>
</a></li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </ul>

        <table cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="left"></th>
                    <th class="category">分類</th>
                    <th class="title">標題</th>
                    <th class="author">作者</th>
                    <th class="replies">回</th>
                    <th class="likes">讚</th>
                    <th class="time">時間</th>
                    <th class="right"></th>
                </tr>
            </thead>
            <tbody>
                <?php $_from = $this->_tpl_vars['threads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thread']):
?>
                <?php if ($this->_tpl_vars['thread']['sticky']): ?>
                <tr class="sticky">
                <?php else: ?>
                <tr>
                <?php endif; ?>
                    <td class="left"></td>
                    <td>
                        <?php if ($this->_tpl_vars['thread']['sticky']): ?>
                        <img src="<?php echo $this->_tpl_vars['thread']['cfilename']; ?>
" alt="<?php echo $this->_tpl_vars['thread']['cname']; ?>
" />
                        <?php else: ?>
                        <a class="catrgory" href="#category-<?php echo $this->_tpl_vars['thread']['cid']; ?>
">
                            <img src="<?php echo $this->_tpl_vars['thread']['cfilename']; ?>
" alt="<?php echo $this->_tpl_vars['thread']['cname']; ?>
" />
                        </a>
                        <?php endif; ?>
                    </td>
                    <td class="title"><a href="thread.php?tid=<?php echo $this->_tpl_vars['thread']['id']; ?>
&fid=<?php echo $this->_tpl_vars['fid']; ?>
"><?php echo $this->_tpl_vars['thread']['title']; ?>
</a></td>
                    <td><a href="../personal?info_id=<?php echo $this->_tpl_vars['thread']['author_id']; ?>
"><?php echo $this->_tpl_vars['thread']['nickname']; ?>
</a></td>
                    <td><?php echo $this->_tpl_vars['thread']['reply_times']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['thread']['like']; ?>
</td>
                    <td class="time"><?php echo $this->_tpl_vars['thread']['date']; ?>
<br /><?php echo $this->_tpl_vars['thread']['time']; ?>
</td>
                    <td class="right"></td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td class="left"></td>
                    <td colspan="6">沒有任何文章！</td>
                    <td class="right"></td>
                </tr>
                <?php endif; unset($_from); ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="left"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="right"></td>
                </tr>
            </tfoot>
        </table>

        <div style="clear:both;margin-top:30px;">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'zh_tw/pagination.html', 'smarty_include_vars' => array('pagination' => $this->_tpl_vars['pagination'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        </div>
    </div>
</div>