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

    private function getData() {
        return json_decode($this->data);
    }

    public function GetVideojuegos($params = null){
        if(isset($_GET['ordenarPor'])){
            if(isset($_GET['ordenarPor']) && isset($_GET['orden'])){
                $videojuegos = $this->model->GetVideojuegos($_GET['ordenarPor'],$_GET['orden']);
            if(!empty($videojuegos ))
                 $this->view->response($videojuegos);
            else
                $this->view->responser("no se encontraron videojuegos", 400);
            }
        }
        else{
            $videojuegos = $this->model->GetVideojuegos();
            if(!empty($videojuegos)){
            $this->view->response($videojuegos);
            }
        }
    }
    
    public function GetVideojuego($params = null){
        $id = $params[':ID'];
        $videojuego = $this->model->GetVideojuego($id);

        if($videojuego)
            $this->view->response($videojuego);
        else
            $this->view->response("El videojuego con el id=$id no existe", 404);
    }

    public function AgregarVideojuego($params = null){
        $videojuego = $this->getData();
        if(empty($videojuego->nombre) || empty($videojuego->fecha_de_lanzamiento) || empty($videojuego->descripcion) || empty($videojuego->caracteristica) || empty($videojuego->id_genero)){
            $this->view->response("Complete todos los campos", 400);
        }else{
            $id = $this->model->AgregarVideojuego($videojuego->nombre, $videojuego->fecha_de_lanzamiento, $videojuego->descripcion, $videojuego->caracteristica, $videojuego->id_genero);
            $videojuego = $this->model->GetVideojuego($id);
            $this->view->response($videojuego, 201);
        }
    }

    public function EliminarVideojuego($params = null){
        $id = $params[':ID'];
        $videojuego = $this->model->GetVideojuego($id);

        if($videojuego){
            $this->model->EliminarVideojuego($id);
            $this->view->response($videojuego);
        }
        else{
            $this->view->response("El videojuego con el id=$id no existe", 404);
        }
    }
}


