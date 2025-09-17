CREATE DATABASE IF NOT EXISTS farm_management_system;
CREATE USER IF NOT EXISTS 'farm_user'@'localhost' IDENTIFIED BY 'farm_password';
GRANT ALL PRIVILEGES ON farm_management_system.* TO 'farm_user'@'localhost';
FLUSH PRIVILEGES;
USE farm_management_system;
SELECT 'Database setup complete!' as status;