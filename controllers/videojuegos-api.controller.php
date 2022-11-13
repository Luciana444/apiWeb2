<?php
require_once './models/videojuegos.model.php';
require_once './views/api.view.php';

class VideojuegosApiController{
    private $model;
    private $view;
    private $data;

    public function __construct(){
        $this->model = new VideojuegosModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
    }

    private function getData(){
        return json_decode($this->data);
    }

    public function GetVideojuegos($params = null){
        if (isset($_GET['ordenarPor']) || isset($_GET['orden'])) {
            if (isset($_GET['ordenarPor']) && isset($_GET['orden'])) {
                $videojuegos = $this->model->GetVideojuegos($_GET['ordenarPor'], $_GET['orden']);
                if (!empty($videojuegos)) {
                    $this->view->respuesta($videojuegos);
                } else {
                    $this->view->respuesta("no se encontraron videojuegos", 400);
                }

            } else {
                $this->view->respuesta("complete ambos campos", 404);
            }
        } else {
            $videojuegos = $this->model->GetVideojuegos();
            if (!empty($videojuegos)){
                $this->view->respuesta($videojuegos);
            } else {
                $this->view->respuesta("no se encontraron videojuegos", 400);
            }
        }
    }

    public function GetVideojuego($params = null){
        $id = $params[':ID'];
        $videojuego = $this->model->GetVideojuego($id);
        if (!is_numeric($id)) {
            $this->view->respuesta("porfavor ingrese un id valido de tipo numero", 404);
            die();
        }
        if ($videojuego)
            $this->view->respuesta($videojuego);
        else
            $this->view->respuesta("El videojuego con el id=$id no existe", 404);
    }

    public function AgregarVideojuego($params = null){
        $videojuego = $this->getData();
        if (empty($videojuego->nombre) || empty($videojuego->fecha_de_lanzamiento) || empty($videojuego->descripcion) || empty($videojuego->caracteristica) || empty($videojuego->id_genero)) {
            $this->view->respuesta("Complete todos los campos", 400);
        } else if (is_numeric($videojuego->id_genero)) {
            $idVideojuegoCreado = $this->model->AgregarVideojuego($videojuego->nombre, $videojuego->fecha_de_lanzamiento, $videojuego->descripcion, $videojuego->caracteristica, $videojuego->id_genero);
            $videojuego = $this->model->GetVideojuego($idVideojuegoCreado);
            $this->view->respuesta($videojuego, 201);
        } else {
            $this->view->respuesta("error en id_genero debe ser de tipo numero", 404);
        }
    }

    public function EliminarVideojuego($params = null){
        $id = $params[':ID'];
        $videojuego = $this->model->GetVideojuego($id);
        if (!is_numeric($id)) {
            $this->view->respuesta("porfavor ingrese un id valido de tipo numero", 404);
            die();
        }
        if ($videojuego) {
            $this->model->EliminarVideojuego($id);
            $this->view->respuesta($videojuego);
        } else {
            $this->view->respuesta("El videojuego con el id=$id no existe", 404);
        }
    }

    public function EditarVideojuego($params = null){
        $id = $params[':ID'];
        $videojuego = $this->model->GetVideojuego($id);
        if (!is_numeric($id)) {
            $this->view->respuesta("porfavor ingrese un id valido de tipo numero", 404);
            die();
        }
        $videojuego = $this->getData();
        if (empty($videojuego->nombre) || empty($videojuego->fecha_de_lanzamiento) || empty($videojuego->descripcion) || empty($videojuego->caracteristica) || empty($videojuego->id_genero) || empty($videojuego->id)) {
            $this->view->respuesta("Complete todos los campos", 400);
        } else {
            $id = $this->model->EditarVideojuego($videojuego->nombre, $videojuego->fecha_de_lanzamiento, $videojuego->descripcion, $videojuego->caracteristica, $videojuego->id_genero, $videojuego->id);
            if (!empty($id)) {
                $this->view->respuesta("videojuego con id=$id->id actualizado con exito", 200);
            } else {
                $this->view->respuesta("ingrese un id valido", 404);
            }
        }
    }
}