<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
function returnstrength($pwd){
		$strength = array(
							"Blank",
							"Very Weak",
							"Weak",
							"Medium",
							"Strong",
							"Very Strong"
						);

    $score = 1;
    if (strlen($pwd) < 1){
        return $strength[0];
    }

    if (strlen($pwd) < 4){
        return $strength[1];
    }
    if (strlen($pwd) >= 8){
		$score++;
    }

    if (strlen($pwd) >= 10)
    {
        $score++;
    }
    if (preg_match("/[a-z]/", $pwd) && preg_match("/[A-Z]/", $pwd)){
        $score++;
    }

    if (preg_match("/[0-9]/", $pwd)){
        $score++;
    }

    if (preg_match("/.[!,@,#,$,%,^,&,*,?,_,~,-,£,(,)]/", $pwd)){
        $score++;
    }

    return($strength[$score]);
}