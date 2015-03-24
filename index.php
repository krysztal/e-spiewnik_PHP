<?php
    include_once 'methods/connection.php';

    $sql = "SELECT Name FROM Songs ORDER BY Name ASC;";
    $result = mysql_query($sql, $db_server)
        or die("Invalid query: " . mysql_error());

    $filesarray = array();
    while($row = mysql_fetch_row($result))
    {
        array_push ($filesarray,$row[0]);
    }     
    

    $sql = "SELECT Id, Name, FullName FROM MassPart;";
    $result = mysql_query($sql, $db_server)
        or die("Invalid query: " . mysql_error());
    
	$toMassParts = "";
	while ($row = mysql_fetch_row($result))
    {
        $toMassParts .= '<li><div title="'.$row[2].'" class="massPart'.$row[0].'">'.$row[1].'</div></li>';
    }
	
	/*
    $toMassParts = '<form><table>';
    while ($row = mysql_fetch_row($result))
    {
        $toMassParts .= '<tr><td><div title="'.$row[2].'" style="color: whitesmoke;">'.$row[1].'</div></td><td><input checked="false" type="radio" class="MassPartOptions" value="'.$row[0].'" name="MassPartOptions"/></td></tr>';
    }  
    $toMassParts .= '<tr><td><div title="Wszyskie Opcje" style="color: whitesmoke;">Wszystkie</div></td><td><input checked="true" type="radio" class="MassPartOptions" value="0" name="MassPartOptions"/></td></tr></table></form>';
    */
    
    $sql = "SELECT Id, Name, FullName FROM Category;";
    $result = mysql_query($sql, $db_server)
        or die("Invalid query: " . mysql_error());
    
	$toCategory = '';
	while ($row = mysql_fetch_row($result))
    {
        $toCategory .= '<li><div title="'.$row[2].'" class="category'.$row[0].'">'.$row[1].'</div></li>';
    }
	/*
    $toCategory = '<form><table>';
    while ($row = mysql_fetch_row($result))
    {
        $toCategory .= '<tr><td><div title="'.$row[2].'" style="color: whitesmoke;">'.$row[1].'</div></td><td><input checked="false" type="radio" class="CategoryOptions" value="'.$row[0].'" name="CategoryOptions"/></td></tr>';
    }  
    $toCategory .= '<tr><td><div title="Wszyskie Opcje" style="color: whitesmoke;">Wszystkie</div></td><td><input checked="true" type="radio" class="CategoryOptions" value="0" name="CategoryOptions"/></td></tr></table></form>';
    */
    
    $sql = "SELECT Composers.Id, Name, SurName as counts FROM Composers JOIN SongToComposer ON SongToComposer.Composers_Id = Composers.Id GROUP BY SongToComposer.Composers_Id ORDER BY count(SongToComposer.Composers_Id) DESC ;";
    $result = mysql_query($sql, $db_server)
        or die("Invalid query: " . mysql_error());
    $toComposers = '';       
    while ($row = mysql_fetch_row($result))
    {
        if($row[1] == 'Nieznany')
            $toComposers .= '<li><div class="composer'.$row[0].'">'.$row[1].'</div></li>';
        else
            $toComposers .= '<li><div class="composer'.$row[0].'">'.$row[1][0].'. '.$row[2].'</div></li>';
    }
    
    $toHtml = "";
    for($i=0; $i<count($filesarray); $i++)
    {
	   if($filesarray[$i]!='.'&& $filesarray[$i]!='..')
        $toHtml = $toHtml.'<div><a style="font: 20px;" class = "folder showfolder">'.$filesarray[$i].'</a></div>';
    }
?>
 

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>e-spiewnik</title>
		 <link href="css/main.css" rel="stylesheet" type="text/css" /> 
		 <link type="text/css" rel="stylesheet" href="css/jquery.jscrollpane.css"/>
		 <link href="/favicon.ico" rel="shortcut icon">
		 <script src="js/jQuery.js" type="text/javascript"></script>
		 <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		 <script type="text/javascript" src="js/jquery.jscrollpane.js"></script>
		 <script src="js/player.js" type="text/javascript"></script>
		 <script src="js/findFillter.js" type="text/javascript"></script>
		 <script src="js/slideCreator.js" type="text/javascript"></script>
		 <script type="text/javascript">
		 jQuery(function()
		 {
			var element = jQuery('#content').jScrollPane({autoReinitialise: true, maintainPosition: false});
			
		 });
		</script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-39737249-2', 'auto');
			ga('send', 'pageview');

		</script>
     </head>
     <body>
     <table style="margin-left: auto; margin-right: auto;" cellspacing="0" cellpadding="0">
        <tr>
            <td>
			
			
				<!--
                <div id="player">
                	<div id="audioplayer"></div>
                    <script type="text/javascript">
                       var flashvars = {uid:"audioplayer", m:"audio",file:"http://localhost/1.mp3",st:"http://localhost/player/audio151-125.txt"};
                       var params = {bgcolor:"#ffffff", wmode:"window", allowFullScreen:"true", allowScriptAccess:"always"};
                       new swfobject.embedSWF("http://localhost/player/uppod.swf", "audioplayer", "844", "35", "10.0.0.0", false, flashvars, params);  
                    </script>
                </div>
				-->
				<div id="player" onselectstart="return false" onmousedown="return false">
					<div id="buttons">
					<table cellspacing="0" cellpadding="0"><tr>
						<td><span title="Odtwarzaj" id="play"></span></td>
						<td><span title="Wstrzymaj" id="pause"></span></td>
						<td class="buttonSpace"></td>
						<td><span title="Zatrzymaj" id="stop"></span></td>
						<td class="buttonSpace"></td>
						<td><span id="duration">0:00</span></td>
						<td class="buttonSpace"></td>
						<td><div id="progressBar">
								<span id="progress"></span>
							</div>
						</td>
						<td class="buttonSpace"></td>
						<td><span id="durationFullTime">0:00</span></td>
						<td class="buttonSpace"></td>
						<td><span title="Głosność" id="volume"></span></td>
						<td class="buttonSpace"></td>
						<td><span title="Generator słajdów" id="SlideCreatorPanel" class="slideCreatorClose"></span></td>
						<td class="buttonSpace"></td>
					</tr></table>
					</div>
				</div>
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td style="vertical-align: top;">
                            <div id="content">
                                <div id="songlist" style="margin-left: 30px;">
                                <?php echo $toHtml ?>
                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td style="vertical-align: top; width:550px;">
                            <div style="display: none;" id="SlideCreator">
								<table cellspacing="0" cellpadding="0">
									<tr>
										<td style="vertical-align: top;">
											<div id="SlideCreatorSongList">
												<form id="MargePDFForm" target="_blank" action="/methods/merge_pdf.php" style="margin:0;"></form>
												<div id="SlideItems">
													<div style="text-align:center; color:#f8d7b8; font-weight: bold;">Generator słajdów</div>
												<div>
											</div>
										</td>
										<td style="vertical-align: top;">
											<div>
												<div><img title="Zamknij generator" id="CloseSlideList" src="/image/button_close.png"/></div>
												<div><img title="Przesuń pieśń do góry" id="UpToSlideList" src="/image/button_up.png"/></div>
												<div><img title="Przesuń pieśń do dołu" id="DownToSlideList" src="/image/button_down.png"/></div>
												<div><img title="Dodaj pieśń" id="AddSongToSlide" src="/image/button_plus.png"/></div>
												<div><img title="Wykasuj pieśń" id="RemoveSongToSlide" src="/image/button_minus.png"/></div>
												<div><img title="Wyczyść" id="ClearSlideList" src="/image/button_clear.png"/></div>
												<div><img title="Generuj słajdy" id="GenerateSlides" src="/image/button_G.png"/></div>
											</div>
										</td>
									</tr>
								</table>
                            </div>
							<div id="InFolder">
								
								
                                <div id="SongContent">
								
                                </div>
								
                            </div>
                        </td>
                        <td id="FilterList" style="vertical-align: top;">
                            <div style="margin-bottom: 15px;" id="Search">
                                <div>
                                    <input style="width: 90px; margin-left: 4px; margin-top: 4px;" id="searchText" name="name" type="text" />
                                </div>
                                <div>
                                    <div id="searchButton"></div>
                                </div>
                            </div>
                            <div class="Filter" onmousedown="return false" onselectstart="return false">
                                <div style="text-align: center; color: #F8D7B8;">Ilość głosów</div>
                                <form>
                                    <table>
                                        <tr>
                                            <td>
                                                <div style="color: whitesmoke;">Wiele</div>
                                            </td>
                                            <td>
                                                <input type="radio" class="VoiceOptions" value="manyVoice" name="VoiceOptions"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="color: whitesmoke;">Jeden</div>
                                            </td>
                                            <td>
                                                <input type="radio" class="VoiceOptions" value="oneVoice" name="VoiceOptions"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="color: whitesmoke;">Wszystkie</div>
                                            </td>
                                            <td>
                                                <input checked="true" type="radio" class="VoiceOptions" value="allVoiceOptions" name="VoiceOptions"/>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <div style="height: 48px; margin-bottom: 15px;" class="Filter" onmousedown="return false" onselectstart="return false">
								<div class="filterName">Kompozytor</div>
									<div id="Composers" class="filterSelect" >
										<div class="selectedField" style="margin-right: -1px;"><a class="selectedText">Wszystkie</a><img align="right" src="/image/Selectpart2.png" width="11" style="padding-top: 5px; padding-right: 1px;" /></div>
										<div class="separ" style="background-color: black; height: 1px; display: none;"></div>
										<ul style="height: 190px; width: 150 !important;" class="optionsHide">
											<li><div id="selectedComposer" class="composer0">Wszystkie</div></li>
											<?php echo $toComposers ?>
										</ul>
									</div>
							</div>
							
							<div style="height: 48px; margin-bottom: 15px; display: none;" class="Filter" onmousedown="return false" onselectstart="return false">
								<div class="filterName">Cześci Mszy</div>
									<div id="massPart" class="filterSelect">
										<div class="selectedField"><a title="Wszystkie" class="selectedText">Wszystkie</a><img align="right" src="/image/Selectpart2.png" width="11" style="padding-top: 5px; padding-right: 1px;" /></div>
										<div class="separ" style="background-color: black; height: 1px; display: none;"></div>
										<ul class="optionsHide">
											<li><div title="Wszystkie" id="selectedMassPart" class="massPart0">Wszystkie</div></li>
											<?php echo $toMassParts ?>
										</ul>
									</div>
							</div>
							
							<div style="height: 48px; margin-bottom: 15px; display: none;" class="Filter" onmousedown="return false" onselectstart="return false">
								<div class="filterName">Kategoria</div>
									<div id="category" class="filterSelect">
										<div class="selectedField"><a title="Wszystkie" class="selectedText">Wszystkie</a><img align="right" src="/image/Selectpart2.png" width="11" style="padding-top: 5px; padding-right: 1px;" /></div>
										<div class="separ" style="background-color: black; height: 1px; display: none;"></div>
										<ul class="optionsHide">
											<li><div title="Wszystkie" id="selectedCategory" class="category0">Wszystkie</div></li>
											<?php echo $toCategory ?>
										</ul>
									</div>
							</div>				
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
     </table>
	 <div id="footer"> 
		copyright &copy; since 2013 D.A. "Redemptor" <br>
		Muzyczna &amp; Chóralna
	 </div>
    </body>
    </html>
