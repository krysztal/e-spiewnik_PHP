var audio;
var valClick = false;
audio = new Audio();

$(document).ready(function(){
   var element = jQuery('#MusicText').jScrollPane({autoReinitialise: true, maintainPosition: false});
   var element2 = jQuery('#Composers ul').jScrollPane({autoReinitialise: true, maintainPosition: false});
   //var element3 = jQuery('#SlideCreatorSongList').jScrollPane({autoReinitialise: true, maintainPosition: false});
   var api = element.data('jsp');
   $('#pause').hide();
   var contentHeight = $(document).context.body.clientHeight-$('#footer').height()-40-$('#player').height();
   $("#content").attr("style","max-height: "+contentHeight+"px; height:auto");
   
   
   
   $("#InFolder").attr("style","min-height: "+contentHeight+"px;");
   $("#InFolder").attr("style",$("#InFolder").attr("style")+" max-height: "+contentHeight+"px;");
   $("#InFolder").hide();
   $("#footer").attr("style","width: "+ (screen.width-40) +"px;");
   $(".showfolder").live("click", function(){
	 $('.chouse').removeClass("chouse");
	 $(this).addClass("chouse");
     $('.chouseSliderItem').removeClass('chouseSliderItem');
     $.ajax({
            url: "/methods/OpenFolder.php",
            type: 'GET',
            data: { folder: $(this).text()},
            contentType: 'application/json; charset=utf-8',
            success: function (data) {
                $('#SongContent').html(data);
				element = jQuery('#MusicText').jScrollPane({autoReinitialise: true, maintainPosition: false});
				$("#MusicText").attr("style",$("#MusicText").attr("style")+" max-height: "+(contentHeight-155)+"px;");
            },
        });

     $("#InFolder").show();
   });
   
   $('.musicVersionsItem').live("click", function(){
		if(!$(this).hasClass("selectedMVI"))
		{
			$('.selectedMVI').removeClass("selectedMVI");
			$(this).addClass("selectedMVI");
			$.ajax({
				url: "/methods/GetSongComponent.php",
				type: 'GET',
				data: { folderName: $('#NameOfSongV').attr("folderName"), composerId: $(this).attr("composerId")},
				contentType: 'application/json; charset=utf-8',
				success: function (data) {
					$('#MusicMaterials').html(data);
				}
			});
		}
   });
   
   $('#ALL_Voice').live("click", function(){
		audio.pause();
		audio = new Audio($(this).attr('link'));
		
		audio.play();
		audio.volume = 0.6;
		audio.loop = true;
		$('#play').hide();
		$('#pause').show();
		showDuration();
    //document.getElementById("audioplayer").sendToUppod("file:"+$(this).attr('link'));
   });

   $('#play').click(function(){
		if(audio.readyState != 0)
		{
			audio.play();
			$('#play').hide();
			$('#pause').show();
			showDuration();
		}
   });
   
   $('#pause').click(function(){
		audio.pause();
		$('#pause').hide();
		$('#play').show();
   });
   
   $('#stop').click(function(){
		audio.pause();
		audio.currentTime = 0;
		$('#pause').hide();
		$('#play').show();
   });
   
   $('#progressBar').click(function(e){
		var proc = 100*(e.pageX-$('#progressBar').position().left)/$('#progressBar').width();
		audio.currentTime = proc*audio.duration/100;
   });
   
   $('#volume').click(function(e){
		var proc = 100*(e.pageX-$('#volume').position().left)/$('#volume').width();
		if(proc>80)
		{
			audio.volume = 1;
			$('#volume').css('background','url("../image/vol6.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
		}
		else if(proc>60)
		{
			audio.volume = 0.8;
			$('#volume').css('background','url("../image/vol5.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
		}
		else if(proc>40)
		{
			audio.volume = 0.6;
			$('#volume').css('background','url("../image/vol4.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
		}
		else if(proc>20)
		{
			audio.volume = 0.4;
			$('#volume').css('background','url("../image/vol3.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
		}
		else if(proc>0)
		{
			audio.volume = 0.2;
			$('#volume').css('background','url("../image/vol2.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
		}
		else
		{
			audio.volume = 0.0;
			$('#volume').css('background','url("../image/vol.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
		}
   });
   $('#volume').mousedown(function(){
		valClick = true;
   });
   
   $(document).mouseup(function(){
		valClick = false;
   });
   
   $('#volume').mousemove(function(e){
		if(valClick == true)
		{
			var proc = 100*(e.pageX-$('#volume').position().left)/$('#volume').width();
			if(proc>80)
			{
				audio.volume = 1;
				$('#volume').css('background','url("../image/vol6.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
			}
			else if(proc>60)
			{
				audio.volume = 0.8;
				$('#volume').css('background','url("../image/vol5.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
			}
			else if(proc>40)
			{
				audio.volume = 0.6;
				$('#volume').css('background','url("../image/vol4.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
			}
			else if(proc>20)
			{
				audio.volume = 0.4;
				$('#volume').css('background','url("../image/vol3.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
			}
			else if(proc>0)
			{
				audio.volume = 0.2;
				$('#volume').css('background','url("../image/vol2.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
			}
			else
			{
				audio.volume = 0.0;
				$('#volume').css('background','url("../image/vol.png") repeat scroll 0 0 / cover  rgba(0, 0, 0, 0)')
			}
		}
		
   });
   
 });
 
 function showDuration(){
	$(audio).bind('timeupdate', function(){
		//Get hours and minutes
		if(isNaN(parseInt(audio.duration)) != true)
		{
			var s = parseInt(audio.currentTime % 60);
			var m = parseInt((audio.currentTime / 60) % 60);
			//Add 0 if seconds less than 10
			if (s < 10) {
				s = '0' + s;
			}
			$('#duration').html(m + ':' + s);	
			
			s = parseInt(audio.duration % 60);
			m = parseInt((audio.duration / 60) % 60);
			//Add 0 if seconds less than 10
			if (s < 10) {
				s = '0' + s;
			}
			$('#durationFullTime').html(m + ':' + s);	
			
			var value = 0;
			if (audio.currentTime > 0) {
				value = Math.floor((100 / audio.duration) * audio.currentTime);
			}
			$('#progress').css('width',value+'%');
		}
	});
}



