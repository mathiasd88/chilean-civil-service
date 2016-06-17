<?php namespace Mathiasd88\ChileanCivilService;

use SoapClient;
use SoapFault;

class CivilService
{
    /**
     * Encuentra una persona por su rut
     *
     * @param  string $rut
     *
     * @return mixed
     */
    public function find($rut)
    {
        $formatedRut = $this->format($rut);

        $options = [
            'trace' => 1,
            'location' => config('civilservice.ws')
        ];

        try {
            $soap = new SoapClient(config('civilservice.ws'), $options);
        } catch(SoapFault $e) {
            throw new Exception("Error Processing Request: $e", 1);
        }

        $persona = $soap->__soapCall('obtenerPersona', [$formatedRut]);

        foreach ($persona as $value) {
            return [
                "run" => $value->RUN,
                "dv" => $value->DV,
                "nombres" => $value->Nombres,
                "apellido_paterno" => $value->ApellidoPaterno,
                "apellido_materno" => $value->ApellidoMaterno,
                "fecha_nacimiento" => $value->FechaNacimiento,
                "fecha_defuncion" => $value->FechaDefuncion,
                "sexo" => $value->Sexo,
                "estado_civil" => $value->EstadoCivil,
                "estado" => $value->Estado,
                "glosa" => $value->Glosa,
                "dias_en_cache" => $value->DiasEnCache,
            ];
        }
    }

    /**
     * Da el formato correcto para el uso del Web Service del Registro Civil
     *
     * @param  string $rut
     *
     * @return array
     */
    private function format($rut)
    {
        $rut = str_replace(".", "", $rut);

        $rutCompleto = explode("-", $rut);

        return [
            'rut' => $rutCompleto[0],
            'dv' => $rutCompleto[1]
        ];
    }



}
