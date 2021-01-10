<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110135539 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE red_pizza ADD section_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE red_pizza ADD CONSTRAINT FK_2B89F684D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_2B89F684D823E37A ON red_pizza (section_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE red_pizza DROP FOREIGN KEY FK_2B89F684D823E37A');
        $this->addSql('DROP INDEX IDX_2B89F684D823E37A ON red_pizza');
        $this->addSql('ALTER TABLE red_pizza DROP section_id');
    }
}
