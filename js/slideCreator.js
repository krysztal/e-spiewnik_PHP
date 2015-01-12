$(document).ready(function() {
	$('#SlideCreatorPanel').click(function(){
        if($('.slideCreatorClose').length!=0)
        {
            $('#SlideCreator').show();
            $('#SlideCreatorPanel').attr('class', "slideCreatorOpen")   
        } 
        else
        {
            $('#SlideCreator').hide();
            $('#SlideCreatorPanel').attr('class', "slideCreatorClose")   
        }
   });
   
   $('#AddSongToSlide').click(function(){
		if($('.chouse').length>0)
		{
			var access = true;
			for(var i=0; i<$(".slideItem").length;i++)
			{
				if($(".slideItem")[i].textContent == $('.chouse').text())
					access = false;
			}
			if(access == true)
			{
				$toSlideList = '<div><a class="slideItem">'+$('.chouse').text()+'</a></div>';
				$('#SlideItems').html($('#SlideItems').html()+$toSlideList);
			}
			
		}
   });
   
   $('#RemoveSongToSlide').click(function(){
		if($('.chouseSliderItem').length>0)
		{
			$('.chouseSliderItem').remove();
		}
	});
	
	$('#UpToSlideList').click(function(){
		var number = -1;
		for(var i=0; i<$(".slideItem").length;i++)
		{
			if($(".slideItem")[i].textContent == $('.chouseSliderItem').text())
				number = i;
		}
		if(number > 0)
		{
			var text = $(".slideItem")[number].textContent;
			$(".slideItem")[number].textContent = $(".slideItem")[number-1].textContent;
			$(".slideItem")[number-1].textContent = text;
			
			$('.chouseSliderItem').removeClass("chouseSliderItem");
			$(".slideItem")[number-1].setAttribute("class", "slideItem chouseSliderItem");
		}
	});
	
	$('#GenerateSlides').click(function(){
		var list = $('.slideItem');
		var index, formParam = "";
		for (index = 0; index < list.length; ++index) 
		{
			formParam += '<input type="hidden" name="song'+index+'" value="'+list[index].text+'">';
		}
		$('#MargePDFForm').html(formParam);
		$('#MargePDFForm').submit();
	});
	
	$('#DownToSlideList').click(function(){
		var number = -1;
		for(var i=0; i<$(".slideItem").length;i++)
		{
			if($(".slideItem")[i].textContent == $('.chouseSliderItem').text())
				number = i;
		}
		if(number != $(".slideItem").length-1)
		{
			var text = $(".slideItem")[number].textContent;
			$(".slideItem")[number].textContent = $(".slideItem")[number+1].textContent;
			$(".slideItem")[number+1].textContent = text;
			
			$('.chouseSliderItem').removeClass("chouseSliderItem");
			$(".slideItem")[number+1].setAttribute("class", "slideItem chouseSliderItem");
		}
	});
	
	$('#ClearSlideList').click(function(){
		$('#SlideItems').html('<div style="text-align:center; color:#f8d7b8; font-weight: bold;">Generator słajdów</div>');
	});
	
	
    $('.slideItem').live("click", function(){
		$('.chouseSliderItem').removeClass("chouseSliderItem");
		$(this).addClass("chouseSliderItem");
		$('.chouse').removeClass('chouse');
		$.ajax({
            url: "/methods/OpenFolder.php",
            type: 'GET',
            data: { folder: $(this).text()},
            contentType: 'application/json; charset=utf-8',
            success: function (data) {
                $('#text').html(data);
            },
        });
		$("#InFolder").show();
    });
	
	
	$(".showfolder").live("click", function(){
     if($(".chouse").attr("class")!=null)
     $(".chouse").attr("class",$(".chouse").attr("class").split('chouse')[0]);
     $(this).attr("class",$(this).attr("class")+" chouse");
     

     $("#InFolder").show();
   });
   
   
	$('#CloseSlideList').hover(
    function(){ $(this).attr('src','/image/button_close_hover.png') },
    function(){ $(this).attr('src','/image/button_close.png') }
	);
	
	$('#UpToSlideList').hover(
    function(){ $(this).attr('src','/image/button_up_hover.png') },
    function(){ $(this).attr('src','/image/button_up.png') }
	);
	
	$('#AddSongToSlide').hover(
    function(){ $(this).attr('src','/image/button_plus_hover.png') },
    function(){ $(this).attr('src','/image/button_plus.png') }
	);
	
	$('#RemoveSongToSlide').hover(
    function(){ $(this).attr('src','/image/button_minus_hover.png') },
    function(){ $(this).attr('src','/image/button_minus.png') }
	);
	
	$('#DownToSlideList').hover(
    function(){ $(this).attr('src','/image/button_down_hover.png') },
    function(){ $(this).attr('src','/image/button_down.png') }
	);
	
	$('#GenerateSlides').hover(
    function(){ $(this).attr('src','/image/button_G_hover.png') },
    function(){ $(this).attr('src','/image/button_G.png') }
	);
	
	$('#ClearSlideList').hover(
    function(){ $(this).attr('src','/image/button_clear_hover.png') },
    function(){ $(this).attr('src','/image/button_clear.png') }
	);
	
	$('#CloseSlideList').click(function(){
		$('#SlideCreator').hide();
        $('#SlideCreatorPanel').attr('class', "slideCreatorClose") 
	});
	
	$(".showfolder").live("dblclick", function(){
		if($('.chouse').length>0 && $('.slideCreatorOpen').length>0)
		{
			var access = true;
			for(var i=0; i<$(".slideItem").length;i++)
			{
				if($(".slideItem")[i].textContent == $('.chouse').text())
					access = false;
			}
			if(access == true)
			{
				$toSlideList = '<div><a class="slideItem">'+$('.chouse').text()+'</a></div>';
				$('#SlideItems').html($('#SlideItems').html()+$toSlideList);
			}
			
		}
	});
})