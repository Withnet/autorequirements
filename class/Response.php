<?php
require_once('./vendor/autoload.php');

use Dadata\DadataClient;

class Response
{
    const TOKEN = '2fc3857798d21bf40ce0b91b45b44143af0ee0ac';
    const SECRET = "0906890005b829587102d765ba4aca15e1b7ad2d";

    private array $response;
    private string $company;
    private string $inn;
    private string $ogrn;
    private string $kpp;
    private string $oktmo;
    private string $okpo;
    private string $director;
    private string $regDate;
    private string $region;
    private string $city;
    private string $district;
    private string $address;
    private string $postal;
    private string $country;
    private $phones;
    private $emails;

    public function __construct($input)
    {
        $daData = new DadataClient(static::TOKEN, static::SECRET);
        $this->response = $daData->findById("party", $input);
        if($this->response) {
            $this->company = $this->response[0]['value'] ?? '';
            $this->inn = $this->response[0]['data']['inn'] ?? '';
            $this->ogrn = $this->response[0]['data']['ogrn'] ?? '';
            $this->kpp = $this->response[0]['data']['kpp'] ?? '';
            $this->oktmo = $this->response[0]['data']['oktmo'] ?? '';
            $this->okpo = $this->response[0]['data']['okpo'] ?? '';
            $this->director = $this->response[0]['data']['management']['name'] ?? '';
            $this->regDate = date("d.m.Y", $this->response[0]['data']['state']['registration_date'] / 1000) ?? '';
            $this->region = $this->response[0]['data']['address']['data']['region'] ?? '';
            $this->city = $this->response[0]['data']['address']['data']['city'] ?? '';
            $this->district = $this->response[0]['data']['address']['data']['city_district'] ?? '';
            $this->address = $this->response[0]['data']['address']['data']['street_type_full'] . " "
            . $this->response[0]['data']['address']['data']['street'] . ", "
            . $this->response[0]['data']['address']['data']['house_type_full'] . " "
            . $this->response[0]['data']['address']['data']['house'] ?? '';
            $this->postal = $this->response[0]['data']['address']['data']['postal_code'] ?? '';
            $this->country = $this->response[0]['data']['address']['data']['country'] ?? '';
            $this->phones = $this->response[0]['data']['phones'] ?? '';
            $this->emails = $this->response[0]['data']['emails'] ?? '';
        }
    }

    public function __get($name)
    {
        return match ($name) {
            'response' => $this->response,
            'company' => $this->company,
            'inn' => $this->inn,
            'ogrn' => $this->ogrn,
            'kpp' => $this->kpp,
            'oktmo' => $this->oktmo,
            'okpo' => $this->okpo,
            'director' => $this->director,
            'regDate' => $this->regDate,
            'region' => $this->region,
            'city' => $this->city,
            'district' => $this->district,
            'address' => $this->address,
            'postal' => $this->postal,
            'country' => $this->country,
            'phones' => $this->phones,
            'emails' => $this->emails,
            'default' => '',
        };
    }
}