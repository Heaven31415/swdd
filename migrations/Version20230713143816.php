<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230713143816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add films table without relations';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, swapi_id INT NOT NULL, title VARCHAR(255) NOT NULL, episode_id INT NOT NULL, opening_crawl LONGTEXT NOT NULL, director VARCHAR(255) NOT NULL, producer VARCHAR(255) NOT NULL, release_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', edited DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE films');
    }
}
