 -- This script was made for populating the database with fake data for test purposes only. It was made by 'TheComplex' aka Vinicius Lopes. 
use bd_pizzaria;

insert into tb_cargo(nm_cargo, vl_salario, nu_cargaHor) values
('Registrador de caixa',2000.00,6),
('Garçon',2500.00,8),
('Chef de cozinha',5000.00,8),
('Entregador',1800.00,6);

insert into tb_cliente(nm_cliente, ds_endereco_c, nu_telefone) values
('Hytalo','Algum lugar do Naque','33 99145-6740'),
('Querem','Algum lugar do Bom jardim','31 98959-2908'),
('Kamila','Algum lugar do Ideal','31 92009-0326');

insert into tb_funcionario(nm_funcionario, nu_cpf, nu_telefone, ds_endereco, dt_inicio, dt_termino, cd_cargo) values
('Ana Luiza','XXX.XXX.XXX-XX','33 99874-4197','Joanesia','20200101','20230101',1),
('Carla','XXX.XXX.XXX-XX','31 99884-1499','Nao sei :/','20200202','20230202',1),
('Damaris','XXX.XXX.XXX-XX','31 993357-4458','Horto','20200303','20230303',2),
('Julia','XXX.XXX.XXX-XX','31 99754-4978','Tmb nao sei :/','20200404','20230404',4),
('Vinicius','XXX.XXX.XXX-XX','31 99597-8708', 'Iguaçu','20200505','20230505',3);

insert into tb_pedido( dt_pedido, cd_funcionario, cd_cliente,vl_total) values
('20220101',1,1,0),
('20220202',1,2,0),
('20220303',2,3,0);

insert into tb_itens(nm_itens, vl_valor_unitario, qt_estoque) values
('Pizza_Calabresa_P',19.90,100),
('Pizza_Calabresa_M',24.90,100),
('Pizza_Calabresa_G',32.90,100),
('Pizza_Queijo_P',19.90,100),
('Pizza_Queijo_M',24.90,100),
('Pizza_Queijo_G',32.90,100),
('Pizza_Vegetariana_P',19.90,100),
('Pizza_Vegetariana_M',24.90,100),
('Pizza_Vegetariana_G',32.90,100),
('CocaCola_350ml',2.50,100),
('CocaCola_600ml',4.50,100),
('CocaCola_1.5L',6.50,100),
('CocaCola_2.0L',7.99,100),
('CocaCola_2.5L',10.00,100),
('PepsiTwist_350ml',1.50,100),
('PepsiTwist_600ml',3.50,100),
('PepsiTwist_1.5L',5.50,100),
('PepsiTwist_2.0L',6.99,100),
('PepsiTwist_2.5L',9.00,100);

insert into tb_pizzas( cd_itens, nm_sabor, nu_tamanho_p, qt_fatias, ds_ingredientes) values
(1,'Pizza_Calabresa',25,4,'Calabresa'),
(2,'Pizza_Calabresa',30,6,'Calabresa'),
(3,'Pizza_Calabresa',35,8,'Calabresa'),
(4,'Pizza_Queijo', 25,4,'Queijo'),
(5,'Pizza_Queijo',30,6,'Queijo'),
(6,'Pizza_Queijo',35,8,'Queijo'),
(7,'Pizza_Vegetariana', 25,4,'Vegetariana'),
(8,'Pizza_Vegetariana',30,6,'Vegetariana'),
(9,'Pizza_Vegetariana',35,8,'Vegetariana');


insert into tb_bebidas(cd_itens,nu_volume, nm_marca) values
(10,350,'CocaCola_TM'),
(11,600,'CocaCola_TM'),
(12,1500,'CocaCola_TM'),
(13,2000,'CocaCola_TM'),
(14,2500,'CocaCola_TM'),
(15,350,'Pepsi_CO'),
(16,600,'Pepsi_CO'),
(17,1500,'Pepsi_CO'),
(18,2000,'Pepsi_CO'),
(19,2500,'Pepsi_CO');

insert into tb_pedido_itens(nu_pedido,cd_itens, qt_itens) values 
(1,3,1),(1,7,1),(1,13,2),
(2,9,2),(2,10,4),
(3,2,1),(3,19,1);
