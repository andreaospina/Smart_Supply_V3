<?php 

namespace Mini\Controller;

use Mini\Model\Cartera;
use Mini\Model\Clientes;

class CarteraController {
    
    public function index(){
        $clientes = new Clientes();
        
        $resultado= $clientes->listar();
        
        require APP.'view/Cartera.php';
    }
    
    public function buscar(){
        $cartera = new Cartera();        
        if(isset($_POST['cedula'])){
        
        $cartera->__SET("cedula", $_POST['cedula']);
        $p = $cartera->consulta_pedido();
            
        if(empty($p)){
            $p = $cartera->consulta_cliente();
        }else {
        }
            
        echo json_encode($p,JSON_FORCE_OBJECT);
        }
    }
    
}