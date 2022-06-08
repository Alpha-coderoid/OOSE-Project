<?php
interface Strategy {
    
    public function makepayment($useridd,$amount);
}


class paybyvisa implements Strategy {
    
    public function makepayment($useridd,$amount) {
       
        $myfile = fopen("donation_method".".txt", "w") or die("Unable to open file!");
    $txt = "User num ".$useridd." Made a ".$amount."$ Donation By Visa";
    fwrite($myfile, $txt);
    fclose($myfile);
    }
}
class paybycash implements Strategy {
    
    public function makepayment($useridd,$amount) {
        $myfile = fopen("donation_method".".txt", "w") or die("Unable to open file!");
    $txt = "User num ".$useridd." Made a ".$amount."$ Using Cash";
    fwrite($myfile, $txt);
    fclose($myfile);
    }
}