<?php
	namespace app\validation;

	#[\Attribute]
	class Email{
		function isValid($data){
			//return boolean
			//starts with a capital followed by any number of letters
			return (filter_var($data, FILTER_VALIDATE_EMAIL) != false);
		}
	}

