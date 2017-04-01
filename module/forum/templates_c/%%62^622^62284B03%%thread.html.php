<?php /* Smarty version 2.6.26, created on 2011-08-07 17:10:20
         compiled from zh_tw/thread.html */ ?>
<div class="forum">
<!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="http://ncufresh.snowtec.org/module/forum/templates/zh_tw/thread_ie6.css" />
<![endif]-->
    <div id="contents">
        <span id="nickname"><?php echo $this->_tpl_vars['nickname']; ?>
</span>
        <span id="style"><?php echo $this->_tpl_vars['style']; ?>
</span>
        <div id="breadcrumbs"><?php echo $this->_tpl_vars['breadcrumbs']; ?>
</div>

        <a class="reply dialog" href="post.php?action=reply&fid=<?php echo $this->_tpl_vars['fid']; ?>
&tid=<?php echo $this->_tpl_vars['tid']; ?>
" rel="reply">回覆文章</a>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'zh_tw/pagination.html', 'smarty_include_vars' => array('pagination' => $this->_tpl_vars['pagination'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php if ($this->_tpl_vars['thread']): ?>
        <div id="topic">
            <div class="profile">
                <div class="header"></div>
                <div class="data">
                    <a href="../personal?info_id=<?php echo $this->_tpl_vars['thread']['author_id']; ?>
">
                        <img src="<?php echo $this->_tpl_vars['thread']['icon']; ?>
" alt="<?php echo $this->_tpl_vars['thread']['nickname']; ?>
" />
                    </a>
                    <dl>
                        <dt>暱稱：</dt>
                        <dd><?php echo $this->_tpl_vars['thread']['nickname']; ?>
</dd>
                        <dt>帳號：</dt>
                        <dd><?php echo $this->_tpl_vars['thread']['username']; ?>
</dd>
                        <dt>系所：</dt>
                        <dd><?php echo $this->_tpl_vars['thread']['department']; ?>
</dd>
                        <dd class="contact"><a href="../personal?info_id=<?php echo $this->_tpl_vars['thread']['author_id']; ?>
">拜訪我！</a></dd>
                    </dl>
                </div>
                <div class="footer"></div>
            </div>
            <div class="content">
                <h4 class="title"><?php if ($this->_tpl_vars['admin']): ?><a href="post.php?action=sticky&fid=<?php echo $this->_tpl_vars['thread']['forum_id']; ?>
&tid=<?php echo $this->_tpl_vars['thread']['id']; ?>
"><?php if ($this->_tpl_vars['thread']['sticky']): ?>降<?php else: ?>頂<?php endif; ?></a><?php endif; ?><?php echo $this->_tpl_vars['thread']['title']; ?>
</h4>
                <div class="header"></div>
                <div class="content">
                    <div class="text">
                        <?php echo $this->_tpl_vars['thread']['content']; ?>

                    </div>
                </div>
                <p class="time">最後編輯時間：<?php echo $this->_tpl_vars['thread']['time']; ?>
<?php if ($this->_tpl_vars['thread']['update_times'] > 0): ?>，修改了<?php echo $this->_tpl_vars['thread']['update_times']; ?>
次<?php endif; ?>。</p>
                <div class="buttons">
                    <span class="likes">&nbsp;X&nbsp;<span><?php echo $this->_tpl_vars['thread']['like']; ?>
</span></span>
                    <a class="like" href="post.php?action=like&tid=<?php echo $this->_tpl_vars['thread']['id']; ?>
">喜歡</a>
                    <?php if ($this->_tpl_vars['uid'] == $this->_tpl_vars['thread']['author_id'] || $this->_tpl_vars['admin']): ?>
                    <a class="edit dialog" href="post.php?action=edit&eid=<?php echo $this->_tpl_vars['thread']['id']; ?>
" rel="edit">編輯</a>
                    <a class="delete" href="post.php?action=delete&did=<?php echo $this->_tpl_vars['thread']['id']; ?>
">刪除</a>
                    <?php endif; ?>            
                </div>
                <div class="commits">
                    <div class="moveup"></div>
                    <?php $_from = $this->_tpl_vars['thread']['commits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['commit']):
?>
                    <div class="commit">
                        <?php if ($this->_tpl_vars['admin']): ?>
                        <a class="delete" href="post.php?action=deletecommit&did=<?php echo $this->_tpl_vars['commit']['id']; ?>
">砍</a>
                        <?php endif; ?>
                        <div class="end"></div>
                        <p><?php echo $this->_tpl_vars['commit']['nickname']; ?>
: <?php echo $this->_tpl_vars['commit']['content']; ?>
</p>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                    <div class="movedown"></div>
                    <form id="commitform-<?php echo $this->_tpl_vars['thread']['id']; ?>
">
                        <div class="end"></div>
                        <input name="content" type="text" />
                        <a class="push" href="post.php?action=commit&tid=<?php echo $this->_tpl_vars['thread']['id']; ?>
" rel="commitform-<?php echo $this->_tpl_vars['thread']['id']; ?>
">推文</a>
                    </form>
                </div>
                <div class="footer"></div>
            </div>
        </div>
        <?php endif; ?>

        <?php $_from = $this->_tpl_vars['replies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reply']):
?>
        <div class="response">
            <div class="profile">
                <div class="header"></div>
                <div class="data">
                    <a href="../personal?info_id=<?php echo $this->_tpl_vars['reply']['author_id']; ?>
">
                        <img src="<?php echo $this->_tpl_vars['reply']['icon']; ?>
" alt="<?php echo $this->_tpl_vars['reply']['nickname']; ?>
" />
                    </a>
                    <dl>
                        <dt>暱稱：</dt>
                        <dd><?php echo $this->_tpl_vars['reply']['nickname']; ?>
</dd>
                        <dt>帳號：</dt>
                        <dd><?php echo $this->_tpl_vars['reply']['username']; ?>
</dd>
                        <dt>系所：</dt>
                        <dd><?php echo $this->_tpl_vars['reply']['department']; ?>
</dd>
                        <dd class="contact"><a href="../personal?info_id=<?php echo $this->_tpl_vars['reply']['author_id']; ?>
">拜訪我！</a></dd>
                    </dl>
                </div>
                <div class="footer"></div>
            </div>
            <div class="content">
                <div class="header">
                    <div class="number">#<?php echo $this->_tpl_vars['reply']['number']; ?>
</div>
                </div>
                <div class="content">
                    <div class="text">
                        <?php echo $this->_tpl_vars['reply']['content']; ?>

                    </div>
                </div>
                <p class="time">最後編輯時間：<?php echo $this->_tpl_vars['reply']['time']; ?>
<?php if ($this->_tpl_vars['reply']['update_times'] > 0): ?>，修改了<?php echo $this->_tpl_vars['reply']['update_times']; ?>
次<?php endif; ?>。</p>
                <div class="buttons">
                    <span class="likes">&nbsp;X&nbsp;<span><?php echo $this->_tpl_vars['reply']['like']; ?>
</span></span>
                    <a class="like" href="post.php?action=like&tid=<?php echo $this->_tpl_vars['reply']['id']; ?>
">喜歡</a>
                    <?php if ($this->_tpl_vars['uid'] == $this->_tpl_vars['reply']['author_id'] || $this->_tpl_vars['admin']): ?>
                    <a class="edit dialog" href="post.php?action=replyedit&eid=<?php echo $this->_tpl_vars['reply']['id']; ?>
" rel="edit">編輯</a>
                    <a class="delete" href="post.php?action=delete&did=<?php echo $this->_tpl_vars['reply']['id']; ?>
">刪除</a>
                    <?php endif; ?>
                </div>
                <div class="commits">
                    <div class="moveup"></div>
                    <?php $_from = $this->_tpl_vars['reply']['commits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['commit']):
?>
                    <div class="commit">
                        <?php if ($this->_tpl_vars['admin']): ?>
                        <a class="delete" href="post.php?action=deletecommit&did=<?php echo $this->_tpl_vars['commit']['id']; ?>
">砍</a>
                        <?php endif; ?>
                        <div class="end"></div>
                        <p><?php echo $this->_tpl_vars['commit']['nickname']; ?>
: <?php echo $this->_tpl_vars['commit']['content']; ?>
</p>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                    <div class="movedown"></div>
                    <form id="commitform-<?php echo $this->_tpl_vars['reply']['id']; ?>
">
                        <div class="end"></div>
                        <input name="content" type="text" />
                        <a class="push" href="post.php?action=commit&tid=<?php echo $this->_tpl_vars['reply']['id']; ?>
" rel="commitform-<?php echo $this->_tpl_vars['reply']['id']; ?>
">推文</a>
                    </form>
                </div>
                <div class="footer"></div>
            </div>
        </div>
        <?php endforeach; endif; unset($_from); ?>

        <div style="clear:both;margin-top:30px;">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'zh_tw/pagination.html', 'smarty_include_vars' => array('pagination' => $this->_tpl_vars['pagination'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
</div>