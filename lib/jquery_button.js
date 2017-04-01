$(document).ready(function(){

    var pre_id = '';
    var strUrl = location.search;
	var getPara, ParaVal;
	var aryPara = [];
	var cur_button_id = '';
	
	if (strUrl.indexOf("?") != -1)
	{
		var getSearch = strUrl.split("?");
		getPara = getSearch[1].split("&");
		for (i = 0; i < getPara.length; i++)
		{
			ParaVal = getPara[i].split("=");
			aryPara.push(ParaVal[0]);
			aryPara[ParaVal[0]] = ParaVal[1];
		}
		cur_button_id = aryPara[ParaVal[0]];
  	} 
    
    if(cur_button_id!='')
    {
		$('#sidebar_left > #'+cur_button_id+' > .button_top > .word').animate({"margin-top":"-4px"},150,
			function(){
				$('#sidebar_left > #'+cur_button_id+' > .button_top').animate({"height":"+=3"},0);
				$('#sidebar_left > #'+cur_button_id+' > .button_mid').show();
				$('#sidebar_left > #'+cur_button_id+' > .button_mid').animate({height:
				$('#sidebar_left > #'+cur_button_id+' > .button_mid').find('div').length*25+5}, 800);
			}
		);
	}
	
    $('#sidebar_left > a').click(function(){
    	
        var cur_div_ele_height = $(this).children('div:eq(1)').css('height');
        var id= $(this).attr('id');
        var cur_div = $(this);
        
        if(id!=pre_id && id!="film" && id!="about" || cur_button_id!='')
        {
			if(pre_id!='')
			{
				$('#sidebar_left > #'+pre_id+' > .button_mid').animate({height: 0},500,
               		function(){
               		
               			$('#sidebar_left > #'+pre_id+' > .button_top').animate({"height":"-=3px"},0,
               			function(){
               				$('#sidebar_left > #'+pre_id+' > .button_mid').hide();
                 		   	$('#sidebar_left > #'+pre_id+' > .button_top > .word').animate({"margin-top":"0px"},150);
                    	    /* div:not(#'+id+') 選擇除了目前為這個id的元素外的元素 */
                    		$('#sidebar_left > #'+id+' > .button_top> .word').animate({"margin-top":"-4px"},150,
                    		function(){
                				cur_div.children('div:eq(0)').animate({"height":"+=3"},0);
                           		cur_div.children('div:eq(1)').show();
                           		cur_div.children('div:eq(1)').animate({height:
                            	cur_div.children('div:eq(1)').find('div').length*25+5}, 800);
                            	pre_id = id;
                			}
                		);	
               		});   		
                });
        	}
        	else
        	{
            	$('#sidebar_left > #'+id+' > .button_top> .word').animate({"margin-top":"-4px"},150,
                	function(){
                		cur_div.children('div:eq(0)').animate({"height":"+=3"},0);
                        cur_div.children('div:eq(1)').show();
                        cur_div.children('div:eq(1)').animate({height:
                        cur_div.children('div:eq(1)').find('div').length*25+5}, 800);
                        pre_id = id;
                	}
            	);
            }
        }
        else if( id!="film" && id!="about")
        {
			$('#sidebar_left > #'+id+' > .button_mid').animate({height: 0},500,
               	function(){
               		$('#sidebar_left > #'+id+' > .button_top').animate({"height":"-=3px"},0,
               			function(){
               				$('#sidebar_left > #'+id+' > .button_mid').hide();
							$('#sidebar_left > #'+id+' > .button_top > .word').animate({"margin-top":"0"},150,
								function(){
									/* div:not(#'+id+') 選擇除了目前為這個id的元素外的元素 */
 									pre_id = '';
							}
						);
               		});	
        		}
        	);
 		}
    });
});