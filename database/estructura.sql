-- Crear la Base de Datos
CREATE DATABASE IF NOT EXISTS tienda_marketing;
USE tienda_marketing;

-- Crear tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255) NOT NULL
);

-- Crear tabla de pedidos
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    nombre_cliente VARCHAR(100),
    email_cliente VARCHAR(100),
    fecha_pago TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- Insertar datos de prueba para marketing
INSERT INTO productos (nombre, precio, imagen) VALUES 
('Auditoría SEO Pro', 150.00, 'https://images.unsplash.com/photo-1572021335469-31706a17aaef?q=80&w=500'),
('Ads Campaign Management', 299.00, 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=500'),
('Design Thinking Workshop', 450.00, 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=500');