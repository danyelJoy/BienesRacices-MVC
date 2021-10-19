/// <reference types="cypress" />

describe('Carga la página principal', () => {
    it('Prueba el header la página principal', () => {
        cy.visit('/');  

        cy.get('[data-cy="heading-sitio"]').should('exist');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal','Venta de Casas y Departamentos de Lujo'); 
        
         


    });
    it('Prueba el icono deL blog principal nosotros', () =>{
        cy.visit('/'); 
        cy.get('[data-cy="heading-sitio-iconos"]').invoke('text').should('equal','Más sobre nosotros');
        cy.get('[data-cy="heading-sitio-iconos"]').should('have.prop', 'tagName').should('equal','H2');
 

        //Selecciona los incos
        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3);
    });

    it('Prueba vista departamentos página principal', () => {
        
        //Debe tener 3 propiedades la página principal
        cy.get('[data-cy="anuncio-casas"]').should('have.length', 3);
        cy.get('[data-cy="anuncio-casas"]').should('not.have.length', 5);

        //Verificar enlace de las propiedades
        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block');
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal', 'Ver Propiedad');  

        //Probar  el enlace a una propiedad
        cy.get('[data-cy="enlace-propiedad"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should('exist');
        // cy.wait(1000);
        cy.go('back');
    });
    it('Prueba el Routing hacia todas las propiedades', () =>{

        cy.get('[data-cy="ver-propiedades"]').should('exist');
        cy.get('[data-cy="ver-propiedades"]').should('have.class', 'boton-verde');
        cy.get('[data-cy="ver-propiedades"]').invoke('attr', 'href').should('equal', '/propiedades');
        cy.get('[data-cy="ver-propiedades"]').click();

        // cy.wait(1000);
        cy.go('back');
    });

    it('Prueba boton contactanos', () =>{
        cy.get('[data-cy="contacto-titulo"]').should('exist');
        cy.get('[data-cy="contacto-titulo"]').find('h2').invoke('text').should('equal', 'Encuentra la casa de tus sueños');
        cy.get('[data-cy="contacto-titulo"]').find('a').invoke('attr', 'href').then(href =>{
            cy.visit(href);
        });
        
        // cy.wait(1000);
        cy.visit('/');

    });
    it('Prueba los testimoniales y blog', ()=>{
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal', 'Nuestro Blog');
        cy.get('[data-cy="blog"]').find('img').should('have.length', 2);

        cy.get('[data-cy="testimoniales"]').should('exist');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal', 'Testimoniales');


    });
});