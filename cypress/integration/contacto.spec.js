/// <reference types="cypress" />

describe('Prueba el Formulario de Contacto', ()=>{

    it('Prueba la página de contacto y el envío', ()=>{
        cy.visit('/contacto')

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario de Contacto');


        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal', 'Llene el formulario de contacto');

        cy.get('[data-cy="formulario-contacto"]').should('exist');
        
    });

    it('Llena los campos del formulario', ()=>{
        cy.get('[data-cy="input-nombre"]').type('Daniel');
        cy.get('[data-cy="textarea-mensaje"]').type('Quiero adquirir una casa en la playa con alberca y dos estacionamientos, 2 baños completos y 3 habitaciones');
        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.get('[data-cy="input-precio"]').type('50000');
        cy.get('[data-cy="forma-contacto"]').eq(1).check();
        cy.get('[data-cy="input-email"]').type('contacto@contacto.com');

        cy.wait(3000);
        cy.get('[data-cy="forma-contacto"]').eq(0).check();
        cy.get('[data-cy="input-telefono"]').type('5632147956');
        cy.get('[data-cy="input-fecha"]').type('2021-07-28');
        cy.get('[data-cy="input-hora"]').type('10:00:00');

        cy.get('[data-cy="formulario-contacto"]').submit();
        cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal', 'Mensaje enviado correctamente');
        cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'alerta').and('have.class', 'exito');


    });

});