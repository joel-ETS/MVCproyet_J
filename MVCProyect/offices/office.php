<?php declare(strict_types=1);

class Office {
    function __construct(public string $code,
     public string $city, 
     public string $phone, 
     public string $address1,
     public string $address2,
     public string $state, 
     public string $country, 
     public string $postalCode,
     public string $territory){  
    }

    function validate(): array {
        $errores = [];
        if (!isset($this->city) || strlen($this->city) < 1){
            $errores['city'] = "La oficina debe estar ubicada en una ciudad";
        } if (!isset($this->phone) || strlen($this->phone) < 1) {
            $errores['phone'] = "El teléfono de la oficina no es válido";
        }
          if (!isset($this->address1) || strlen($this->address1) < 1) {
            $errores['addressLine1'] = "La dirección 1 no es válida";
        }
          if (!isset($this->address2) || strlen($this->address2) < 1) {
            $errores['addressLine2'] = "La dirección 2 no es válida";
        }
          if (!isset($this->state) || strlen($this->state) < 1) {
            $errores['state'] = "El Estado no es válido";
        }
          if (!isset($this->country) || strlen($this->country) < 1) {
            $errores['country'] = "El país no es válido";
        }
          if (!isset($this->postalCode) || strlen($this->postalCode) < 1) {
            $errores['postalCode'] = "El código postal no es válido";
        }
          if (!isset($this->territory) || strlen($this->territory) < 1) {
            $errores['territory'] = "El territorio no es correcto";
        }
        return $errores;
    }
}

?>