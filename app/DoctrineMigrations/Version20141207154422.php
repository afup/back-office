<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141207154422 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE corporate_subscription (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, corporation_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_C5DCF6C8C54C8C93 (type_id), INDEX IDX_C5DCF6C8B2685369 (corporation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personal_subscription (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, member_id INT DEFAULT NULL, corporate_subscription_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_4573AEA1C54C8C93 (type_id), INDEX IDX_4573AEA17597D3FE (member_id), INDEX IDX_4573AEA1347EDAC9 (corporate_subscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription_type (id INT AUTO_INCREMENT NOT NULL, tag VARCHAR(20) NOT NULL, name VARCHAR(150) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE corporate_subscription ADD CONSTRAINT FK_C5DCF6C8C54C8C93 FOREIGN KEY (type_id) REFERENCES subscription_type (id)');
        $this->addSql('ALTER TABLE corporate_subscription ADD CONSTRAINT FK_C5DCF6C8B2685369 FOREIGN KEY (corporation_id) REFERENCES corporation (id)');
        $this->addSql('ALTER TABLE personal_subscription ADD CONSTRAINT FK_4573AEA1C54C8C93 FOREIGN KEY (type_id) REFERENCES subscription_type (id)');
        $this->addSql('ALTER TABLE personal_subscription ADD CONSTRAINT FK_4573AEA17597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE personal_subscription ADD CONSTRAINT FK_4573AEA1347EDAC9 FOREIGN KEY (corporate_subscription_id) REFERENCES corporate_subscription (id)');
        $this->addSql('ALTER TABLE corporation ADD numSubscriptionMax INT NOT NULL');
        $this->addSql('ALTER TABLE member DROP subscription');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE personal_subscription DROP FOREIGN KEY FK_4573AEA1347EDAC9');
        $this->addSql('ALTER TABLE corporate_subscription DROP FOREIGN KEY FK_C5DCF6C8C54C8C93');
        $this->addSql('ALTER TABLE personal_subscription DROP FOREIGN KEY FK_4573AEA1C54C8C93');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_role (id INT AUTO_INCREMENT NOT NULL, group_id INT NOT NULL, role VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_7E33D11AFE54D947 (group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subcription (id INT AUTO_INCREMENT NOT NULL, member_id INT DEFAULT NULL, corporation_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, montant DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_763C46B4B2685369 (corporation_id), UNIQUE INDEX UNIQ_763C46B47597D3FE (member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subcription ADD CONSTRAINT FK_763C46B47597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE subcription ADD CONSTRAINT FK_763C46B4B2685369 FOREIGN KEY (corporation_id) REFERENCES corporation (id)');
        $this->addSql('DROP TABLE corporate_subscription');
        $this->addSql('DROP TABLE personal_subscription');
        $this->addSql('DROP TABLE subscription_type');
        $this->addSql('ALTER TABLE corporation DROP numSubscriptionMax');
        $this->addSql('ALTER TABLE member ADD subscription LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:object)\'');
    }
}
