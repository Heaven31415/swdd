<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230713105406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add people table without relations';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE people (id INT AUTO_INCREMENT NOT NULL, swapi_id INT NOT NULL, name VARCHAR(255) NOT NULL, birth_year VARCHAR(255) NOT NULL, eye_color VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, hair_color VARCHAR(255) NOT NULL, height VARCHAR(255) NOT NULL, mass VARCHAR(255) NOT NULL, skin_color VARCHAR(255) NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', edited DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE people');
    }
}
