<?php 
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index(Router $router) {

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin',[
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router){

        $propiedad = new Propiedad;
        $vendedores =  Vendedor::all();

        //Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crecar una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);
            
             
            /*SUBIDA DE ARCHIVOS*/
            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
            //Setear la imagen
            
            //Realiza un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
    
            }    
    
            //Validar
            $errores = $propiedad->validar();
            
            //Revisar que el array de errores este vacio
            if(empty($errores)) {
       
                //Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
    
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
    
                //Guardar en base de datos
                $propiedad->guardar();   
    
            }
        }
         
        
        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores

        ]);

    }

    public static function actualizar(Router $router){
        $id = validarODireccionar('/admin');

        $propiedad = Propiedad::find($id);

        $errores = Propiedad::getErrores();

        $vendedores =  Vendedor::all();

        //Método POST para actualizar 

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar los atributos
            $args = $_POST ['propiedad'];
    
            $propiedad->sincronizar($args); 
    
            //Validación
            $errores = $propiedad->validar();     
            
            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
            //Subida de archivos
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);    
            }
    
            //Revisar que el array de errores este vacio
            if(empty($errores)) {
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    //Almacenar la imagen
                    $image -> save(CARPETA_IMAGENES. $nombreImagen);
                }    
    
                $propiedad->guardar();     
            }
        }       
    

        $router->render('/propiedades/actualizar',[
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar (){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //Validar Id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
    
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();                
                } 
            }
        }
    }
}


?>