<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140928165530 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $createTableQueries = file_get_contents(dirname(__FILE__) . '/sql/create_table_queries.sql');
        $this->addSql($createTableQueries);

        $insertQueries = file_get_contents(dirname(__FILE__) . '/sql/insert_queries.sql');
        $this->addSql($insertQueries);
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->throwIrreversibleMigrationException(
            'This migration is required to have the legacy application working, ' . "\n" .
            '(assuming valid server and application configuration, ' . "\n" .
            'see also https://github.com/afup/web/blob/79e0b573c9e40758410792d093de516ad5e8cabc/README.md).');
    }
}
