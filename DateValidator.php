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
            $dateValid->setMessage("The entered date is not long enough. Please enter date as DD/MM/YYYY.");
            return $dateValid;
        }
        else if(strlen($dateString) > 10){
            $dateValid->setValid(false);
            $dateValid->setMessage("The entered date is too long. Please enter date as DD/MM/YYYY.");
            return $dateValid;
        }

        //Check regex - see if slashes are in right place
        if(!preg_match("/(\d{2})\/(\d{2})\/(\d{4})$/", $dateString, $matches)){
            $dateValid->setValid(false);
            $dateValid->setMessage("The date entered does not match the required format. Please enter date as DD/MM/YYYY.");
            return $dateValid;
        }

        //Check if month is between 1 and 12, and that day matches maximum of month
        if(!checkdate((int)$matches[2], (int)$matches[1], (int)$matches[3])){
            $dateValid->setValid(false);
            $dateValid->setMessage("The date is not correct. Please check that the inputted numbers are correct.");
            return $dateValid;
        }

        //Check if date is in the past
        $historicDate = new DateTime((int)$matches[3] . '-' . (int)$matches[2] . '-' . (int)$matches[1]);
        if($historicDate > new DateTime()){
            $dateValid->setValid(false);
            $dateValid->setMessage("The date is in the future. Please enter a date in the past.");
            return $dateValid;
        }

        $dateValid->setValid(true);
        $dateValid->setMessage("This date is valid.");

        return $dateValid;
    }
}
