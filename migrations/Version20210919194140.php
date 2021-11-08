<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210919194140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse_image (adresse_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_AA7D75694DE7DC5C (adresse_id), INDEX IDX_AA7D75693DA5256D (image_id), PRIMARY KEY(adresse_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise_service (entreprise_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_59792961A4AEAFEA (entreprise_id), INDEX IDX_59792961ED5CA9E6 (service_id), PRIMARY KEY(entreprise_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise_domaine (entreprise_id INT NOT NULL, domaine_id INT NOT NULL, INDEX IDX_C04BB97FA4AEAFEA (entreprise_id), INDEX IDX_C04BB97F4272FC9F (domaine_id), PRIMARY KEY(entreprise_id, domaine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plage_horaire_adresse (plage_horaire_id INT NOT NULL, adresse_id INT NOT NULL, INDEX IDX_CDCDEAD6B6BCB98B (plage_horaire_id), INDEX IDX_CDCDEAD64DE7DC5C (adresse_id), PRIMARY KEY(plage_horaire_id, adresse_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_adresse (service_id INT NOT NULL, adresse_id INT NOT NULL, INDEX IDX_CDB5A8AED5CA9E6 (service_id), INDEX IDX_CDB5A8A4DE7DC5C (adresse_id), PRIMARY KEY(service_id, adresse_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite_adresse (specialite_id INT NOT NULL, adresse_id INT NOT NULL, INDEX IDX_FC561A922195E0F0 (specialite_id), INDEX IDX_FC561A924DE7DC5C (adresse_id), PRIMARY KEY(specialite_id, adresse_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_specialite (user_id INT NOT NULL, specialite_id INT NOT NULL, INDEX IDX_40B13A2DA76ED395 (user_id), INDEX IDX_40B13A2D2195E0F0 (specialite_id), PRIMARY KEY(user_id, specialite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse_image ADD CONSTRAINT FK_AA7D75694DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adresse_image ADD CONSTRAINT FK_AA7D75693DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise_service ADD CONSTRAINT FK_59792961A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise_service ADD CONSTRAINT FK_59792961ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise_domaine ADD CONSTRAINT FK_C04BB97FA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise_domaine ADD CONSTRAINT FK_C04BB97F4272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plage_horaire_adresse ADD CONSTRAINT FK_CDCDEAD6B6BCB98B FOREIGN KEY (plage_horaire_id) REFERENCES plage_horaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plage_horaire_adresse ADD CONSTRAINT FK_CDCDEAD64DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_adresse ADD CONSTRAINT FK_CDB5A8AED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_adresse ADD CONSTRAINT FK_CDB5A8A4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_adresse ADD CONSTRAINT FK_FC561A922195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_adresse ADD CONSTRAINT FK_FC561A924DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_specialite ADD CONSTRAINT FK_40B13A2DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_specialite ADD CONSTRAINT FK_40B13A2D2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adresse ADD entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C35F0816A4AEAFEA ON adresse (entreprise_id)');
        $this->addSql('ALTER TABLE booking ADD user_booking_id INT DEFAULT NULL, ADD plage_horaire_id INT DEFAULT NULL, ADD adresse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEA457DA8C FOREIGN KEY (user_booking_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEB6BCB98B FOREIGN KEY (plage_horaire_id) REFERENCES plage_horaire (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDEA457DA8C ON booking (user_booking_id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDEB6BCB98B ON booking (plage_horaire_id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDE4DE7DC5C ON booking (adresse_id)');
        $this->addSql('ALTER TABLE entreprise ADD plage_horaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60B6BCB98B FOREIGN KEY (plage_horaire_id) REFERENCES plage_horaire (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA60B6BCB98B ON entreprise (plage_horaire_id)');
        $this->addSql('ALTER TABLE image ADD entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FA4AEAFEA ON image (entreprise_id)');
        $this->addSql('ALTER TABLE service ADD booking_id INT DEFAULT NULL, ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD23301C60 FOREIGN KEY (booking_id) REFERENCES booking (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD23DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD23301C60 ON service (booking_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E19D9AD23DA5256D ON service (image_id)');
        $this->addSql('ALTER TABLE user ADD role_id INT DEFAULT NULL, ADD company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649979B1AD6 FOREIGN KEY (company_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D60322AC ON user (role_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649979B1AD6 ON user (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adresse_image');
        $this->addSql('DROP TABLE entreprise_service');
        $this->addSql('DROP TABLE entreprise_domaine');
        $this->addSql('DROP TABLE plage_horaire_adresse');
        $this->addSql('DROP TABLE service_adresse');
        $this->addSql('DROP TABLE specialite_adresse');
        $this->addSql('DROP TABLE user_specialite');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816A4AEAFEA');
        $this->addSql('DROP INDEX IDX_C35F0816A4AEAFEA ON adresse');
        $this->addSql('ALTER TABLE adresse DROP entreprise_id');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEA457DA8C');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEB6BCB98B');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE4DE7DC5C');
        $this->addSql('DROP INDEX IDX_E00CEDDEA457DA8C ON booking');
        $this->addSql('DROP INDEX IDX_E00CEDDEB6BCB98B ON booking');
        $this->addSql('DROP INDEX IDX_E00CEDDE4DE7DC5C ON booking');
        $this->addSql('ALTER TABLE booking DROP user_booking_id, DROP plage_horaire_id, DROP adresse_id');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60B6BCB98B');
        $this->addSql('DROP INDEX UNIQ_D19FA60B6BCB98B ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP plage_horaire_id');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FA4AEAFEA');
        $this->addSql('DROP INDEX IDX_C53D045FA4AEAFEA ON image');
        $this->addSql('ALTER TABLE image DROP entreprise_id');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD23301C60');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD23DA5256D');
        $this->addSql('DROP INDEX IDX_E19D9AD23301C60 ON service');
        $this->addSql('DROP INDEX UNIQ_E19D9AD23DA5256D ON service');
        $this->addSql('ALTER TABLE service DROP booking_id, DROP image_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649979B1AD6');
        $this->addSql('DROP INDEX IDX_8D93D649D60322AC ON user');
        $this->addSql('DROP INDEX IDX_8D93D649979B1AD6 ON user');
        $this->addSql('ALTER TABLE user DROP role_id, DROP company_id');
    }
}
