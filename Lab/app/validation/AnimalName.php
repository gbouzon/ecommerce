<?php
	namespace app\validation;

	#[\Attribute]
	class AnimalName{
		function isValid($data){
			//return boolean
			//starts with a capital followed by any number of letters
			return preg_match("/^[A-Z][abcdfghjklmnpqrstvwxz0-9éèê].+$/",$data);
		}
	}

