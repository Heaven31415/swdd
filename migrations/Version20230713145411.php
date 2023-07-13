<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230713145411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add species table without relations';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, swapi_id INT NOT NULL, name VARCHAR(255) NOT NULL, classification VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, average_height VARCHAR(255) NOT NULL, average_lifespan VARCHAR(255) NOT NULL, eye_colors VARCHAR(255) NOT NULL, hair_colors VARCHAR(255) NOT NULL, skin_colors VARCHAR(255) NOT NULL, language VARCHAR(255) NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', edited DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE species');
    }
}
