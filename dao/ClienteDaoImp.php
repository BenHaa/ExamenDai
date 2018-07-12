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
            $stmt = $pdo->prepare("INSERT INTO CLIENTE  (rut_contactoEmpresa, rut_particular) VALUES(?,?)");

            $empresa = $dto->getRutEmpresa();
            $particular = $dto->getRutParticular();


            $stmt->bindParam(1, $empresa);
            $stmt->bindParam(2, $particular);


            if ($stmt->execute()) {
                return true;
            }
            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public static function eliminarrObjeto($dto) {
        
    }

}
