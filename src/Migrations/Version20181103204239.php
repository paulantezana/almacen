<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181103204239 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE usuario ADD empleado_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D952BE730 FOREIGN KEY (empleado_id) REFERENCES empleado (id)');
        $this->addSql('CREATE INDEX IDX_2265B05D952BE730 ON usuario (empleado_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D952BE730');
        $this->addSql('DROP INDEX IDX_2265B05D952BE730 ON usuario');
        $this->addSql('ALTER TABLE usuario DROP empleado_id');
    }
}
