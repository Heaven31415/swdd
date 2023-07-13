<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230713112543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add planets table without relations';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE planets (id INT AUTO_INCREMENT NOT NULL, swapi_id INT NOT NULL, name VARCHAR(255) NOT NULL, diameter VARCHAR(255) NOT NULL, rotation_period VARCHAR(255) NOT NULL, orbital_period VARCHAR(255) NOT NULL, gravity VARCHAR(255) NOT NULL, population VARCHAR(255) NOT NULL, climate VARCHAR(255) NOT NULL, terrain VARCHAR(255) NOT NULL, surface_water VARCHAR(255) NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', edited DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE planets');
    }
}
