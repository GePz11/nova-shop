<?php
class Admin extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        if (!empty($_SESSION['nombre_usuario'])) {
            header('Location: '. BASE_URL . 'admin/home');
            exit;
        }
        $data['title'] = 'Acceso al Sistema';
        $this->views->getView('admin', "login", $data);
    }

    public function validar() 
    {
        if (isset($_POST['email']) && isset($_POST['clave'])) {
            if (empty($_POST['email']) || empty($_POST['clave'])) {
                $respuesta =  array('msg' => 'TODOS LOS CAMPOS SON REQUERIDOS', 'icono' => 'warning');
            }else {
                $data = $this->model->getUsuario($_POST['email']);
                if (empty($data)) {
                    $respuesta = array('msg' => 'EL CORREO NO EXISTE', 'icono' => 'warning');
                }else {
                    if (password_verify($_POST['clave'], $data['clave'])) {
                        $_SESSION['email'] = $data['correo'];
                        $_SESSION['nombre_usuario'] = $data['nombres'];
                        $respuesta = array('msg' => 'BIENVENIDO', 'icono' => 'success');
                    }else {
                        $respuesta = array('msg' => 'CONTRASEÑA INCORRECTA', 'icono' => 'warning');
                    }
                }
            }
        }else {
                $respuesta =  array('msg' => 'ERROR FATAL', 'icono' => 'error');
        }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function home()  
    {
        if (empty($_SESSION['nombre_usuario'])) {
            header('Location: '. BASE_URL . 'admin');
            exit;
        }
        $data['title'] = 'Panel Administrativo';
        $data['pendientes'] = $this->model->getTotales(1);
        $data['procesos'] = $this->model->getTotales(2);
        $data['finalizados'] = $this->model->getTotales(3);
        $data['productos'] = $this->model->getProductos();
        $this->views->getView('admin/administracion', "index", $data);
    }

    public function productosMinimos()
    {
        if (empty($_SESSION['nombre_usuario'])) {
            header('Location: '. BASE_URL . 'admin');
            exit;
        }
        $data = $this->model->productosMinimos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function topProductos()
    {
        if (empty($_SESSION['nombre_usuario'])) {
            header('Location: '. BASE_URL . 'admin');
            exit;
        }
        $data = $this->model->topProductos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir() 
    {
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}