<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230714132609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add starships table without relations';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE starships (id INT AUTO_INCREMENT NOT NULL, swapi_id INT NOT NULL, name VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, starship_class VARCHAR(255) NOT NULL, manufacturer VARCHAR(255) NOT NULL, cost_in_credits VARCHAR(255) NOT NULL, length VARCHAR(255) NOT NULL, crew VARCHAR(255) NOT NULL, passengers VARCHAR(255) NOT NULL, max_atmosphering_speed VARCHAR(255) NOT NULL, hyperdrive_rating VARCHAR(255) NOT NULL, mglt VARCHAR(255) NOT NULL, cargo_capacity VARCHAR(255) NOT NULL, consumables VARCHAR(255) NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', edited DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE starships');
    }
}
