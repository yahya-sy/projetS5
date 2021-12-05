<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205002517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD image_name VARCHAR(255) NOT NULL, ADD file LONGBLOB NOT NULL');
        $this->addSql('ALTER TABLE reponseoffre DROP FOREIGN KEY FK_CEC8BF37E61D1857');
        $this->addSql('DROP INDEX IDX_CEC8BF37E61D1857 ON reponseoffre');
        $this->addSql('ALTER TABLE reponseoffre ADD texte LONGTEXT NOT NULL, DROP idoffre_id, DROP nom, DROP prenom, DROP email, DROP competences');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP image_name, DROP file');
        $this->addSql('ALTER TABLE reponseoffre ADD idoffre_id INT DEFAULT NULL, ADD nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD competences VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP texte');
        $this->addSql('ALTER TABLE reponseoffre ADD CONSTRAINT FK_CEC8BF37E61D1857 FOREIGN KEY (idoffre_id) REFERENCES offreemploi (id)');
        $this->addSql('CREATE INDEX IDX_CEC8BF37E61D1857 ON reponseoffre (idoffre_id)');
    }
}
