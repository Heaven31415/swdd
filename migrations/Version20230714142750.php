<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230714142750 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add many-to-many relation between vehicles and people';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE person_vehicle (person_id INT NOT NULL, vehicle_id INT NOT NULL, INDEX IDX_391E570F217BBB47 (person_id), INDEX IDX_391E570F545317D1 (vehicle_id), PRIMARY KEY(person_id, vehicle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE person_vehicle ADD CONSTRAINT FK_391E570F217BBB47 FOREIGN KEY (person_id) REFERENCES people (id) ON DELETE CASCADE'
        );
        $this->addSql(
            'ALTER TABLE person_vehicle ADD CONSTRAINT FK_391E570F545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicles (id) ON DELETE CASCADE'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE person_vehicle DROP FOREIGN KEY FK_391E570F217BBB47');
        $this->addSql('ALTER TABLE person_vehicle DROP FOREIGN KEY FK_391E570F545317D1');
        $this->addSql('DROP TABLE person_vehicle');
    }
}
