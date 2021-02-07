<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206133529 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE weather_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE weather (id INT NOT NULL, city VARCHAR(50) NOT NULL, time VARCHAR(20) NOT NULL, temp DOUBLE PRECISION NOT NULL, text VARCHAR(50) NOT NULL, icon VARCHAR(100) NOT NULL, wind_kph DOUBLE PRECISION NOT NULL, wind_degree INT NOT NULL, wind_dir VARCHAR(5) NOT NULL, pressure_mb DOUBLE PRECISION NOT NULL, precip_mm DOUBLE PRECISION NOT NULL, humidity INT NOT NULL, cloud INT NOT NULL, feelslike DOUBLE PRECISION NOT NULL, vis DOUBLE PRECISION NOT NULL, uv DOUBLE PRECISION NOT NULL, gust DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE weather_id_seq CASCADE');
        $this->addSql('DROP TABLE weather');
    }
}
