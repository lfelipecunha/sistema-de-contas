CREATE TABLE contas(
	id BIGINT PRIMARY KEY,
	tipo ENUM('unica', 'parcelada', 'medicao') NOT NULL,
	descricao VARCHAR(255) NOT NULL,
	valor DECIMAL(13,2) NOT NULL,
	responsavel ENUM('Luiz', 'Cintia', 'Luiz e Cintia') NOT NULL,
	meio_pagamento ENUM('master_itau', 'master_nubank', 'boleto', 'debito_em_conta') NOT NULL,
	data_compra DATE NOT NULL,
	mes_fatura DATE,
	numero_parcelas INT NOT NULL DEFAULT 1,
	data_fim DATE
);

CREATE TABLE lancamentos(
	id BIGINT PRIMARY KEY,
	conta_id BIGINT NOT NULL,
	data_lancamento DATE NOT NULL,
	parcela NOT NULL DEFAULT 1,
	valor DECIMAL(13,2),
	FOREIGN KEY(conta_id) REFERENCES contas(id)
);

CREATE TABLE rendas(
	id BIGINT PRIMARY KEY,
	valor DECIMAL(13,2) NOT NULL,
	mes_inicio DATE NOT NULL,
	mes_inicio DATE
);

CREATE TABLE projecoes(
	id BIGINT PRIMARY KEY,
	descricao VARCHAR(255) NOT NULL,
	tipo ENUM('mensal', 'diario') NOT NULL,
	tipo_dias ENUM('uteis', 'corrido'),
	valor DECIMAL(13,2) NOT NULL,
	tipo_quantidade_dias ENUM('todos', 'mes', 'semana'),
	quantidade_dias INT,
	dias_da_semana INT,
	forma_calculo ENUM('fixo', 'multiplicador'),
	quantidade_tarifa INT,
	mes_inicio DATE NOT NULL,
	mes_fim DATE
);