<?php
	namespace app\validation;

	#[\Attribute]
	class Name{
		function isValid($data){//return boolean
			//starts with a capital followed by any number of letters
			return preg_match("/[A-Z]\w+/u",$data);
		}
	}

