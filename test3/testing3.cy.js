/// <reference types="cypress" />

describe('Тестирование Swag Labs', () => {
  
  it('Заполнение формы логина и авторизация', () => {
    cy.visit('https://www.saucedemo.com');

    cy.get('#user-name')
    .type('standard_user')
    .should('have.value', 'standard_user');

    cy.get('#password')
    .type('secret_sauce')
    .should('have.value', 'secret_sauce');

    cy.get('#login-button').click();

    cy.url().should('eq', `https://www.saucedemo.com/inventory.html`);
    });
  it('Сортировка по цене и проверка цен что отфильтровалось в зависимости от стратегии asc/desc', () => {
  cy.visit('https://www.saucedemo.com');
  cy.get('#user-name')
  .type('standard_user')
  .should('have.value', 'standard_user');
  cy.get('#password')
  .type('secret_sauce')
  .should('have.value', 'secret_sauce');
  cy.get('#login-button').click();
  cy.url().should('eq', `https://www.saucedemo.com/inventory.html`);
  
  const SortOrder = (order) => {
  cy.get('.product_sort_container').select(order);
      
  const values = [];
  cy.get('.inventory_item_price').each(($el) => {
  const price = parseFloat($el.text().replace('$', ''));
  values.push(price);
  }).then(() => {
  const sortedPrices = [...values];
  if (order === 'lohi') {
  sortedPrices.sort((a, b) => a - b);
  } else if (order === 'hilo') {
  sortedPrices.sort((a, b) => b - a);
  }
  expect(values).to.deep.equal(sortedPrices);
  });
  };

  SortOrder('lohi');
  SortOrder('hilo');
  });
  it('Добавление двух товаров в корзину и создание заказа', () => {
    cy.visit('https://www.saucedemo.com');
    cy.get('#user-name')
    .type('standard_user')
    .should('have.value', 'standard_user');
    cy.get('#password')
    .type('secret_sauce')
    .should('have.value', 'secret_sauce');
    cy.get('#login-button').click();
    cy.url().should('eq', `https://www.saucedemo.com/inventory.html`);

    cy.get('.inventory_item')
    .first()
    .within(() => {
    cy.get('button').click();
    });

    cy.get('.inventory_item')
    .eq(1)
    .within(() => {
    cy.get('button').click();
    });
    cy.get('.shopping_cart_link').click();
    cy.url().should('eq', `https://www.saucedemo.com/cart.html`);

    cy.get('.cart_item').should('have.length', 2);

    cy.get('[data-test="checkout"]').click();
    cy.url().should('eq', `https://www.saucedemo.com/checkout-step-one.html`);

    cy.get('[data-test="firstName"]')
    .type('igor')
    .should('have.value', 'igor');

    cy.get('[data-test="lastName"]')
    .type('egorov')
    .should('have.value', 'egorov');

    cy.get('[data-test="postalCode"]')
    .type('H3Z 2Y7')
    .should('have.value', 'H3Z 2Y7');

    cy.get('[data-test="continue"]').click();
    cy.url().should('eq', `https://www.saucedemo.com/checkout-step-two.html`);

    cy.get('[data-test="finish"]').click();
    cy.url().should('eq', `https://www.saucedemo.com/checkout-complete.html`);

    cy.get('[data-test="back-to-products"]').click();
    cy.url().should('eq', `https://www.saucedemo.com/inventory.html`);

    });
});
