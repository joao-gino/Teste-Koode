CREATE DATABASE Teste
GO

USE Teste
GO

BEGIN
	CREATE TABLE tb_Funcionarios (
		i_func_id int identity(1,1) PRIMARY KEY,
		vc_func_nome varchar(200),
		vc_func_funcional varchar(50),
		vc_func_filial varchar(50)
	)
END

INSERT INTO tb_Funcionarios (vc_func_nome, vc_func_funcional, vc_func_filial) VALUES
('Paulo da Silva', '00015', 'RJ'),
('Alexandre Gomes', '00017', 'RJ'),
('Joel Ortega', '00033', 'SP'),
('Bruno Cardoso', '00035', 'SP')
GO

SELECT * FROM tb_Funcionarios
GO