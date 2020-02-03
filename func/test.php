<?php
try {
  $client = new SoapClient("http://192.168.0.142:8080/services/Logon?wsdl",array(
    'exceptions' => true,
  ));
}
catch ( SoapFault $e )
{
    echo 'sorry... our service is down';
}
?>