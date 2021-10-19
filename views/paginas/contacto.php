
<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>
    
    <?php  if($mensaje) { ?>
        <p data-cy="alerta-envio-formulario" class='alerta exito'><?php echo $mensaje ?></p>;
    <?php } ?> 
    
    
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de contacto">
    </picture>
    <h2 data-cy="heading-formulario">Llene el formulario de contacto</h2>
    <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" >


            <label for="mensaje">Mensaje:</label>
            <textarea data-cy="textarea-mensaje" id="mensaje" name="contacto[mensaje]" ></textarea>

        </fieldset>
        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <label for="opciones">Vende o Compra</label>
            <select data-cy="input-opciones" id="opciones" name="contacto[tipo]" >
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="prosupuesto">Precio o Prosupuesto</label>
            <input data-cy="input-precio" type="number" placeholder="Tu Precio o Prosupuesto" id="prosupuesto" name="contacto[precio]" >

        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label form="contactar-teléfono">Teléfono</label>
                <input data-cy="forma-contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" >

                <label form="contactar-email">E-mail</label>
                <input data-cy="forma-contacto"  type="radio" value="email" id="contactar-email" name="contacto[contacto]" >
            </div>

            <div id="contacto"></div>

           
        </fieldset>    

        <input type="submit" class="boton-verde" value="Enviar">

    </form>
</main>