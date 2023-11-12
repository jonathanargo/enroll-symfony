<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231112142715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    /**
     * Creates teacher and class tables
     */
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE class_model_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE teacher_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE class_model (id INT NOT NULL, teacher_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, time VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_314253EF2EBB220A ON class_model (teacher_id_id)');
        $this->addSql('CREATE TABLE teacher (id INT NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, has_tenure BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE class_model ADD CONSTRAINT FK_314253EF2EBB220A FOREIGN KEY (teacher_id_id) REFERENCES teacher (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE class_model_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE teacher_id_seq CASCADE');
        $this->addSql('ALTER TABLE class_model DROP CONSTRAINT FK_314253EF2EBB220A');
        $this->addSql('DROP TABLE class_model');
        $this->addSql('DROP TABLE teacher');
    }
}
