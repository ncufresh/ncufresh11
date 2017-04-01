<?php /* Smarty version 2.6.26, created on 2011-07-30 22:26:23
         compiled from zh_tw/login.tpl.htm */ ?>
  <div class="login_container">
  <h1>使 用 者 登 入</h1>
  <h2>請請輸入帳號、密碼後進行登入：</h2>
  <form action="login.php?action=login" method="post">
  帳號：<input type="text" name="username" style="width: 180px;" /><br />
  密碼：<input type="password" name="password" style="width: 180px;" /><br />
  <input type="hidden" name="redirect_path" value="<?php echo $this->_tpl_vars['redirect_path']; ?>
" />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" name="submit" value="登入" />
  <input type="reset" name="reset" value="重設" />
  <?php if ($this->_tpl_vars['warning_msg'] == TRUE): ?><span class="warning_msg" style="font-size: 12px;">登入失敗，請檢查帳號與密碼是否正確！</span><?php endif; ?>
  </form><br />
  </div>