<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130803222935 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "postgresql");
        
        $this->addSql("ALTER TABLE atributoclave ADD datos_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE atributoclave ADD CONSTRAINT FK_D7348F5C77198A62 FOREIGN KEY (datos_id) REFERENCES media__media (id) NOT DEFERRABLE INITIALLY IMMEDIATE");
        $this->addSql("CREATE INDEX IDX_D7348F5C77198A62 ON atributoclave (datos_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "postgresql");
        
        $this->addSql("CREATE SEQUENCE acl_entries_id_seq INCREMENT BY 1 MINVALUE 1 START 1");
        $this->addSql("CREATE SEQUENCE acl_security_identities_id_seq INCREMENT BY 1 MINVALUE 1 START 1");
        $this->addSql("CREATE SEQUENCE acl_classes_id_seq INCREMENT BY 1 MINVALUE 1 START 1");
        $this->addSql("CREATE SEQUENCE acl_object_identities_id_seq INCREMENT BY 1 MINVALUE 1 START 1");
        $this->addSql("ALTER TABLE AtributoClave DROP datos_id");
        $this->addSql("ALTER TABLE AtributoClave DROP CONSTRAINT FK_D7348F5C77198A62");
        $this->addSql("DROP INDEX IDX_D7348F5C77198A62");
        $this->addSql("ALTER TABLE fos_user ALTER created_at DROP NOT NULL");
        $this->addSql("ALTER TABLE fos_user ALTER updated_at DROP NOT NULL");
    }
}
