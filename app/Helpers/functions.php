<?php

use App\Modules\Locations\Models\City;
use App\Modules\Locations\Models\District;
use App\Modules\Locations\Models\State;
use Illuminate\Support\Str;

if (!function_exists('numberOnly')) {
    /**
     * função para retornar apenas numeros de uma string
     * @param $value string
     * @return string apenas numeros
     */
    function numberOnly($value)
    {
        return preg_replace("/[^0-9]/", "", $value);
    }
}

if (!function_exists('formatPhone')) {
    /**
     * função para colocar máscara no telefone
     * @param $value integer numero do telefone
     * @return string telefone formatado
     */
    function formatPhone($value)
    {
        if (strlen($value) === 11) {
            return '(' . substr($value, 0, 2) . ') ' . substr($value, 3, 5) . '-' . substr($value, -4);
        } else {
            return '(' . substr($value, 0, 2) . ') ' . substr($value, 3, 4) . '-' . substr($value, -4);
        }
    }
}



if (!function_exists('formatDocument')) {
    /**
     * função para colocar máscara no cpf/cnpj
     * @param $value integer numero do documento
     * @return string documento formatado
     */
    function formatDocument($value)
    {
        ## Retirando tudo que não for número.
        $cpf_cnpj = preg_replace("/[^0-9]/", "", $value);
        $tipo_dado = NULL;
        if (strlen($cpf_cnpj) == 11) {
            $tipo_dado = "cpf";
        }
        if (strlen($cpf_cnpj) == 14) {
            $tipo_dado = "cnpj";
        }
        switch ($tipo_dado) {
            default:
                $cpf_cnpj_formatado = "Não foi possível definir tipo de dado";
                break;

            case "cpf":
                $bloco_1 = substr($cpf_cnpj, 0, 3);
                $bloco_2 = substr($cpf_cnpj, 3, 3);
                $bloco_3 = substr($cpf_cnpj, 6, 3);
                $dig_verificador = substr($cpf_cnpj, -2);
                $cpf_cnpj_formatado = $bloco_1 . "." . $bloco_2 . "." . $bloco_3 . "-" . $dig_verificador;
                break;

            case "cnpj":
                $bloco_1 = substr($cpf_cnpj, 0, 2);
                $bloco_2 = substr($cpf_cnpj, 2, 3);
                $bloco_3 = substr($cpf_cnpj, 5, 3);
                $bloco_4 = substr($cpf_cnpj, 8, 4);
                $digito_verificador = substr($cpf_cnpj, -2);
                $cpf_cnpj_formatado = $bloco_1 . "." . $bloco_2 . "." . $bloco_3 . "/" . $bloco_4 . "-" . $digito_verificador;
                break;
        }
        return $cpf_cnpj_formatado;
    }
}

if (!function_exists('getCityId')) {
    /**
     * Busca ID da cidade
     *
     * @param string $state
     * @param string $city
     * @return int ID city
     */
    function getCityId($state, $city)
    {
        $slug = Str::slug($state . ' ' . $city);
        $city_id = City::where('slug', $slug)->pluck('id')->first();

        return $city_id;
    }
}

if (!function_exists('getDistrictId')) {
    /**
     * Busca o ID do District
     *
     * @param string $state
     * @param string $city
     * @param integer $postal_code
     * @param string $district
     * @return integer|void
     */
    function getDistrictId($state, $city, $district, $postal_code = null)
    {
        if ($state && $city && $district) {
            $city_id = getCityId($state, $city);

            if ($postal_code) {
                $postal_code = numberOnly($postal_code);
            }

            $slug = Str::slug($city_id . ' ' . $district);

            $district_id = District::where('slug', $slug)->pluck('id')->first();

            if (!$district_id) {
                $district = District::create([
                    'city_id' => $city_id,
                    'postal_code' => $postal_code,
                    'name' => $district,
                    'slug' => $slug,
                ]);

                return $district->id;
            }

            return $district_id;
        }
        return null;
    }
}
