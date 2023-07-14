<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230714134438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add one-to-many relation between planets and people';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE people ADD homeworld_id INT NOT NULL');
        $this->addSql(
            'ALTER TABLE people ADD CONSTRAINT FK_28166A26484D1B39 FOREIGN KEY (homeworld_id) REFERENCES planets (id)'
        );
        $this->addSql('CREATE INDEX IDX_28166A26484D1B39 ON people (homeworld_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE people DROP FOREIGN KEY FK_28166A26484D1B39');
        $this->addSql('DROP INDEX IDX_28166A26484D1B39 ON people');
        $this->addSql('ALTER TABLE people DROP homeworld_id');
    }
}
