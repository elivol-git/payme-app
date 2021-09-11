

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# Sale-app
## DB setup
DB name: payme
Create table:
CREATE TABLE `sales` (
  `payme_sale_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `sale_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `payme_sale_code` int unsigned DEFAULT NULL,
  `price` int unsigned DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `sale_payment_method` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `product_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `input_price` double DEFAULT NULL,
  PRIMARY KEY (`payme_sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
