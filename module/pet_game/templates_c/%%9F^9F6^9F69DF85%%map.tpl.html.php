<?php /* Smarty version 2.6.26, created on 2011-08-07 14:54:41
         compiled from zh_tw/map.tpl.html */ ?>
<div class="life_main">
	<div class="life_title">
		<a class="close" href="#"></a>
	</div>
	<div class="life_contents">
		<div class="life_content">
			<?php echo $this->_tpl_vars['content']; ?>
 
			<?php if ($this->_tpl_vars['is_question_open']): ?>
				<p class="question">
					Q:<?php echo $this->_tpl_vars['question_array']['question']; ?>

				</p>
				<a class="yes" href="map.php?question_id=<?php echo $this->_tpl_vars['question_array']['id']; ?>
&action=answer&answer=1&type=<?php echo $this->_tpl_vars['type']; ?>
&id=<?php echo $this->_tpl_vars['id']; ?>
"></a>
				<a class="no" href="map.php?question_id=<?php echo $this->_tpl_vars['question_array']['id']; ?>
&action=answer&answer=0&type=<?php echo $this->_tpl_vars['type']; ?>
&id=<?php echo $this->_tpl_vars['id']; ?>
"></a>
				
			<?php endif; ?>
		</div>
	</div>
	<div class="pagination">
		<a class="prev" href="#"></a>
		<a class="next" href="#"></a>
	</div>
</div>