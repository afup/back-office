<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140928165534 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_role (id INT AUTO_INCREMENT NOT NULL, group_id INT NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_7E33D11AFE54D947 (group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE group_role ADD CONSTRAINT FK_7E33D11AFE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id)');
        $this->addSql('ALTER TABLE afup_personnes_physiques ADD code_pays VARCHAR(2) NOT NULL, CHANGE id id SMALLINT AUTO_INCREMENT NOT NULL, CHANGE id_personne_morale id_personne_morale SMALLINT NOT NULL, CHANGE login login VARCHAR(30) NOT NULL, CHANGE mot_de_passe mot_de_passe VARCHAR(32) NOT NULL, CHANGE niveau niveau TINYINT(1) NOT NULL, CHANGE niveau_modules niveau_modules VARCHAR(10) NOT NULL, CHANGE civilite civilite VARCHAR(4) NOT NULL, CHANGE nom nom VARCHAR(40) NOT NULL, CHANGE prenom prenom VARCHAR(40) NOT NULL, CHANGE email email VARCHAR(100) NOT NULL, CHANGE code_postal code_postal VARCHAR(10) NOT NULL, CHANGE ville ville VARCHAR(50) NOT NULL, CHANGE id_pays id_pays VARCHAR(2) NOT NULL, CHANGE etat etat TINYINT(1) NOT NULL, CHANGE date_relance date_relance INT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE group_role DROP FOREIGN KEY FK_7E33D11AFE54D947');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE group_role');
        $this->addSql('ALTER TABLE afup_personnes_physiques DROP code_pays, CHANGE id id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE id_personne_morale id_personne_morale SMALLINT UNSIGNED DEFAULT \'0\' NOT NULL, CHANGE login login VARCHAR(30) DEFAULT \'\' NOT NULL, CHANGE mot_de_passe mot_de_passe VARCHAR(32) DEFAULT \'\' NOT NULL, CHANGE niveau niveau TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE niveau_modules niveau_modules CHAR(10) DEFAULT \'\' NOT NULL, CHANGE civilite civilite VARCHAR(4) DEFAULT \'\' NOT NULL, CHANGE nom nom VARCHAR(40) DEFAULT \'\' NOT NULL, CHANGE prenom prenom VARCHAR(40) DEFAULT \'\' NOT NULL, CHANGE email email VARCHAR(100) DEFAULT \'\' NOT NULL, CHANGE code_postal code_postal VARCHAR(10) DEFAULT \'\' NOT NULL, CHANGE ville ville VARCHAR(50) DEFAULT \'\' NOT NULL, CHANGE id_pays id_pays CHAR(2) DEFAULT \'\' NOT NULL, CHANGE etat etat TINYINT(1) DEFAULT \'-1\' NOT NULL, CHANGE date_relance date_relance INT UNSIGNED DEFAULT NULL');
    }
}
