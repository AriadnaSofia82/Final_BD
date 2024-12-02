CREATE DATABASE restaurant;
GO

USE restaurant;
GO

CREATE TABLE dishes (
    id INT IDENTITY(1,1) PRIMARY KEY,
    nombre NVARCHAR(50),
    description NVARCHAR(100),
    precio DECIMAL(10, 2),
    descuento INT,
    imagen NVARCHAR(50)
);
GO

INSERT INTO dishes (nombre, description, precio, descuento, imagen)
VALUES
('lomo saltado', 'arroz y lomo', 80.00, 20, 'avatar-6733df5bd7f88.jpg'),
('arroz con pollo', 'pollito con arrizito', 20.00, 20, 'avatar-6733e8d013551.jpg'),
('Frijoles', 'el favorito de mamá', 30.00, 20, 'avatar-6733e928343c4.jpg'),
('locro', 'todos los odian pero yo lo amo', 40.00, 20, 'avatar-6733e94594d3e.jpg'),
('pollo a la brasa', 'el favorito de todos', 70.00, 15, 'avatar-6733e97058c3c.jpg');
GO
