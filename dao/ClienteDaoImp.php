<?php

class ClienteDaoImp implements BaseDao {

    //put your code here
    public static function LeerObjeto($dto) {
        
    }

    public static function actualizarObjeto($dto) {
        
    }

    public static function agregarObjeto($dto) {
        try {
            $pdo = new clasePDO();

            if ($dto instanceof EmpresaDto) {
                $stmt = $pdo->prepare("");

                $temperatura = $dto->getTemperaturaMuestra();
                $cantidad = $dto->getCantidadMuestra();
                $codigoCliente = $dto->getCodigoCliente();



                $stmt->bindParam(1, $temperatura);
                $stmt->bindParam(2, $cantidad);
                $stmt->bindParam(3, $codigoCliente);


                $stmt->execute();
                $pdo = null;
            }
            if ($dto instanceof ParticularDto) {
                $stmt = $pdo->prepare("INSERT INTO MUESTRA (fechaRecepcion, temperaturaMuestra, cantidadMuestra, codigo_cliente) VALUES(now(),?,?,?);");

                $temperatura = $dto->getTemperaturaMuestra();
                $cantidad = $dto->getCantidadMuestra();
                $codigoCliente = $dto->getCodigoCliente();



                $stmt->bindParam(1, $temperatura);
                $stmt->bindParam(2, $cantidad);
                $stmt->bindParam(3, $codigoCliente);


                $stmt->execute();
                $pdo = null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $pdo = null;
        }
    }

    public static function eliminarrObjeto($dto) {
        
    }

}
