insert into ecommerce.products(nome, prezzo, marca)
values ("tosaerba", 289.99, "oleomac"),
       ("vaso", 9.99, "Villeroy e Boch"),
       ("personal computer", 1799.99, "msi"),
       ("bibbia", 15, "san paolo"),
       ("modellino ferrari", 129.99, "Ferrari");

insert into ecommerce.roles(nome, descrizione)
values ("shopper", "utente base"),
       ("admin", "utente privilegiato");

insert into ecommerce.users(email, password, role_id)
values ('alice@gmail.com', 'password123', 1),
       ('bob@gmail.com','qwerty456', 2),
       ('charlie@outlook.com', 'letmein789', 2),
       ('david@libero.it','pass1234', 1);

INSERT INTO ecommerce.carts (id) VALUES (DEFAULT)

