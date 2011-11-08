<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20111108071528 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE club_team_schedule (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, level_id INT DEFAULT NULL, description LONGTEXT NOT NULL, first_date DATETIME NOT NULL, end_date DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5FBD8B31296CD8AE (team_id), INDEX IDX_5FBD8B315FB14BA7 (level_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE club_team_schedule ADD CONSTRAINT FK_5FBD8B31296CD8AE FOREIGN KEY (team_id) REFERENCES club_team_team(id)");
        $this->addSql("ALTER TABLE club_team_schedule ADD CONSTRAINT FK_5FBD8B315FB14BA7 FOREIGN KEY (level_id) REFERENCES club_team_level(id)");
        $this->addSql("ALTER TABLE club_team_team_user DROP FOREIGN KEY FK_27C68C06296CD8AE");
        $this->addSql("DROP INDEX IDX_27C68C06296CD8AE ON club_team_team_user");
        $this->addSql("ALTER TABLE club_team_team_user DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE club_team_team_user CHANGE team_id schedule_id INT NOT NULL");
        $this->addSql("ALTER TABLE club_team_team_user ADD CONSTRAINT FK_27C68C06A40BC2D5 FOREIGN KEY (schedule_id) REFERENCES club_team_schedule(id) ON DELETE CASCADE");
        $this->addSql("CREATE INDEX IDX_27C68C06A40BC2D5 ON club_team_team_user (schedule_id)");
        $this->addSql("ALTER TABLE club_team_team_user ADD PRIMARY KEY (schedule_id, user_id)");
        $this->addSql("ALTER TABLE club_team_team DROP FOREIGN KEY FK_BA08F2825FB14BA7");
        $this->addSql("DROP INDEX IDX_BA08F2825FB14BA7 ON club_team_team");
        $this->addSql("ALTER TABLE club_team_team DROP level_id");
        $this->addSql("ALTER TABLE club_team_repetition DROP FOREIGN KEY FK_BC76ED49296CD8AE");
        $this->addSql("DROP INDEX IDX_BC76ED49296CD8AE ON club_team_repetition");
        $this->addSql("ALTER TABLE club_team_repetition CHANGE team_id schedule_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE club_team_repetition ADD CONSTRAINT FK_BC76ED49A40BC2D5 FOREIGN KEY (schedule_id) REFERENCES club_team_schedule(id)");
        $this->addSql("CREATE INDEX IDX_BC76ED49A40BC2D5 ON club_team_repetition (schedule_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE club_team_team_user DROP FOREIGN KEY FK_27C68C06A40BC2D5");
        $this->addSql("ALTER TABLE club_team_repetition DROP FOREIGN KEY FK_BC76ED49A40BC2D5");
        $this->addSql("DROP TABLE club_team_schedule");
        $this->addSql("ALTER TABLE club_team_repetition DROP FOREIGN KEY FK_BC76ED49A40BC2D5");
        $this->addSql("DROP INDEX IDX_BC76ED49A40BC2D5 ON club_team_repetition");
        $this->addSql("ALTER TABLE club_team_repetition CHANGE schedule_id team_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE club_team_repetition ADD CONSTRAINT FK_BC76ED49296CD8AE FOREIGN KEY (team_id) REFERENCES club_team_team(id)");
        $this->addSql("CREATE INDEX IDX_BC76ED49296CD8AE ON club_team_repetition (team_id)");
        $this->addSql("ALTER TABLE club_team_team ADD level_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE club_team_team ADD CONSTRAINT FK_BA08F2825FB14BA7 FOREIGN KEY (level_id) REFERENCES club_team_level(id)");
        $this->addSql("CREATE INDEX IDX_BA08F2825FB14BA7 ON club_team_team (level_id)");
        $this->addSql("ALTER TABLE club_team_team_user DROP FOREIGN KEY FK_27C68C06A40BC2D5");
        $this->addSql("DROP INDEX IDX_27C68C06A40BC2D5 ON club_team_team_user");
        $this->addSql("ALTER TABLE club_team_team_user DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE club_team_team_user CHANGE schedule_id team_id INT NOT NULL");
        $this->addSql("ALTER TABLE club_team_team_user ADD CONSTRAINT FK_27C68C06296CD8AE FOREIGN KEY (team_id) REFERENCES club_team_team(id) ON DELETE CASCADE");
        $this->addSql("CREATE INDEX IDX_27C68C06296CD8AE ON club_team_team_user (team_id)");
        $this->addSql("ALTER TABLE club_team_team_user ADD PRIMARY KEY (team_id, user_id)");
    }
}