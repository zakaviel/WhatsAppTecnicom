

<?php
//-----------------------------
function getdateStringSimple($string)
{
$firstCut=explode('_' , $string);
$secondCut=explode('.' , $firstCut[count($firstCut)-1])[0];
return $secondCut; //getdate converted day
}

?> 