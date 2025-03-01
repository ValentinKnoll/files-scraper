<?php

class DirIterator{

	public static function GetTree($path = false, $depth_stop_symbol = false){
		if(!is_dir($path)) return [];
		$arr = [];
		$items = glob($path.'/*');

		foreach ($items as $key => $value) {
			if(is_dir($value) && false !== $depth_stop_symbol && false !== strpos($value, $depth_stop_symbol)) break;
			if(is_dir($value)){
		      $arr[$value] = self::GetTree($value, $depth_stop_symbol);
		    }else{
		      $arr[] = $value;
		    }
		}
		return $arr;
	}
}