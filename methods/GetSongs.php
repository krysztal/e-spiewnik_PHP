<?php
    include_once 'connection.php';
    $folder = $_GET['songname'];
    $option = $_GET['option'];
    $MassPartOptions = $_GET['MassPartOptions'];
    $composerOption = $_GET['ComposerOption'];
    $CategoryOptions = $_GET['CategoryOptions'];
    
    if($option == 'manyVoice')
    {
        if($MassPartOptions == 0)
        {
            if($composerOption == 0)
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 1 ORDER BY Name ASC;";
                else 
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToCategory ON SongToCategory.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and SongToCategory.ManyVoice = 1 and SongToCategory.Category_Id = ".$CategoryOptions." ORDER BY Name ASC;";
            }
            else
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 1 and SongToComposer.Composers_Id = ".$composerOption." ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToCategory ON SongToCategory.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 1 and SongToComposer.Composers_Id = ".$composerOption." and SongToCategory.Category_Id = ".$CategoryOptions." ORDER BY Name ASC;";
            }
        }
        else
        {
            if($composerOption == 0)
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM  JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToMassPart ON SongToMassPart.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 1 and SongToMassPart.MassPart_Id = ".$MassPartOptions." ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToMassPart ON SongToMassPart.Songs_Id = Songs.Id JOIN SongToCategory ON SongToCategory.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 1 and SongToMassPart.MassPart_Id = ".$MassPartOptions." and SongToCategory.Category_Id = ".$CategoryOptions." ORDER BY Name ASC;";                    
            }
            else
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToMassPart ON SongToMassPart.Songs_Id = Songs.Id JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 1 and SongToMassPart.MassPart_Id = ".$MassPartOptions." and SongToComposer.Composers_Id = ".$composerOption." ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToMassPart ON SongToMassPart.Songs_Id = Songs.Id JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToCategory ON SongToCategory.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 1 and SongToMassPart.MassPart_Id = ".$MassPartOptions." and SongToComposer.Composers_Id = ".$composerOption." and SongToCategory.Category_Id = ".$CategoryOptions." ORDER BY Name ASC;";
            }
        }
    }
    else if($option == 'oneVoice')
    {
        if($MassPartOptions == 0)
        {
            if($composerOption == 0)
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 0 ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToCategory ON SongToCategory.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 0 ORDER BY Name ASC;";
            }
            else
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 0 and SongToComposer.Composers_Id = ".$composerOption." ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToCategory ON SongToCategory.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 0 and SongToComposer.Composers_Id = ".$composerOption." and SongToCategory.Category_Id = ".$CategoryOptions." ORDER BY Name ASC;";
            }
        }
        else
        {
            if($composerOption == 0)
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Song JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Ids JOIN SongToMassPart on SongToMassPart.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 0 and SongToMassPart.MassPart_Id = ".$MassPartOptions." ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToMassPart on SongToMassPart.Songs_Id = Songs.Id JOIN SongToCategory ON SongToCategory.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 0 and SongToMassPart.MassPart_Id = ".$MassPartOptions." and SongToCategory.Category_Id = ".$CategoryOptions." ORDER BY Name ASC;";
            }
            else
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToMassPart on SongToMassPart.Songs_Id = Songs.Id JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 0 and SongToMassPart.MassPart_Id = ".$MassPartOptions." and SongToComposer.Composers_Id = ".$composerOption." ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToMassPart on SongToMassPart.Songs_Id = Songs.Id JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToCategory ON SongToCategory.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and ManyVoice = 0 and SongToMassPart.MassPart_Id = ".$MassPartOptions." and SongToComposer.Composers_Id = ".$composerOption." and SongToCategory.Category_Id = ".$CategoryOptions." ORDER BY Name ASC;";
                    
            }
        }
    }
    else if($option == 'allVoiceOptions')
    {
        if($MassPartOptions == 0)
        {
            if($composerOption == 0)
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToCategory ON SongToCategory.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' ORDER BY Name ASC;";
            }
            else
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and SongToComposer.Composers_Id = ".$composerOption." ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToCategory ON SongToCategory.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and SongToComposer.Composers_Id = ".$composerOption." and SongToCategory.Category_Id = ".$CategoryOptions." ORDER BY Name ASC;";    
            }
                
        }
        else
        {
            if($composerOption == 0)
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToMassPart on SongToMassPart.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and SongToMassPart.MassPart_Id = ".$MassPartOptions." ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id JOIN SongToMassPart on SongToMassPart.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and SongToMassPart.MassPart_Id = ".$MassPartOptions." and SongToCategory.Category_Id = ".$CategoryOptions." ORDER BY Name ASC;";
                   
            }
            else
            {
                if($CategoryOptions == 0)
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToMassPart on SongToMassPart.Songs_Id = Songs.Id JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and SongToMassPart.MassPart_Id = ".$MassPartOptions." and SongToComposer.Composers_Id = ".$composerOption." ORDER BY Name ASC;";
                else
                    $sql = "SELECT DISTINCT Name FROM Songs JOIN SongToMassPart on SongToMassPart.Songs_Id = Songs.Id JOIN SongToComposer ON SongToComposer.Songs_Id = Songs.Id where Name LIKE '%".$folder."%' and SongToMassPart.MassPart_Id = ".$MassPartOptions." and SongToComposer.Composers_Id = ".$composerOption." and SongToCategory.Category_Id = ".$CategoryOptions." ORDER BY Name ASC;";
            }
        }
    }
    $result = mysql_query($sql, $db_server)
        or die("Invalid query: " . mysql_error());
    $names = array();
    while ($row = mysql_fetch_row($result))
    {
        array_push ($names,$row[0]);
        echo $row[0].';';
    }    
?>
