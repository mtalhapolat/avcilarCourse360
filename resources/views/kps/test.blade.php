@include('kps.KPSSoapClient')

<?php

header("Content-Type: text/plain");

$username = "KRM-7012719";
$password = "1991196585";
$wsdl = "https://kpsbasvuru.nvi.gov.tr/Services/Wsdl.ashx?Service=BilesikKutukSorgulaKimlikNoServis&Version=2024/04/01";

$kpsClient = new KPSSoapClient($username, $password, $wsdl);

try {
    $result = $kpsClient->Sorgula(
        array(
            'kriterListesi' => array(
                'BilesikKutukSorgulaKimlikNoSorguKriteri' => array(
                    'DogumAy'  => "01",
                    'DogumGun'  => "04",
                    'DogumYil'  => "1997",
                    'KimlikNo'  => "26371120406"
                )
            )
        )
    );

    echo json_encode($result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->TCKKBilgisi);

} catch (Exception $e)
{
    print_r($e);
}
