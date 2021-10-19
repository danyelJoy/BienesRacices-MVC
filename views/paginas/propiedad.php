
<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="titulo-propiedad" ><?php echo $propiedad->titulo; ?></h1>
    
    <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen de la propiedad">
    

    <div class="resumen-propiedad">
        <p class="precio"><?php echo number_format($propiedad->precio) ; ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading='lazy' src="build/img/icono_wc.svg" alt="icono we">
                <p><?php echo $propiedad->wc; ?></p>
            </li>
            <li>
                <img class="icono" loading='lazy' src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <img class="icono" loading='lazy' src="build/img/icono_dormitorio.svg" alt="icono room">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum perferendis odio dolor aperiam eveniet. 
            Molestias officia ipsum, impedit cumque aspernatur adipisci error quibusdam est sed in? 
            Quo at consequuntur quaerat! Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus error 
            officia animi quidem neque quisquam commodi necessitatibus voluptatibus! 
            Minus reiciendis dolorum consequuntur in asperiores repellendus, neque quos minima ut id?</p>

    </div>

</main>