<?php
    require_once './app/vistas/marca.vista.php';
    require_once './app/vistas/alerta.vista.php';
    require_once './app/modelos/juguete.modelo.php';
    require_once './app/modelos/marca.modelo.php';
    require_once './ayudas/validacion.ayuda.php';

    class jugueteControlador {
        private $modelo;
        private $vista;
        private $alertaVista;
        private $modeloMarca;

        public function __construct() {
        $this->modelo = new JugueteModelo();
        $this->vista = new JugueteVista();
        $this->modeloMarca = new MarcaModelo();
        $this->alertaVista = new AlertaVista();   
        }

        public function mostrarJuguetes(){
            $lista = $this->modelo->mostrarJuguete();
            if ($lista != null) {
                $this->vista->mostrarJuguetes($lista, AutorizacionAyuda::esAdministrador());
            } else {
                $this->alertaVista->mostrarVacio("la lista se encuetra vacia");
            }
        }
        public function mostrarJuguetePorId($id){
            if (ValidacionAyuda::verificacionIdRouter($id)){//validacion datos recibidos del router
                $item = $this->modelo->obtenerJuguetePorId($id);
                if ($item != null) {
                    $this->vista->mostrarJugeteJuguetePorId($item);
                } else {
                    $this->alertaVista->mostrarVacio("no hay elementos para mostrar");
                }
            } else {
                $this->alertaVista->mostrarError("404-Not-Found");
            }
        }
        public function agregarJuguetes() {
            
            $id_juguete = $_POST['id_juguete'];
            $nombreProducto = $_POST['nombreProducto'];
            $precio = $_POST['precio'];
            $material = $_POST['material'];
            $codigo = $_POST['codigo'];
            $img = $_POST['img'];


            $id = $this->modelo->insertarJuguete($id_juguete, $nombreProducto, $precio, $material, $codigo, $img);

            header('Location: ' . BASE_URL);
        }

        public function eliminarJuguete($id){
            AuthHelper::verificacion(); //verifico permisos y parametros validos
            if (verificacionAyuda::verificacionAyudaIdRouter($id)) {
                try {
                    $registroEliminado = $this->modelo->eliminarJuguete($id);
                    if ($registroEliminado > 0) {
                        header('Location: ' . BASE_URL . "lista");
                    } else {
                        $this->alertaVista->mostrarError("error al intentar eliminar");
                    }
                } catch (PDOException $error) {
                    $this->alertaVista->mostrarError("Error en la consulta a la base de datos/$error");
                }
            } else {
                $this->alertaVista->mostrarError("404-Not-Found");
            }
        } 

        public function mostrarFormularioModificacion($id){
            AutorizacionAyuda::verificacion();//verifico permisos y parametros validos
            if (ValidacionAyuda::verificacionIdRouter($id)) {
                $item = $this->modelo->obtenerJuguetePorId($id);//consulto los tados actuales
                if ($item != null) {
                    $marca = $this->modeloMarca->obtenerIdMarca();//consulto las marcas disponibles para modificar
                    $this->vista->mostrarModificacionFormulario($marca, $item);
                } else {
                    $this->alertaVista->mostrarError("error al intentar mostrar formulario");
                }
            } else {
                $this->alertaVista->mostrarError("404-Not-Found");
            }
        }

 //enviar datos de modificacion
 public function mostrarModificacion(){
    autorizacionAyuda::verificacion();
    try {//verifico permisos, parametros validos y posible acceso sin previo acceso al form modificacion.
        if ($_POST && ValidacionAyuda::verificarFormulario($_POST)) {

            $id_marca = htmlspecialchars($_POST['id_juguete']);
            $nombreProducto = htmlspecialchars($_POST['nombreProducto']);
            $precio = htmlspecialchars($_POST['precio']);
            $material = htmlspecialchars($_POST['material']);
            $codigo = htmlspecialchars($_POST['codigo']);
            $img = htmlspecialchars($_POST['img']);
            
            $registroModificado = $this->modelo->modificarJuguete($id_juguete, $nombreProducto, $precio, $material, $codigo, $img);

            if ($registroModificado > 0) {
                header('Location: ' . BASE_URL . "lista");
            } else {
                $this->alertaVista->mostrarError("No se pudo actualizar registro");
            }
        } else {
            $this->aleratVista->mostrarError("error-el formulario no pudo ser procesado, asegurate de que hayas completado todos los campos");
        }
        } catch (PDOException $error) {
        $this->aleratVista->mostrarError("error en la consulta a la base de datos/$error");
    }
}

public function mostrarFormularioAlta(){
    autorizacionAyuda::verificacion();
    $marca = $this->modeloMarca->obtenerIdMarca(); //consulta las marcas disponibles
    $this->vista->mostrarFormulario($marca);
}

public function agregarJuguete(){
    AutorizacionAyuda::verificacion();
    try {//verifico permisos, parametros validos y posible acceso sin previo acceso al form alta.
        if ($_POST && ValidacionAyuda::verificacionFormulario($_POST)) {
            $id_marca = htmlspecialchars($_POST['id_juguete']);
            $nombreProducto = htmlspecialchars($_POST['nombreProducto']);
            $precio = htmlspecialchars($_POST['precio']);
            $material = htmlspecialchars($_POST['material']);
            $codigo = htmlspecialchars($_POST['codigo']);
            $img = htmlspecialchars($_POST['img']);

            $id = $this->modelo->insertarJuguete($id_juguete, $nombreProducto, $precio, $material, $codigo, $img);

            if ($id) {
                header('Location: ' . BASE_URL . "list");
            } else {
                $this->alertaVista->mostrarError("Error al insertar la tarea");
            }
        } else {
            $this->alertaVista->mostrarError("Error-El formulario no pudo ser procesado, asegurate de que hayas completado todos los campos");
        }
        
    } catch (PDOException $error) {
        $this->alertaVista->mostrarError("Error en la consulta a la base de datos/$error");
    }
    }

        public function guardarJuguete($id) { 
            $juguete = $this->modelo->seleccionarJuguete($id);

            if (!$juguete){
                return $this->vista->mostrarError('no se puede guardar el juguete');
                
            }
            $this->modelo->actualizarJuguete($id);
            header('Location: ' . BASE_URL);
        }    
    }
