<?php /* Smarty version 2.6.26, created on 2011-08-11 21:14:28
         compiled from zh_tw/pagination.html */ ?>
<ul id="pagination">
<?php if ($this->_tpl_vars['pagination']['page'] > 1): ?>
    <li class="first">
        <a href="<?php echo $this->_tpl_vars['pagination']['url']; ?>
&page=1">第一頁</a>
    </li>
<?php else: ?>
    <li class="first disabled">
        <a href="#">第一頁</a>
    </li>
<?php endif; ?>
<?php if ($this->_tpl_vars['pagination']['page'] > $this->_tpl_vars['pagination']['prev']): ?>
    <li class="prev">
        <a href="<?php echo $this->_tpl_vars['pagination']['url']; ?>
&page=<?php echo $this->_tpl_vars['pagination']['prev']; ?>
">上一頁</a>
    </li>
<?php else: ?>
    <li class="prev disabled">
        <a href="#">上一頁</a>
    </li>
<?php endif; ?>
<?php 
$begin = $this->_tpl_vars['pagination']['page'] - 2;

if ( $begin < 1 ) $begin = 1;

$end = $begin + 4;

if ( $end >= $this->_tpl_vars['pagination']['pages'] ) {
    $end = $this->_tpl_vars['pagination']['pages'];
    $begin = $end - 4;
    if ( $begin < 1 ) $begin = 1;
}

if ( $begin > 1 ) echo '<li class="none">...</li>';

for ( $i = $begin ; $i <= $end ; ++$i ) {
    if ( $i == $this->_tpl_vars['pagination']['page'] ) {
        echo '<li class="current">' . $i . '</li>';
    } else {
        echo '<li><a href="' . $this->_tpl_vars['pagination']['url'] . '&page=' . $i . '">' . $i . '</a></li>';
    }
}

if ( $this->_tpl_vars['pagination']['pages'] - $end > 0 ) echo '<li class="none">...</li>';
 ?>
<?php if ($this->_tpl_vars['pagination']['page'] < $this->_tpl_vars['pagination']['next']): ?>
    <li class="next">
        <a href="<?php echo $this->_tpl_vars['pagination']['url']; ?>
&page=<?php echo $this->_tpl_vars['pagination']['next']; ?>
">下一頁</a>
    </li>
<?php else: ?>
    <li class="next disabled">
        <a href="#">下一頁</a>
    </li>
<?php endif; ?>
<?php if ($this->_tpl_vars['pagination']['page'] < $this->_tpl_vars['pagination']['pages']): ?>
    <li class="last">
        <a href="<?php echo $this->_tpl_vars['pagination']['url']; ?>
&page=<?php echo $this->_tpl_vars['pagination']['pages']; ?>
">最終頁</a>
    </li>
<?php else: ?>
    <li class="last disabled">
        <a href="#">最終頁</a>
    </li>
<?php endif; ?>
</ul>