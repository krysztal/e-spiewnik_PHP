<?php
	$folderName = $_GET['folderName'];
	$composerId = $_GET['composerId'];
	$handler = opendir("../music/".$folderName);
    $filesarray = array();
    while ($filename = readdir($handler)){
        array_push ($filesarray,$filename);
    }
    
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
    for($i=0; $i<count($filesarray); $i++)
    {
        if($filesarray[$i] == $folderName." - ".$composerId.".pdf" || $filesarray[$i] == $folderName." - ".$composerId." - nuty.zip")
        {
            $pdf = '<a title="nuty" target="_blank" href="'."../music/".$folderName.'/'.$filesarray[$i].'"><img src="../image/white_500.png" width="32" /></a>';
        }
		
		if($filesarray[$i] == $folderName." - ".$composerId." - Violin.pdf")
        {
            $pdfViolin = '<a title="Nuty dla skrzypc" target="_blank" href="'."../music/".$folderName.'/'.$filesarray[$i].'"><img src="../image/Violin.png" width="32" /></a>';
        }
        
        if($filesarray[$i] == $folderName." - ".$composerId." - RAZEM.mp3")
        {
            $wz = '<img id="ALL_Voice" title="wszystkie głosy" width="32" src="../image/Wz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $folderName." - ".$composerId." - BAS.mp3")
        {
            $bz = '<img id="ALL_Voice" title="bas" width="32" src="../image/Bz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $folderName." - ".$composerId." - SOPRAN.mp3")
        {
            $sz = '<img id="ALL_Voice" title="sopran" width="32" src="../image/Sz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $folderName." - ".$composerId." - ALT.mp3")
        {
            $az = '<img id="ALL_Voice" title="alt" width="32" src="../image/Az.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $folderName." - ".$composerId." - TENOR.mp3")
        {
            $tz = '<img id="ALL_Voice" title="tenor" width="32" src="../image/Tz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
		
		if($filesarray[$i] == $folderName." - ".$composerId." - ZWROTKA(up).mp3")
        {
            $Zwz = '<img id="ALL_Voice" title="Zwrotka wyższy" width="32" src="../image/Zz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
		
		if($filesarray[$i] == $folderName." - ".$composerId." - ZWROTKA(down).mp3")
        {
            $Znz = '<img id="ALL_Voice" title="Zwrotka niższy" width="32" src="../image/Zz.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }     
        #--
        
        if($filesarray[$i] == $folderName." - ".$composerId." - RAZEM(minus).mp3")
        {
            $ws = '<img id="ALL_Voice" title="wszystkie głosy" width="32" src="../image/Ws.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $folderName." - ".$composerId." - BAS(minus).mp3")
        {
            $bs = '<img id="ALL_Voice" title="bas" width="32" src="../image/Bs.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $folderName." - ".$composerId." - SOPRAN(minus).mp3")
        {
            $ss = '<img id="ALL_Voice" title="sopran" width="32" src="../image/Ss.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $folderName." - ".$composerId." - ALT(minus).mp3")
        {
            $as = '<img id="ALL_Voice" title="alt" width="32" src="../image/As.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
        if($filesarray[$i] == $folderName." - ".$composerId." - TENOR(minus).mp3")
        {
            $ts = '<img id="ALL_Voice" title="tenor" width="32" src="../image/Ts.png" link="'.'http://localhost/'.'music/'.str_replace(" ", "%20", $folderName).'/'.str_replace(" ", "%20", $filesarray[$i]).'" />';
        }
        
    }
	
    echo "
		<table style=\"color: white; font: 16px Verdana; height: 110px\">
			<tr class=\"MaterialsItem\">
				<td>
					<div>śpiew: </div>
				</td>
				<td>
					<div>".$wz.$sz.$az.$tz.$bz.$Zwz.$Znz."</div>
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
	";
    
    closedir($handler);
?>