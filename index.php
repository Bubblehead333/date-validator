<?php

include 'DateValidator.php';

//This part is supplied
$dateString = "03/12/1999";
$result = DateValidator::validateHistoricalDate($dateString);
if (!$result->isValid()) {
    $message = $result->getMessage();
}
?>

<h2>Entered date was: <?= $dateString ?></h2>
<h2><?= $message ?></h2>
