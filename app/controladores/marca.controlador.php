<?php
require_once './app/vistas/marca.vista.php';
require_once './app/vistas/alerta.vista.php';
require_once './app/modelos/marca.modelo.php';
require_once './ayudas/validacion.ayuda.php';

//controller de categorias
class marcaControlador
{
    private $modelo;
    private $modelJuguete;
    private $vista;
    private $alertaVista;

    public function __construct()
    {
        //se instancian los dos modelos para no delegar mal, y que cada modelo acceda a su tabla correspondiente.
        $this->modelo = new marcaModelo();
        $this->modeloJuguete = new JugueteModelo();
        $this->vista = new marcaVista();
        $this->alertaViesta = new AlertaVista();
    }

    //lista completa
    public function mostrarMarca()
    {
        $marcas = $this->modelo->obtenerMarca();
        if ($marcas != null) {
            $this->vista->mostrarMarca($marcas, autorizacionAyuda::esAdministrador());
        } else {
            $this->alertaVista->mostrarVacio("no hay elementos para mostrar");
        }
    }
    //lista filtrada
    public function mostrarMarcaPorId($id)
    {
        if (ValidacionAyuda::verificacionIdRouter($id)) { //validacion datos recibidos del router
            $marca = $this->modeloLista->obtenerJugueteMarcaId($id);//selecciona los items relacionados y la categoria asociada segun parametro
            if ($marca != null) {
                $this->vista->mostrarJugueteMarcaPorId($marca);
            } else {
                $this->alertaVista->mostrarVacio("la categoria seleccionada no contiene items asociados");
            }
        } else {
            $this->alertaVista->mostrarError("404-Not-Found");
        }
    }

    //eliminar categoria
    public function eliminarMarca($id)
    {
        autorizacionAyuda::verificacion(); //verifico permisos y parametros validos
        if (ValidationHelper::verificacionIdRouter($id)) {
            try {
                $marcaEliminada = $this->modelo->borrarMarca($id);
                if ($marcaEliminada > 0) {
                    header('Location: ' . BASE_URL . "category");
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
    public function mostrarModificacionFormMarca($id){
        autorizacionAyuda::verificacion(); //verifico permisos y parametros validos
        if (ValidacionAyuda::verificacionIdRouter($id)) {
            $marca = $this->modelo->obtenerMarcaId($id);//consulto los datos actuales
            if($marca!=null){
            $this->vista->mostrarModificacionFormMarca($marca);
            }
            else{
                $this->alertaVista->mostrarError("error al intentar mostrar formulario");
            }
        }else{
            $this->alertaVista->mostrarError("404-Not-Found");
        }
    }

    //enviar datos de modificacion 
    public function mostrarModificacionMarca(){
        autorizacionAyuda::verificacion();
        try {//verifico permisos, parametros validos y posible acceso sin previo acceso al form modificacion.
            if ($_POST && ValidacionAyuda::verificacionFormulario($_POST)) {
                $id_marca =htmlspecialchars($_POST['id_marca']);
                $origen =htmlspecialchars($_POST['origen']);
                $caracteristica =htmlspecialchars($_POST['caracteristica']);
                
                $marcaModificada = $this->modelo->modificacionJuguete($id_marca, $origen, $caracteristica);
                if ($marcaModificada > 0) {
                    header('Location: ' . BASE_URL . "marca");
                } else {
                    $this->alertaVista->mostrarError("No se pudo actualizar marca");
                }
            } else {
                $this->alertaVista->mostrarError("Error-El formulario no pudo ser procesado, asegurate de que hayas completado todos los campos");
            }
        } catch (PDOException $error) {
            $this->alertaVista->mostrarError("Error en la consulta a la base de datos/$error");
        }
    }


    //mostrar formulario altaCategoria
    public function mostrarFormularioMarca(){
        autorizacionAyuda::verificacion();
        $this->vista->mostrarFormularioMarca();
    }

    public function agregarMarca(){
        autorizacionAyuda::verificacion();
        try {//verifico permisos, parametros validos y posible acceso sin datos al form de alta.
            if ($_POST && ValidacionAyuda::verificacionFormulario($_POST)) {

                $origen =htmlspecialchars($_POST['origen']);
                $caracteristica =htmlspecialchars($_POST['caracteristica']);
               
                $id = $this->modelo->insertarMarca($origen, $caracteristica);
                if ($id) {
                    header('Location: ' . BASE_URL . "marca");
                } else {
                    $this->alertaVista->mostrarError("Error al insertar la categoria");
                }
            } else {
                $this->alertaVista->mostrarError("Error-El formulario no pudo ser procesado,
                                             asegurate de que hayas completado todos los campos");
            }
        } catch (PDOException $error) {
            $this->alertaVista->mostrarError("Error en la consulta a la base de datos/$error");
        }
    }
}