<!doctype>
<html>
<head>
</head>
<body>
<?php
require_once "PHPExcel-1.8/Classes/PHPExcel.php";
require_once "WhaboxAppSendFromFile.php";
//require_once "getDate.php";
require_once "getEmpresaName.php";
		$tmpfname = "FilesUploaded/Mensaje_Empresa_Test.xlsx";
		$empresaName=getdateStringSimple($tmpfname);
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		
		//echo "<table>";
		for ($row = 2; $row <= $lastRow; $row++) 
		{

			$number=(string)$worksheet->getCell('A'.$row)->getValue();
			$message=(string)$worksheet->getCell('C'.$row)->getValue();
			if($number!='')
			{
				$serviceResponse=sendUsingExcel($number,$message);	

				$json = json_decode($serviceResponse);	

				$codigo=$json->custom_uid;

				print("Codigo Generado: ".$codigo." Empresa: ".$empresaName." Numero: ".$number." Mensaje: ".$message);
				echo "<br/>";


				//$date=getdateStringSimple();

			}


		}
		//echo "</table>";	
?>

</body>
</html>