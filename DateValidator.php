<?php

include 'Validation.php';

/**
 * Contains method for determining whether inputted historical dates meet
 * format expectations and whether dates are valid.
 */
class DateValidator {

    public function validateHistoricalDate(String $dateString)
    {
        $dateValid = new Validation();

        //Check length of string
        if(strlen($dateString) < 10){
            $dateValid->setValid(false);
            $dateValid->setMessage("The entered date is not long enough.");
            return $dateValid;
        }
        else if(strlen($dateString) > 10){
            $dateValid->setValid(false);
            $dateValid->setMessage("The entered date is too long.");
            return $dateValid;
        }

        //Check regex - see if slashes are in right place
        if(!preg_match("/(\d{2})\/(\d{2})\/(\d{4})$/", $dateString, $matches)){
            $dateValid->setValid(false);
            $dateValid->setMessage("The date entered does not match the required format.");
            return $dateValid;
        }

        //Check if month is between 1 and 12, and that day matches maximum of month
        if(!checkdate((int)$matches[2], (int)$matches[1], (int)$matches[3])){
            $dateValid->setValid(false);
            $dateValid->setMessage("The date is not correct.");
            return $dateValid;
        }

        $dateValid->setValid(true);
        $dateValid->setMessage("This date is valid.");

        return $dateValid;
    }
}
