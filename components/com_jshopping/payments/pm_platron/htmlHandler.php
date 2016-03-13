<?php

class htmlHandler{
	public function replaceTags($arrayPs,$strHtml,$strTrToBuildRows){
		$strRows = "";	
		foreach($arrayPs as $arrPsValues){
			$strTrToBuildRowsCopy = $strTrToBuildRows;
			foreach($arrPsValues as $strNameParam => $strValue){
				$strTrToBuildRowsCopy = str_replace("{{{$strNameParam}}}",$strValue,$strTrToBuildRowsCopy);
			}
			$strRows .= $strTrToBuildRowsCopy;
		}
		return self::replaceHtml("ROW",$strHtml,$strRows);
	}

	public function getTrToReplace($strTag,$strHtml){
		$arrForExplode = explode("<!--".$strTag."-->",$strHtml);
		$arrAfterExplode = explode("<!--/".$strTag."-->",$arrForExplode[1]);
		return $arrAfterExplode[0];
	}

	public function replaceHtml($strTag,$strHtml,$strRowReplace){
		$arrForExplode = explode("<!--".$strTag."-->",$strHtml);
		$arrAfterExplode = explode("<!--/".$strTag."-->",$arrForExplode[1]);
		return $arrForExplode[0].$strRowReplace.$arrAfterExplode[1];
	}
}
	

?>
