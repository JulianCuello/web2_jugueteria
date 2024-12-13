<?php
    require_once './app/vistas/juguete.vista.php';
    require_once './app/vistas/alerta.vista.php';
    require_once './app/modelos/juguete.modelo.php';
    require_once './app/modelos/marca.modelo.php';
    require_once './ayudas/autorizacion.php';

    

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
            $lista = $this->modelo->mostrarJuguetes();
            if ($lista != null) {
                $this->vista->mostrarJuguetes($lista, Autorizacion::esAdministrador());
            } else {
                $this->alertaVista->mostrarVacio("la lista se encuetra vacia");
            }
        }
        public function mostrarJuguetePorId($id){
            if (Validacion::verificacionIdRouter($id)){//validacion datos recibidos del router
                $item = $this->modelo->obtenerJuguetePorId($id);
                if ($item != null) {
                    $this->vista->mostrarJuguetePorId($item);
                } else {
                    $this->alertaVista->mostrarVacio("no hay elementos para mostrar");
                }
            } else {
                $this->alertaVista->mostrarError("404-Not-Found");
            }
        }
        
        public function eliminarJuguete($id){
            Autorizacion::verificacion(); //verifico permisos y parametros validos
            if (Validacion::verificacionIdRouter($id)) {
                try {
                    $registroEliminado = $this->modelo->borrarJuguete($id);
                    if ($registroEliminado > 0) {
                        header('Location: ' . BASE_URL . "lista");
                        exit();
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

        public function mostrarFormularioModificado($id){
            Autorizacion::verificacion();//verifico permisos y parametros validos
            if (Validacion::verificacionIdRouter($id)) {
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
 public function modificarJuguete(){
    Autorizacion::verificacion();
        if ($_POST && Validacion::verificarFormulario($_POST)) {

            $id_juguete = htmlspecialchars($_POST['id_juguete']);
            $nombreProducto = htmlspecialchars($_POST['nombreProducto']);
            $precio = htmlspecialchars($_POST['precio']);
            $material = htmlspecialchars($_POST['material']);
            $id_marca = htmlspecialchars($_POST['id_marca']);
            $codigo = htmlspecialchars($_POST['codigo']);
            $img = htmlspecialchars($_POST['img']);
            
            $registroModificado = $this->modelo->actualizarJuguete($id_juguete, $nombreProducto, $precio, $material,$id_marca, $codigo, $img);

            if ($registroModificado < 1) {
                $this->alertaVista->mostrarError("No se pudo actualizar registro");
            } else {
                header('Location: ' . BASE_URL . "lista");
            }
    }
}

public function mostrarFormularioAlta(){
    Autorizacion::verificacion();
    $marca = $this->modeloMarca->obtenerMarcas(); //consulta las marcas disponibles
    $this->vista->mostrarFormulario($marca);
}

public function agregarJuguete() {
    Autorizacion::verificacion();
    try {
        if ($_POST && Validacion::verificacionFormulario($_POST)) {
            // Obtén y limpia los datos del formulario
            
            $nombreProducto = htmlspecialchars($_POST['nombreProducto']);
            $precio = htmlspecialchars($_POST['precio']);
            $material = htmlspecialchars($_POST['material']);
            $id_marca = htmlspecialchars($_POST['id_marca']);
            $codigo = htmlspecialchars($_POST['codigo']);
            $img = htmlspecialchars($_POST['img']);

            // Inserta el juguete en la base de datos
            $id = $this->modelo->insertarJuguete($nombreProducto, $precio, $material, $id_marca, $codigo, $img);

            if ($id) {
                header('Location: ' . BASE_URL . "lista");
            } else {
                $this->alertaVista->mostrarError("Error al insertar el juguete.");
            }
        } else {
            $this->alertaVista->mostrarError("Error: el formulario no pudo ser procesado. Asegúrate de que hayas completado todos los campos.");
        }
    } catch (PDOException $error) {
        $this->alertaVista->mostrarError("Error en la consulta a la base de datos: " . $error->getMessage());
    }
    }
}
