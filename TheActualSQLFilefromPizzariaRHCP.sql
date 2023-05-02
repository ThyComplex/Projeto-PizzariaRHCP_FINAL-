CREATE DATABASE if not exists bd_pizzaria; 
use bd_pizzaria; 

create table if not exists tb_cargo(
    cd_cargo int AUTO_INCREMENT PRIMARY KEY,
    nm_cargo  varchar(64) NOT null unique,
	vl_salario numeric(10,2) NOT null,
    nu_cargaHor int not null 
);
create table if not exists tb_cliente(
    cd_cliente int AUTO_INCREMENT PRIMARY KEY,
    nm_cliente varchar(64) NOT null,
    ds_endereco_c varchar(128) not null,
    nu_telefone varchar(16) not null
    );

create table if not exists tb_funcionario(
    cd_funcionario int AUTO_INCREMENT PRIMARY KEY,
    nm_funcionario varchar(64) NOT null, 
    nu_cpf varchar(16) not null,
    nu_telefone varchar(16) not null,
    ds_endereco varchar(128) not null,
	dt_inicio date NOT null,
	dt_termino date not null,
    cd_cargo int ,
    constraint fk_cargo foreign key (cd_cargo) references tb_cargo(cd_cargo)
	on delete set null
    on update set null 
    );
    

create table if not exists tb_pedido(
    nu_pedido int AUTO_INCREMENT PRIMARY KEY,
    vl_total numeric(10,2) NOT null,
    dt_pedido date NOT null,
    cd_funcionario int,
    cd_cliente int,
    constraint fkb_funcionario foreign key (cd_funcionario) references tb_funcionario(cd_funcionario)
		on delete set null
        on update set null,
	constraint fkb_cliente foreign key (cd_cliente) references tb_cliente(cd_cliente)
		on delete set null 
        on update set null    
    );

create table if not exists tb_itens(
    cd_itens int AUTO_INCREMENT PRIMARY KEY,
    nm_itens varchar(64) NOT null,
    vl_valor_unitario numeric(10,2) NOT null,
    qt_estoque int NOT null
    );
create table if not exists tb_pizzas(
    nm_sabor varchar(32) NOT null,
    nu_tamanho_p int NOT null,
    qt_fatias int NOT null,
    ds_ingredientes varchar(64) NOT null,
    cd_itens int,
    constraint fka_itens foreign key (cd_itens) references tb_itens(cd_itens)
,
		primary key(cd_itens) 
    );
    
create table if not exists tb_bebidas(
    nu_volume int NOT null,
    nm_marca varchar(32) NOT null,
    cd_itens int,
    constraint fkb_itens foreign key (cd_itens) references tb_itens (cd_itens)
 ,
		primary key(cd_itens)
    ); 
    
create table if not exists tb_pedido_itens(
    cd_itens int,
    
    qt_itens int NOT null,
    nu_pedido int,
    constraint fka_pedido foreign key (nu_pedido) references tb_pedido(nu_pedido)
    ,
    constraint fkc_itens foreign key (cd_itens)references tb_itens(cd_itens)
,
		primary key(nu_pedido,cd_itens)
    );
    
 --  drop database bd_pizzaria;