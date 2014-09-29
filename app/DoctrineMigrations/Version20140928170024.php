<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140928170024 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE afup_personnes_physiques CHANGE id_personne_morale id_personne_morale SMALLINT DEFAULT NULL, CHANGE niveau niveau TINYINT(1) DEFAULT NULL, CHANGE niveau_modules niveau_modules VARCHAR(10) DEFAULT NULL');

    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE afup_personnes_physiques CHANGE id_personne_morale id_personne_morale SMALLINT NOT NULL, CHANGE niveau niveau TINYINT(1) NOT NULL, CHANGE niveau_modules niveau_modules VARCHAR(10) NOT NULL');
    }
}
