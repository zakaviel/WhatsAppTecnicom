<!doctype>
<html>
<head>
</head>
<body>
<?php
require_once "PHPExcel-1.8/Classes/PHPExcel.php";
		$tmpfname = "FilesUploaded/PersonasMensajes_Formato.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		
		echo "<table>";
		for ($row = 1; $row <= $lastRow; $row++) {
			 echo "<tr> <td>";
			 echo $worksheet->getCell('A'.$row)->getValue();
			 echo "</td> <td>";
			 echo $worksheet->getCell('B'.$row)->getValue();
			 echo "</td> <td>";
			 echo $worksheet->getCell('C'.$row)->getValue();
			 echo "</td> <tr>";

		}
		echo "</table>";	
?>

</body>
</html>