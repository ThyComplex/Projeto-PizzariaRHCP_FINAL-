-- relatorios de consulta: 
use bd_pizzaria;

/* @cod = normalmente uma variavel php que pega um valor de um campo quaisquer.  */
 set @cod := 2; 
 
/* 1) Consulta de pedido : */

select   
	nu_pedido,
    vl_total,
    dt_pedido,
    nm_cliente
from tb_pedido as TBP
inner join tb_cliente as TBC on TBP.cd_cliente = TBC.cd_cliente
where TBP.nu_pedido = @cod
order by TBC.cd_cliente;

/* 2) Itens to pedido:  */
select 
	nm_itens,
    vl_valor_unitario,
    qt_itens,
    qt_itens * vl_valor_unitario as vl_conjunto
from tb_pedido as TBP
inner join tb_pedido_itens as TBPI on TBPI.nu_pedido = TBP.nu_pedido
inner join tb_itens as TBI on TBI.cd_itens = TBPI.cd_itens
where TBP.nu_pedido = @cod;
; 
/* 3) relatorio de contatos: */
 
 select 
	nm_cliente as Nome,
    nu_telefone as Telefone,
    ds_endereco_c as Endereço
 from tb_cliente
 union select 
	nm_funcionario as Nome,
    nu_telefone as Telefone,
    ds_endereco as Endereço
from tb_funcionario
 order by Nome;
 
 /* 4) Consulta de funcionario:  */
 
 select
	cd_funcionario,
    nm_funcionario,
    nu_cpf,
    nu_telefone,
    ds_endereco,
    dt_inicio,
    dt_termino,
   TBF.cd_cargo,
    nm_cargo,
    vl_salario,
    nu_cargaHor
from tb_funcionario as TBF
inner join tb_cargo as TBC on TBC.cd_cargo = TBF.cd_cargo
order by cd_funcionario;

