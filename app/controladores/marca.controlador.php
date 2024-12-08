<?php
require_once './app/vistas/marca.vista.php';
require_once './app/vistas/alerta.vista.php';
require_once './app/modelos/marca.modelo.php';
require_once './ayudas/validacion.php';
require_once './ayudas/autorizacion.php';

//controller de categorias
class marcaControlador{
    private $modelo;
    private $modeloJuguete;
    private $vista;
    private $alertaVista;

    public function __construct(){
        //se instancian los dos modelos para no delegar mal, y que cada modelo acceda a su tabla correspondiente.
        $this->modelo = new marcaModelo();
        $this->modeloJuguete = new JugueteModelo();
        $this->vista = new marcaVista();
        $this->alertaViesta = new AlertaVista();
    }

    //lista marcas completa
    public function mostrarMarcas(){
        $marcas = $this->modelo->obtenerMarcas();
        if ($marcas != null) {
            $this->vista->demostrarMarcas($marcas, Autorizacion::esAdministrador());
        } else {
            $this->alertaVista->mostrarVacio("no hay elementos para mostrar");
        }
    }
    //lista filtrada
    public function mostrarMarcaId($id) {
        if (Validacion::verificacionIdRouter($id)) {
            $marca = $this->modeloJuguete->obtenerMarcaId($id);
            if ($marca != null) {
                $this->vista->mostrarMarcaId($marca); // Verifica que este método exista
            } else {
                $this->alertaVista->mostrarVacio("la categoria seleccionada no contiene items asociados");
            }
        } else {
            $this->alertaVista->mostrarError("404-Not-Found");
        }
    }
    //eliminar juguete
    public function eliminarMarca($id)
    {
        Autorizacion::verificacion(); //verifico permisos y parametros validos
        if (Validacion::verificacionIdRouter($id)) {
            try {
                $marcaEliminada = $this->modelo->borrarMarca($id);
                if ($marcaEliminada > 0) {
                    header('Location: ' . BASE_URL . "marca");
                } else {
                    $this->alertaVista->mostrarError("error al intentar eliminar");
                }
            } catch (PDOException) {
                $this->alertaVista->mostrarError("la marca que intenta eliminar, tiene asociado un conjunto de items.
                                            Para poder eliminar correctamente,
                                            debera eliminar los registros de los items asociados/
                                            ");
            }
        } else {
            $this->alertaVista->mostrarError("404-Not-Found");
        }
    }

    //mostrar formulario modificacion
    public function formularioMarcaModificacion($id){
        Autorizacion::verificacion(); //verifico permisos y parametros validos
        if (Validacion::verificacionIdRouter($id)) {
            $marca = $this->modelo->obtenerMarcaId($id);//consulto los datos actuales
            if($marca == null){
                $this->alertaVista->mostrarError("error al intentar mostrar formulario");
             }
                $this->vista->mostrarFormularioMarcaModificacion($marca);
        }
    }
 }

    //enviar datos de modificacion 
    function mostrarMarcaModificada(){
        Autorizacion::verificacion();
        try {//verifico permisos, parametros validos y posible acceso sin previo acceso al form modificacion.
            if ($_POST && Validacion::verificacionFormulario($_POST)) {
                $id_marca =htmlspecialchars($_POST['id_marca']);
                $origen =htmlspecialchars($_POST['origen']);
                $caracteristica =htmlspecialchars($_POST['caracteristica']);
                $nombreMarca =htmlspecialchars($_POST['nombreMarca']);
                $imgMarca =htmlspecialchars($_POST['imgMarca']);

                
                $marcaModificada = $this->modelo->modificacionJuguete($id_marca, $origen, $caracteristica, $nombreMarcam, $imgMarca);
                if ($marcaModificada > 0) {
                    header('Location: ' . BASE_URL . "marca");
                } else {
                    $this->alertaVista->mostrarError("No se pudo actualizar marca");
                }
            } 
        } catch (PDOException $error) {
            $this->alertaVista->mostrarError("Error en la consulta a la base de datos/$error");
        }
    }


   function agregarMarca(){
        Autorizacion::verificacion();
        try {//verifico permisos, parametros validos y posible acceso sin datos al form de alta.
            if ($_POST && Validacion::verificacionFormulario($_POST)) {

                $origen =htmlspecialchars($_POST['origen']);
                $caracteristica =htmlspecialchars($_POST['caracteristica']);
                $nombreMarca =htmlspecialchars($_POST['nombreMarca']);
                $imgMarca =htmlspecialchars($_POST['imgMarca']);
               
                $id = $this->modelo->insertarMarca($origen, $caracteristica, $nombreMarca, $imgMarca);
                
                if ($id) {
                    header('Location: ' . BASE_URL . "marca");
                } else {
                    $this->alertaVista->mostrarError("Error al insertar la marca");
                }
            } else {
                $this->alertaVista->mostrarError("Error-El formulario no pudo ser procesado,
                                             asegurate de que hayas completado todos los campos");
            }
        } catch (PDOException $error) {
            $this->alertaVista->mostrarError("Error en la consulta a la base de datos/$error");
        }
    }
