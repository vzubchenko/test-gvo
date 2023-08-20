<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820175014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE product (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(255) NOT NULL,
            price INT NOT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('CREATE TABLE order_items (
            id INT AUTO_INCREMENT NOT NULL,
            product_id INT NOT NULL,
            amount INT NOT NULL,
            PRIMARY KEY(id),
            CONSTRAINT FK_PRODUCT_ORDER FOREIGN KEY (product_id) REFERENCES product(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');


        // Вставка начальных данных с использованием SQL-запросов
        $this->addSql('INSERT INTO product (name, price) VALUES (\'product1\', 10)');
        $this->addSql('INSERT INTO `order_items` (product_id, amount) VALUES (1, 2)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `order_items`');
        $this->addSql('DROP TABLE product');
    }
}
