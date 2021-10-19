<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasControllers {
    public static function index(Router $router ){

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio

        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router){

        
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades

        ]);
    }
    public static function propiedad(Router $router){
        
        $id = validarODireccionar('/propiedades');

        //buscar la propiedad por su id
        $propiedad = Propiedad::find($id);
        
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
             
        ]);
    }
    public static function blog(Router $router){
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router){
        
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];

            //Crear instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'fd88fd87130932';
            $mail->Password = '37f9df692e5dbe';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaicesMex.com');
            $mail->Subject = 'Tienes un Nuevo Mensaje';
            
            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
  

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje </p>';
            $contenido .= '<p> Nombre: '.$respuestas['nombre'] . '</p>';
            
            //Enviar de forma condicional algunos campos de email o teléfono
            if($respuestas['contacto']=== 'telefono') {
                $contenido .= '<p> Eligio ser contactado via teléfono: </p>';
                $contenido .= '<p> Teléfono: '.$respuestas['telefono'] . '</p>';
                $contenido .= '<p> Fecha Contacto: '.$respuestas['fecha'] . '</p>';
                $contenido .= '<p> Hora: '.$respuestas['hora'] . '</p>';


            }else {
                //Es email, entonces agregamos el campo de email
                $contenido .= '<p> Eligio ser contactado via Email: </p>';
                $contenido .= '<p> Email: '.$respuestas['email'] . '</p>';
            }
            
            $contenido .= '<p> Mensaje: '.$respuestas['mensaje'] . '</p>';
            $contenido .= '<p> Vende o Compra: '.$respuestas['tipo'] . '</p>';
            $contenido .= '<p> Precio o Prosupuesto: $ '.$respuestas['precio'] . '</p>';
            $contenido .= '<p> Prefiere ser Contactado: '.$respuestas['contacto'] . '</p>';

            $contenido .='</html>';
            
            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';
            //Enviar el email
            if($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            }else {
                $mensaje = "El mensaje no pudo enviarse intente de nuevo";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje

        ]);
    }
}