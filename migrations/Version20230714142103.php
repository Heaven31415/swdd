<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230714142103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add many-to-many relation between species and people';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE person_species (person_id INT NOT NULL, species_id INT NOT NULL, INDEX IDX_8791449B217BBB47 (person_id), INDEX IDX_8791449BB2A1D860 (species_id), PRIMARY KEY(person_id, species_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE person_species ADD CONSTRAINT FK_8791449B217BBB47 FOREIGN KEY (person_id) REFERENCES people (id) ON DELETE CASCADE'
        );
        $this->addSql(
            'ALTER TABLE person_species ADD CONSTRAINT FK_8791449BB2A1D860 FOREIGN KEY (species_id) REFERENCES species (id) ON DELETE CASCADE'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE person_species DROP FOREIGN KEY FK_8791449B217BBB47');
        $this->addSql('ALTER TABLE person_species DROP FOREIGN KEY FK_8791449BB2A1D860');
        $this->addSql('DROP TABLE person_species');
    }
}
