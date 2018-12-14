<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181213150353 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contas (id INT AUTO_INCREMENT NOT NULL, tipo VARCHAR(255) NOT NULL, descricao VARCHAR(255) NOT NULL, valor DOUBLE PRECISION NOT NULL, responsavel VARCHAR(255) NOT NULL, meio_pagamento VARCHAR(255) NOT NULL, data_compra DATETIME NOT NULL, mes_fatura DATETIME DEFAULT NULL, numero_parcelas INT NOT NULL, data_fim DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lancamentos (id INT AUTO_INCREMENT NOT NULL, conta_id_id INT NOT NULL, data_lancamento DATETIME NOT NULL, parcela INT NOT NULL, valor DOUBLE PRECISION NOT NULL, INDEX IDX_AEB8938957994F4D (conta_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projecoes (id INT AUTO_INCREMENT NOT NULL, descricao VARCHAR(255) NOT NULL, tipo VARCHAR(255) NOT NULL, tipo_dias VARCHAR(255) DEFAULT NULL, valor DOUBLE PRECISION NOT NULL, tipo_quantidade_dias VARCHAR(255) DEFAULT NULL, quantidade_dias INT DEFAULT NULL, dias_da_semana LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', forma_calculo VARCHAR(255) DEFAULT NULL, quantidade_tarifa INT DEFAULT NULL, mes_inicio DATETIME NOT NULL, mes_fim DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendas (id INT AUTO_INCREMENT NOT NULL, valor DOUBLE PRECISION NOT NULL, mes_inicio DATETIME NOT NULL, mes_fim DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lancamentos ADD CONSTRAINT FK_AEB8938957994F4D FOREIGN KEY (conta_id_id) REFERENCES contas (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lancamentos DROP FOREIGN KEY FK_AEB8938957994F4D');
        $this->addSql('DROP TABLE contas');
        $this->addSql('DROP TABLE lancamentos');
        $this->addSql('DROP TABLE projecoes');
        $this->addSql('DROP TABLE rendas');
    }
}
