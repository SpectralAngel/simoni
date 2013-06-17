<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130616220146 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "postgresql");
        
        $this->addSql("ALTER TABLE avistamientoimportado ADD reino_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE avistamientoimportado ADD CONSTRAINT FK_89AA03B2A165460F FOREIGN KEY (reino_id) REFERENCES Reino (id) NOT DEFERRABLE INITIALLY IMMEDIATE");
        $this->addSql("CREATE INDEX IDX_89AA03B2A165460F ON avistamientoimportado (reino_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "postgresql");
        
        $this->addSql("ALTER TABLE AvistamientoImportado DROP reino_id");
        $this->addSql("ALTER TABLE AvistamientoImportado DROP CONSTRAINT FK_89AA03B2A165460F");
        $this->addSql("DROP INDEX IDX_89AA03B2A165460F");
    }
}
