<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141117225234 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE group_role DROP FOREIGN KEY FK_7E33D11AFE54D947');
        $this->addSql('CREATE TABLE corporation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, siret BIGINT NOT NULL, UNIQUE INDEX UNIQ_842A5683A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, subscription LONGTEXT NOT NULL COMMENT \'(DC2Type:object)\', UNIQUE INDEX UNIQ_70E4FA78A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subcription (id INT AUTO_INCREMENT NOT NULL, corporation_id INT DEFAULT NULL, member_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, montant DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_763C46B4B2685369 (corporation_id), UNIQUE INDEX UNIQ_763C46B47597D3FE (member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, lastname VARCHAR(40) DEFAULT NULL, firstname VARCHAR(40) DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_1483A5E9A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE corporation ADD CONSTRAINT FK_842A5683A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE subcription ADD CONSTRAINT FK_763C46B4B2685369 FOREIGN KEY (corporation_id) REFERENCES corporation (id)');
        $this->addSql('ALTER TABLE subcription ADD CONSTRAINT FK_763C46B47597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
       
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE subcription DROP FOREIGN KEY FK_763C46B4B2685369');
        $this->addSql('ALTER TABLE subcription DROP FOREIGN KEY FK_763C46B47597D3FE');
        $this->addSql('ALTER TABLE corporation DROP FOREIGN KEY FK_842A5683A76ED395');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78A76ED395');
        $this->addSql('ALTER TABLE group_role ADD CONSTRAINT FK_7E33D11AFE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id)');
        $this->addSql('DROP TABLE corporation');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE subcription');
        $this->addSql('DROP TABLE users');
    }
}
