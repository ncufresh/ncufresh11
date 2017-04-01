<?php /* Smarty version 2.6.26, created on 2011-08-23 00:48:01
         compiled from zh_tw/index.tpl.htm */ ?>

<script type="text/javascript">
    $(document).ready(function() {
                    $('#mycarousel').jcarousel();
                            video_name = new Array() ;
                                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['video_name']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                video_name.push('<?php echo $this->_tpl_vars['video_name'][$this->_sections['i']['index']]; ?>
') ;
                                                        <?php endfor; endif; ?>
                                                                $('.video_description > p').hide() ;
                                                                        $('.video_description > p').eq(0).show() ;
                                                                                $('.jcarousel-skin-tango > div > div input').hover(function(e){
                                                                                                $('<div id="bubble"></div>').prependTo('body') ;
                                                                                                            $('#bubble').hide() ;
                                                                                                                        var len = video_name[$(this).attr('id')].length ;
                                                                                                                                    $('#bubble').css({
                                                                                                                                                        'left' : ($(this).offset().left)+'px',
                                                                                                                                                                        'top' : ($(this).offset().top-33)+'px'
                                                                                                                                                                                    }) ;
                                                                                                                                                $('#bubble').html(video_name[$(this).attr('id')]) ;
                                                                                                                                                            $('#bubble').fadeIn(500) ;
                                                                                                                                                                    }, function(){
                                                                                                                                                                                $('#bubble').fadeOut(300, function(){$(this).remove();}) ;
                                                                                                                                                                                        }) ;
                                                                                    });
</script> 
<script type="text/javascript">
    function onClick(button){
                $('#ytplayer').remove() ;
                        $('.video_description > p').hide() ;
                                $('.video_description > p').eq($(button).attr('id')).fadeIn(300) ;
                                        $('<div id="ytplayer"></div>').appendTo('.wrapper') ;
                                                if($('#warning').length > 0)
                                                                $('#warning').remove() ;
                                                        if($(button).attr('id') == '1' || $(button).attr('id') == '2'){
                                                                        $('#ytplayer').hide() ;
                                                                                    $('<div id="warning"></div>').prependTo('.wrapper') ;
                                                                                                $('<br/><div id="accept">繼續</div>').appendTo('#warning') ;
                                                                                                            $('#accept').click(function(){
                                                                                                                                    $('#warning').remove() ;
                                                                                                                                                    $('#ytplayer').show() ;
                                                                                                                                                                }) ;
                                                                                                                        $('#not_accept').click(function(){
                                                                                                                                                $('#warning').remove() ;
                                                                                                                                                                $('#ytplayer').show() ;
                                                                                                                                                                                $('.jcarousel-skin-tango > div > div input').eq(0).click() ;
                                                                                                                                                                                            }) ;
                                                                                                                                }
                                                                if($(button).attr('id') != '0'){
                                                                                $('#video00_temp').hide() ;
                                                                                            $('#ytplayer').youTubeEmbed({
                                                                                                                    video : $(button).val(),
                                                                                                                                    width : 480,
                                                                                                                                                    progressBar : true
                                                                                                                                                                    }) ;
                                                                                                    }
                                                                        else
                                                                                        $('#video00_temp').show() ;
                                                                            }
</script>
<script>
    $(document).ready(function(){
                    $('#ytplayerId').hide() ;
                            /*
                                    var url = $('#ytplayerId').val() ;
                                            $('#ytplayer').youTubeEmbed({
                                                        video : url,
                                                                    width : 480,
                                                                                progressBar : true 
                                                                                            }) ;
                                                                                                    */
                            //$('<iframe id="ytembed" width="480" height="260" src="http://www.youtube.com/embed/YFpGMYaciag" frameborder="0" allowfullscreen></iframe>').prependTo('#ytplayer') ;
                        }) ;
</script>

<div class="new_module_main">
<div class="video_main">
    <div class="wrapper">
            <input value="<?php echo $this->_tpl_vars['videoSrc'][0][2]; ?>
" id="ytplayerId" />
                    <div id="ytplayer"></div>
                            <div id="video00_temp">
                                        請至以下連結觀看影片，謝謝。<br /><hr />
                                                    <li><a href="http://vlog.xuite.net/play/YllPRkx0LTM4MjMzNDUuZmx2" target="_blank">未知旅 part1</a></li>
                                                                <li><a href="http://vlog.xuite.net/play/YnJDMjljLTM4MjM3MjYuZmx2" target="_blank">未知旅 part2</a></li>
                                                                        </div>
                                                                            </div>
                                                                                <div class="video_description">
                                                                                        <p >
                                                                                                    失敗不是一事無成，只是結果不美好。當你想做的事跟實際情況差距十萬八千，別氣餒！
                                                                                                                你不是夢想的終結者，只是把成功的路鋪得更細膩，更值得回味了。
                                                                                                                            這是一段旅程的開頭，把包袱丟掉，在這裡吸收萌芽吧！
                                                                                                                                    </p>
                                                                                                                                            <p>
                                                                                                                                                        一群剛上中央的好友們離奇地撿到一隻手機後，他們的一切就開始改變了...
                                                                                                                                                                    這也許...是前世人留下的怨念，千萬別輕蔑它，否則招來不幸......
                                                                                                                                                                            </p>
                                                                                                                                                                                    <p>
                                                                                                                                                                                                一群剛上中央的好友們離奇地撿到一隻手機後，他們的一切就開始改變了...
                                                                                                                                                                                                            這也許...是前世人留下的怨念，千萬別輕蔑它，否則招來不幸......
                                                                                                                                                                                                                    </p>
                                                                                                                                                                                                                            <p>
                                                                                                                                                                                                                                        名偵探拔辣與委託人蛋頭為了找出偷東西的兇手，遊走於各宿舍間，
                                                                                                                                                                                                                                                    究竟，他們是否能夠順利揪出犯人呢...
                                                                                                                                                                                                                                                            </p>
                                                                                                                                                                                                                                                                    <p>
                                                                                                                                                                                                                                                                                有人說中央是美食的沙漠，
                                                                                                                                                                                                                                                                                            但荒蕪的沙漠中還是會有綠洲的
                                                                                                                                                                                                                                                                                                        想知道這裡的綠洲在那嗎?!
                                                                                                                                                                                                                                                                                                                    現在就跟著我們的美食記者一起去看一下吧! Go
                                                                                                                                                                                                                                                                                                                            </p>
                                                                                                                                                                                                                                                                                                                                    <p>
                                                                                                                                                                                                                                                                                                                                                成天宅宿舍的賴打，因緣際會下遇到了自己的夢中情人，究竟在好朋友的幫助之下
                                                                                                                                                                                                                                                                                                                                                            ，賴打能不能如願以償的追到她呢?
                                                                                                                                                                                                                                                                                                                                                                    </p>
                                                                                                                                                                                                                                                                                                                                                                            <p>
                                                                                                                                                                                                                                                                                                                                                                                        依涵—一個大一新生，在緣分下與學長蘇維相識，一直以為只是普通朋友的她，卻不知自己已悄悄喜歡上他，
                                                                                                                                                                                                                                                                                                                                                                                                    就在確定心意之時，卻看到學長與他的學妹…
                                                                                                                                                                                                                                                                                                                                                                                                            </p>
                                                                                                                                                                                                                                                                                                                                                                                                                </div>  
                                                                                                                                                                                                                                                                                                                                                                                                                    <ul id="mycarousel" class="jcarousel-skin-tango">
                                                                                                                                                                                                                                                                                                                                                                                                                            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['videoSrc']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                                                                                                                                                                                                                                                                                                                                                                                                        <li><input type="image" src="<?php echo $this->_tpl_vars['videoSrc'][$this->_sections['i']['index']][1]; ?>
" value="<?php echo $this->_tpl_vars['videoSrc'][$this->_sections['i']['index']][2]; ?>
" id="<?php echo $this->_sections['i']['index']; ?>
" onclick="onClick(this)" width="139px" height="90px" alt="" /></li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                <?php endfor; endif; ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    </ul>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>