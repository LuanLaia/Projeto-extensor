select * from estabelecimento;
select * from vaga;
select * from cargo;
select * from cidade;
select * from pessoa_fisica;
select * from curriculum;
select * from usuario;

INSERT INTO `descubra_muriae`.`estabelecimento` 
(`nome`, `endereco`, `latitude`, `longitude`, `email`) 
VALUES 
('Padaria Sabor de Minas', 'Rua das Rosas, 123 - Centro', '-21.130000', '-42.370000', 'contato@sabordeminas.com');

INSERT INTO cargo (descricao) VALUES ('Estagiario');

INSERT INTO cidade (cidade, uf) VALUES ('Muriaé','MG');
INSERT INTO cidade (cidade, uf) VALUES ('Itaperuna','RJ');

INSERT INTO pessoa_fisica (nome, cpf, visitante_id)
VALUES ('Joao da Silva', '12345678901', 1);

DELETE FROM usuario WHERE id = '1237';

ALTER TABLE descubra_muriae.usuario
MODIFY COLUMN senha VARCHAR(255) NULL DEFAULT NULL;



