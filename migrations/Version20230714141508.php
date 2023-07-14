<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230714141508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add many-to-many relation between films and people';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE person_film (person_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_8A23A09217BBB47 (person_id), INDEX IDX_8A23A09567F5183 (film_id), PRIMARY KEY(person_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE person_film ADD CONSTRAINT FK_8A23A09217BBB47 FOREIGN KEY (person_id) REFERENCES people (id) ON DELETE CASCADE'
        );
        $this->addSql(
            'ALTER TABLE person_film ADD CONSTRAINT FK_8A23A09567F5183 FOREIGN KEY (film_id) REFERENCES films (id) ON DELETE CASCADE'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE person_film DROP FOREIGN KEY FK_8A23A09217BBB47');
        $this->addSql('ALTER TABLE person_film DROP FOREIGN KEY FK_8A23A09567F5183');
        $this->addSql('DROP TABLE person_film');
    }
}
