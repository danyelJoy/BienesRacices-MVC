
<main class="contenedor seccion">
    <h2 data-cy='heading-sitio-iconos'>Más sobre nosotros</h2>
    <?php include 'iconos.php'; ?>
</main>
<section class="seccion contenedor">
    <h2>Casas y Departamendos en Venta</h2>

    <?php            
        include 'listado.php';
    ?>

    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde" data-cy="ver-propiedades">Ver Todas</a>
    </div>
    
</section>

<section class="imagen-contacto" data-cy="contacto-titulo">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo.</p>
    <a href="/contacto" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog" data-cy="blog">
        <h3>Nuestro Blog</h3>
        
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Pérgolas en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/06/2021</span>por: <span>Admin</span></p>

                    <p>
                        Consejos para construir una pérgola  en tu casa con los mejores materiales y ahorrando dinero.
                    </p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>20/06/2021</span>por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio en tu hogar con esta guía, aprende a combinar tus muebles y colores
                        para darle vida a tu hogar.
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales" data-cy="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>El personal fue muy amable buena actitud de servicio, muy buena atención
                y la casa que me ofrecieron cumple con lo que estaba buscando.
            </blockquote>
            <p>Daniel Rojas</p>
        </div>
    </section>

</div>
