<?php
$to = "aayushvyas06@gmail.com";
$sub = "Regards from Prem";
$msg = " I Love You Too Aayush Baby";
$from = "premarch567@gmail.com";
$header = "From : $from";
if(mail($to,$sub,$msg,$header))
{
    echo "Mail Sent";

}
else{
    echo "Not Sent";
}
?>
