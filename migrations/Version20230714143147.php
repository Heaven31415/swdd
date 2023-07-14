<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230714143147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add many-to-many relation between starships and people';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE person_starship (person_id INT NOT NULL, starship_id INT NOT NULL, INDEX IDX_5052437D217BBB47 (person_id), INDEX IDX_5052437D9B24DF5 (starship_id), PRIMARY KEY(person_id, starship_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE person_starship ADD CONSTRAINT FK_5052437D217BBB47 FOREIGN KEY (person_id) REFERENCES people (id) ON DELETE CASCADE'
        );
        $this->addSql(
            'ALTER TABLE person_starship ADD CONSTRAINT FK_5052437D9B24DF5 FOREIGN KEY (starship_id) REFERENCES starships (id) ON DELETE CASCADE'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE person_starship DROP FOREIGN KEY FK_5052437D217BBB47');
        $this->addSql('ALTER TABLE person_starship DROP FOREIGN KEY FK_5052437D9B24DF5');
        $this->addSql('DROP TABLE person_starship');
    }
}
