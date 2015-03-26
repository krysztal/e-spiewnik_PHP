<?php
    include_once 'connection.php';

    $folder = $_GET['folder'];
	$sql = "SELECT Songs.FileName, SongToComposer.Composers_Id, Composers.Name, Composers.Surname, Songs.Name FROM Songs JOIN SongToComposer ON Songs.Id = SongToComposer.Songs_Id JOIN Composers ON Composers.Id = SongToComposer.Composers_Id WHERE Songs.Name = '".$folder."';";
    $result = mysql_query($sql, $db_server)
        or die("Invalid query: " . mysql_error());
   
    $foldername = mysql_fetch_row($result);
	$handler = opendir("../music/".$foldername[0]);
	
    $filesarray = array();
    while ($filename = readdir($handler)){
        array_push ($filesarray,$filename);
    }
	$composerId = $foldername[1];
    $s1 = "";
    $s2 = "";
    $s3 = "";
    $s4= "";
    $s5 = "";
    $s6 = "";
    $s7 = "";
    $s8 = "";
    $s9 = "";
    $s10 = "";
    $s11 = "";
    $s11 = "";
    $s12 = "";
    $s13 = "";
    $s14 = "";
    $s15 = "";
    
    $text = "";
    $pdf = "";
	$pdfViolin = "";
    $wz = "";
    $bz = "";
    $sz = "";
    $az = "";
    $tz = "";
    $ws = "";
    $bs = "";
    $ss = "";
    $as = "";
    $ts = "";
	$Zwz = "";
	$Znz = "";
    $img = "";
    for($i=0; $i<count($filesarray); $i++)
    {
        if($filesarray[$i] == $foldername[0].".txt")
        {
            $file_handle = fopen("../music/".$foldername[0].'/'.$filesarray[$i], "r");
            while (!feof($file_handle)) 
            {
                $text = $text.fgets($file_handle).'<br/>';
 
            }
        fclose($file_handle);
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId.".pdf" || $filesarray[$i] == $foldername[0]." - ".$composerId." - nuty.zip")
        {
            $pdf = '<a title="nuty" target="_blank" href="'."../music/".$foldername[0].'/'.$filesarray[$i].'"><img src="../image/white_500.png" width="32" /></a>';
        }
		
		if($filesarray[$i] == $foldername[0]." - ".$composerId." - Violin.pdf")
        {
            $pdfViolin = '<a title="Nuty dla skrzypc" target="_blank" href="'."../music/".$foldername[0].'/'.$filesarray[$i].'"><img src="../image/Violin.png" width="32" /></a>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - RAZEM.mp3")
        {
            $wz = '<img id="ALL_Voice" title="wszystkie głosy" width="32" src="../image/Wz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - BAS.mp3")
        {
            $bz = '<img id="ALL_Voice" title="bas" width="32" src="../image/Bz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - SOPRAN.mp3")
        {
            $sz = '<img id="ALL_Voice" title="sopran" width="32" src="../image/Sz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - ALT.mp3")
        {
            $az = '<img id="ALL_Voice" title="alt" width="32" src="../image/Az.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - TENOR.mp3")
        {
            $tz = '<img id="ALL_Voice" title="tenor" width="32" src="../image/Tz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
		
		if($filesarray[$i] == $foldername[0]." - ".$composerId." - ZWROTKA(up).mp3")
        {
            $Zwz = '<img id="ALL_Voice" title="Zwrotka wyższy" width="32" src="../image/Zz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
		
		if($filesarray[$i] == $foldername[0]." - ".$composerId." - ZWROTKA(down).mp3")
        {
            $Znz = '<img id="ALL_Voice" title="Zwrotka niższy" width="32" src="../image/Zz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $foldername[0].".png")
        {
            $img = '<img style="margin-left: 20px; margin-top: 20px; margin-bottom: 25px;" width="480" src="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        #--
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - RAZEM(minus).mp3")
        {
            $ws = '<img id="ALL_Voice" title="wszystkie głosy" width="32" src="../image/Ws.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - BAS(minus).mp3")
        {
            $bs = '<img id="ALL_Voice" title="bas" width="32" src="../image/Bs.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - SOPRAN(minus).mp3")
        {
            $ss = '<img id="ALL_Voice" title="sopran" width="32" src="../image/Ss.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - ALT(minus).mp3")
        {
            $as = '<img id="ALL_Voice" title="alt" width="32" src="../image/As.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - TENOR(minus).mp3")
        {
            $ts = '<img id="ALL_Voice" title="tenor" width="32" src="../image/Ts.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        #--------------------slad---losu--------------
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 1 - Skazany.mp3")
        {
            $s1 = '<img id="ALL_Voice" title="Skazany" width="28" src="../image/1.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 2 - Dlon Boga.mp3")
        {
            $s2 = '<img id="ALL_Voice" title="Dlon Boga" width="28" src="../image/2.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 3 - Slad losu .mp3")
        {
            $s3 = '<img id="ALL_Voice" title="Slad losu" width="28" src="../image/3.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 4 - Gdzie jestes.mp3")
        {
            $s4 = '<img id="ALL_Voice" title="Gdzie jesteś" width="28" src="../image/4.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 5 - Przymuszony.mp3")
        {
            $s5 = '<img id="ALL_Voice" title="Przymuszony" width="28" src="../image/5.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 6 - Weronika.mp3")
        {
            $s6 = '<img id="ALL_Voice" title="Weronika" width="28" src="../image/6.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 7 - Ziarno w ziemi.mp3")
        {
            $s7 = '<img id="ALL_Voice" title="Ziarno w ziemi" width="28" src="../image/7.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 8 - Ciezkie lzy.mp3")
        {
            $s8 = '<img id="ALL_Voice" title="Ciężkie łzy" width="28" src="../image/8.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 9 - Do konca.mp3")
        {
            $s9 = '<img id="ALL_Voice" title="Do końca" width="28" src="../image/9.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 10 - Tunika.mp3")
        {
            $s10 = '<img id="ALL_Voice" title="Tunika" width="28" src="../image/10.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 11 - Otwarte rany.mp3")
        {
            $s11 = '<img id="ALL_Voice" title="Otwarte rany" width="28" src="../image/11.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 12 - Ojcze.mp3")
        {
            $s12 = '<img id="ALL_Voice" title="Ojcze" width="28" src="../image/12.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 13 - Magnificat.mp3")
        {
            $s13 = '<img id="ALL_Voice" title="Magnificat" width="28" src="../image/13.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 14 - Kamien.mp3")
        {
            $s14 = '<img id="ALL_Voice" title="Kamień" width="28" src="../image/14.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        if($filesarray[$i] == $foldername[0]." - ".$composerId." - Stacja 15 - Niedaleko.mp3")
        {
            $s15 = '<img id="ALL_Voice" title="Niedaleko" width="28" src="../image/15.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $foldername[0]).'/'.str_replace(" ", "%20", $filesarray[$i]).'" style="padding-right: 2px; padding-top: 2px;"/>';
        }
        
        
        
        
        
        

    }
    if($text == "") $text = $img;
	$musicVersionsItems = "<div id=\"MusicVersions\"><table style=\"width:100%;\"><tr><td><span folderName=\"".$foldername[0]."\" id=\"NameOfSongV\">".$foldername[4]."</span></td><td style=\"text-align: right;\">";
	$musicVersionsItems .= "<span composerId=\"".$foldername[1]."\" class=\"musicVersionsItem selectedMVI\">".$foldername[2]." ".$foldername[3]."</span>";
	while ($row = mysql_fetch_row($result))
    {
		$musicVersionsItems .= "<span composerId=\"".$row[1]."\" class=\"musicVersionsItem\">".$row[2]." ".$row[3]."</span>";
    }   
    echo $musicVersionsItems." 
		</td></tr></table>
	</div>
	<div id=\"MusicMaterials\">
		<table style=\"color: white; font: 16px Verdana; height: 110px\">
			<tr class=\"MaterialsItem\">
				<td>
					<div>śpiew: </div>
				</td>
				<td>
					<div>".$s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.$s9.$s10.$s11.$s12.$s13.$s14.$s15.$wz.$sz.$az.$tz.$bz.$Zwz.$Znz."</div>
				</td>
			</tr>
			<tr class=\"MaterialsItem\">
				<td>
					<div>midi: </div>
				</td>
				<td>
					<div>".$ws.$ss.$as.$ts.$bs."</div>
				</td>
			</tr>
			<tr class=\"MaterialsItem\">
				<td>
					<div>nuty:</div>
				</td>
				<td>
					<div>".$pdf.$pdfViolin."</div>
				</td>
			</tr>
		</table>
	</div>
	<div id=\"MusicText\">
		<div style=\"margin-left: 15px; margin-top: 7px;\">".$text."</div>
	</div>
		";
    
    closedir($handler);
?>