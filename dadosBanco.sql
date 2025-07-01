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

ALTER TABLE descubra_muriae.usuario
ADD COLUMN nivel INT NOT NULL DEFAULT 21 COMMENT '1=Super Administrador; 11=Administrador; 21=Canditado; 22=Empresa';

ALTER TABLE descubra_muriae.usuario
CHANGE COLUMN login email VARCHAR(50) NULL DEFAULT NULL;

ALTER TABLE descubra_muriae.pessoa_fisica
MODIFY COLUMN cpf CHAR(14) NULL DEFAULT NULL;

ALTER TABLE descubra_muriae.estabelecimento
ADD COLUMN pessoa_fisica_id INT NULL AFTER id,
ADD CONSTRAINT fk_estabelecimento_pessoa_fisica
    FOREIGN KEY (pessoa_fisica_id)
    REFERENCES descubra_muriae.pessoa_fisica(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE;
    
    
    
INSERT INTO cidade (cidade, uf) VALUES 
('Itaperuna', 'RJ'),
('Miraí', 'MG'),
('Muriaé', 'MG'),
('Rosário da Limeira', 'MG'),
('Barão do Monte Alto', 'MG'),
('Patrocínio do Muriaé', 'MG'),
('Miraí', 'MG'),
('Vieiras', 'MG'),
('Eugenópolis', 'MG'),
('Fervedouro', 'MG'),
('São Francisco do Glória', 'MG'),
('Carangola', 'MG'),
('Tombos', 'MG'),
('Ervália', 'MG'),
('Cataguases', 'MG'),
('Leopoldina', 'MG'),
('Além Paraíba', 'MG'),
('Miracema', 'RJ'),
('Bom Jesus do Itabapoana', 'RJ'),
('Natividade', 'RJ'),
('Porciúncula', 'RJ'),
('Varre-Sai', 'RJ'),
('Apiacá', 'ES'),
('Guaçuí', 'ES'),
('Alegre', 'ES');

-- ADMINISTRATIVO
INSERT INTO cargo (descricao) VALUES 
('Assistente Administrativo'),
('Secretária Executiva'),
('Recepcionista'),
('Auxiliar de Escritório'),
('Analista Administrativo'),
('Coordenador Administrativo');

-- FINANCEIRO
INSERT INTO cargo (descricao) VALUES 
('Auxiliar Financeiro'),
('Analista de Contas a Pagar'),
('Analista de Contas a Receber'),
('Tesoureiro'),
('Controller'),
('Diretor Financeiro (CFO)');

-- COMERCIAL / VENDAS
INSERT INTO cargo (descricao) VALUES 
('Vendedor Interno'),
('Vendedor Externo'),
('Representante Comercial'),
('Promotor de Vendas'),
('Gerente Comercial'),
('Consultor de Vendas');

-- RECURSOS HUMANOS
INSERT INTO cargo (descricao) VALUES 
('Auxiliar de RH'),
('Analista de RH'),
('Recrutador'),
('Coordenador de RH'),
('Business Partner'),
('Diretor de RH');

-- LOGÍSTICA / ESTOQUE
INSERT INTO cargo (descricao) VALUES 
('Almoxarife'),
('Auxiliar de Logística'),
('Conferente'),
('Estoquista'),
('Analista de Logística'),
('Supervisor de Logística');

-- INDUSTRIAL / PRODUÇÃO
INSERT INTO cargo (descricao) VALUES 
('Operador de Máquinas'),
('Auxiliar de Produção'),
('Inspetor de Qualidade'),
('Técnico de Manutenção'),
('Engenheiro de Produção'),
('Supervisor de Fábrica');

-- TI / TECNOLOGIA
INSERT INTO cargo (descricao) VALUES 
('Suporte Técnico'),
('Programador'),
('Desenvolvedor Full Stack'),
('Analista de Sistemas'),
('Engenheiro de Software'),
('Gerente de TI');

-- MARKETING / COMUNICAÇÃO
INSERT INTO cargo (descricao) VALUES 
('Designer Gráfico'),
('Social Media'),
('Redator Publicitário'),
('Analista de Marketing'),
('Coordenador de Comunicação'),
('Diretor de Criação');

-- SERVIÇOS GERAIS
INSERT INTO cargo (descricao) VALUES 
('Auxiliar de Serviços Gerais'),
('Cozinheiro(a)'),
('Garçom/Garçonete'),
('Motorista'),
('Porteiro'),
('Zelador');

-- CONSTRUÇÃO CIVIL
INSERT INTO cargo (descricao) VALUES 
('Pedreiro'),
('Ajudante de Obras'),
('Mestre de Obras'),
('Engenheiro Civil'),
('Arquiteto'),
('Técnico em Edificações');











