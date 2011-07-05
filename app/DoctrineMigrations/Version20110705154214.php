<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20110705154214 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE club_shop_subscription_ticket (id INT AUTO_INCREMENT NOT NULL, subscription_id INT DEFAULT NULL, tickets INT NOT NULL, created_at DATE NOT NULL, INDEX IDX_2DF24DBD9A1887DC (subscription_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE club_shop_subscription_ticket ADD FOREIGN KEY (subscription_id) REFERENCES club_shop_subscription(id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("DROP TABLE club_shop_subscription_ticket");
    }
}
