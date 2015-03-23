$(document).ready(function() {
   $('#Composers div').click(function(event){
        if($('#Composers ul').attr('class') == 'optionsHide')
        {
			$('#Composers').width(149);
            $('#Composers ul').show();
            $('#Composers .separ').show();
            $('#Composers ul').attr('class', 'optionsShow');
            $('#Composers').css('margin-left', -54);
            $('#Composers').css('box-shadow', '0 0 5px 5px black');
        }
        else 
        {
            $('#Composers ul').hide();
            $('#Composers .separ').hide();
            $('#Composers ul').attr('class', 'optionsHide');
            $('#Composers').width(93);
            $('#Composers').css('margin-left', 2);
            $('#Composers').css('box-shadow', 'none');
        }
    });
	
	$('html').click(function(event) {
		if ($(event.target).closest("#Composers div").length === 0) {
			$('#Composers ul').hide();
			$('#Composers .separ').hide();
			$('#Composers ul').attr('class', 'optionsHide');
			$('#Composers').width(93);
			$('#Composers').css('margin-left', 2);
			$('#Composers').css('box-shadow', 'none');
		}
	});
	
	
	
	$('#massPart div').click(function(){
        if($('#massPart ul').attr('class') == 'optionsHide')
        {
            $('#massPart ul').show();
            $('#massPart .separ').show();
            $('#massPart ul').attr('class', 'optionsShow');
            $('#massPart').width(149);
            $('#massPart').css('margin-left', -54);
            $('#massPart').css('box-shadow', '0 0 5px 5px black');
        }
        else 
        {
            $('#massPart ul').hide();
            $('#massPart .separ').hide();
            $('#massPart ul').attr('class', 'optionsHide');
            $('#massPart').width(92);
            $('#massPart').css('margin-left', 2);
            $('#massPart').css('box-shadow', 'none')
        }
    });
	
	$('#category div').click(function(){
        if($('#category ul').attr('class') == 'optionsHide')
        {
            $('#category ul').show();
            $('#category .separ').show();
            $('#category ul').attr('class', 'optionsShow');
            $('#category').width(149);
            $('#category').css('margin-left', -54);
            $('#category').css('box-shadow', '0 0 5px 5px black');
        }
        else 
        {
            $('#category ul').hide();
            $('#category .separ').hide();
            $('#category ul').attr('class', 'optionsHide');
            $('#category').width(92);
            $('#category').css('margin-left', 2);
            $('#category').css('box-shadow', 'none');
        }
    });
	
   $('#searchText').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            $('#searchButton').click();
            return false;  
        }
    });  
    
   $('.VoiceOptions').click(function(){
        GetSongs('', $("input[class='VoiceOptions']:checked").val(), $('#selectedMassPart').attr('class').split('massPart')[1], $('#selectedCategory').attr('class').split('category')[1], $('#selectedComposer').attr('class').split('composer')[1]);
   });
    
   $('.MassPartOptions').click(function(){
        GetSongs('', $("input[class='VoiceOptions']:checked").val(), $('#selectedMassPart').attr('class').split('massPart')[1], $('#selectedCategory').attr('class').split('category')[1], $('#selectedComposer').attr('class').split('composer')[1]);
   });
   $('.CategoryOptions').click(function(){
        GetSongs('', $("input[class='VoiceOptions']:checked").val(), $('#selectedMassPart').attr('class').split('massPart')[1], $('#selectedCategory').attr('class').split('category')[1], $('#selectedComposer').attr('class').split('composer')[1]);
   });

   $('#searchButton').click(function(){
        GetSongs($('#searchText').val(), $("input[class='VoiceOptions']:checked").val(), $('#selectedMassPart').attr('class').split('massPart')[1], $('#selectedCategory').attr('class').split('category')[1], $('#selectedComposer').attr('class').split('composer')[1]);
   });
   
   $('#Composers').change(function(){
        GetSongs('', $("input[class='VoiceOptions']:checked").val(), $('#selectedMassPart').attr('class').split('massPart')[1], $('#selectedCategory').attr('class').split('category')[1], $('#selectedComposer').attr('class').split('composer')[1]);
   })
   
   $('#Composers ul li').click(function(event){
		event.stopPropagation();
        var temp = $(this).text().split(' ');
        var temp2 = '';
        if(temp.length > 1)
        {
            temp2 = temp[0]+' ';
            for(var i=0; i<temp[1].length && i<6;i++)
            temp2+=temp[1][i];
        
            if(temp[1].length > 7 || temp.length > 2)
                if(temp[1].length < 8 && temp.length > 2)
                    $('#Composers .selectedText').text(temp[0]+temp[1]);
                else
                    $('#Composers .selectedText').text(temp2+'.');
            else
                $('#Composers .selectedText').text($(this).text());
        }
        else
            $('#Composers .selectedText').text($(this).text());
        $('#selectedComposer').attr('id', '');
        $(this).find('div').attr('id', 'selectedComposer');
        GetSongs('', $("input[class='VoiceOptions']:checked").val(), $('#selectedMassPart').attr('class').split('massPart')[1], $('#selectedCategory').attr('class').split('category')[1], $('#selectedComposer').attr('class').split('composer')[1]);
        
        $('#Composers ul').hide();
        $('#Composers .separ').hide();
        $('#Composers ul').attr('id', 'optionsHide');
        $('#Composers').width(93);
       
        
    });
	
	$('#massPart ul li').click(function(){
        $('#MassPart .selectedText').text($(this).text());
		$('#MassPart .selectedText').attr('title',$(this).find('div').attr('title'));
        $('#selectedMassPart').attr('id', '');
        $(this).find('div').attr('id', 'selectedMassPart');
        GetSongs($('#searchText').val(), $("input[class='VoiceOptions']:checked").val(), $('#selectedMassPart').attr('class').split('massPart')[1], $('#selectedCategory').attr('class').split('category')[1], $('#selectedComposer').attr('class').split('composer')[1]);
        
        $('#MassPart ul').hide();
        $('#MassPart .separ').hide();
        $('#MassPart ul').attr('id', 'optionsHide');
        $('#MassPart').width(93);
       
        
    });
	
	$('#category ul li').click(function(){
        $('#category .selectedText').text($(this).text());
		$('#category .selectedText').attr('title',$(this).find('div').attr('title'));
        $('#selectedCategory').attr('id', '');
        $(this).find('div').attr('id', 'selectedCategory');
        GetSongs('', $("input[class='VoiceOptions']:checked").val(), $('#selectedMassPart').attr('class').split('massPart')[1], $('#selectedCategory').attr('class').split('category')[1], $('#selectedComposer').attr('class').split('composer')[1]);
        
        $('#category ul').hide();
        $('#category .separ').hide();
        $('#category ul').attr('id', 'optionsHide');
        $('#category').width(93);
       
        
    });

})

function GetSongs(findtext, option, MassPartOptions, CategoryOptions, ComposerOption){
    $.ajax({
        url: "/methods/GetSongs.php",
        type: 'GET',
        data: { songname: findtext, option: option, MassPartOptions: MassPartOptions, CategoryOptions: CategoryOptions, ComposerOption: ComposerOption},
        contentType: 'application/json; charset=utf-8',
        success: function (data) {
            var ret = data.split(';');
            if(ret.length != 1)
            {
                $('#songlist').html("<div><a style=\"font: 20px;\" class = \"folder showfolder\">"+ret[0]+"</a></div>");
                for(i =1; i<ret.length-1;i++)
                {
                    $('#songlist').append("<div><a style=\"font: 20px;\" class = \"folder showfolder\">"+ret[i]+"</a></div>");
                }
             }
             else
                $('#songlist').html("<div><a style=\"font: 20px; color: red;\">Nic nie znaleziono!</a></div>");
             var width = $('#songlist').height();
             if(width>790)
                width = 790;
             $('#content .jspContainer').height(width);
            }
        });
}