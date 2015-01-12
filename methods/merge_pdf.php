<?php
require_once('fpdf.php');
require_once('fpdi.php');
include_once 'connection.php';

class ConcatPdf extends FPDI
{
    public $files = array();

    public function setFiles($files)
    {
        $this->files = $files;
    }

    public function concat()
    {
        foreach($this->files AS $file) {
            $pageCount = $this->setSourceFile($file);
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                 $tplIdx = $this->ImportPage($pageNo);
                 $s = $this->getTemplatesize($tplIdx);
                 $this->AddPage($s['w'] > $s['h'] ? 'L' : 'P', array($s['w'], $s['h']));
                 $this->useTemplate($tplIdx);
            }
        }
    }
}

$fileList = array();

for($i =0; $i<count($_GET); $i++)
{
	$iter = 'song'.$i;
	$sql = "SELECT FileName FROM Songs where Name ='".$_GET[$iter]."';";
	$result = mysql_query($sql, $db_server)
        or die("Invalid query: " . mysql_error());
    $foldername = mysql_fetch_row($result);
	array_push($fileList, "../music/".$foldername[0]."/".$foldername[0]." - SLIDES.pdf");
}

$pdf = new ConcatPdf();


$pdf->setFiles($fileList);
$pdf->concat();
$pdf->Output('slajdy.pdf', 'I');
?>