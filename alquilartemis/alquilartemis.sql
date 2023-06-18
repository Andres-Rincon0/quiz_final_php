-- SQLBook: Code
CREATE DATABASE alquilartemis;
USE alquilartemis;

CREATE TABLE empleados (
    id_empleado INT(50) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre_empleados VARCHAR(100) NOT NULL,
    salario_mensual INT(30) NOT NULL,
    sexo VARCHAR(18) NOT NULL
);

CREATE TABLE constructoras (
    id_constructora INT(50) NOT NULL PRIMARY KEY,
    nombre_constructora VARCHAR(35) NOT NULL,
    direccion_constructora VARCHAR(40)
);

CREATE TABLE cotizaciones (
    id_cotizacion INT(50) NOT NULL PRIMARY KEY,
    id_empleado INT(50) NOT NULL,
    id_constructora INT(50) NOT NULL,
    fecha VARCHAR (35) NOT NULL,
    total INT(10) NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado),
    FOREIGN KEY (id_constructora) REFERENCES constructoras(id_constructora)
);

CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre_productos VARCHAR(50) NOT NULL,
    precio_dia INT(10) NOT NULL
);

CREATE TABLE clientes(
id_cliente INT PRIMARY KEY AUTO_INCREMENT,
obra_clientes VARCHAR(300),
nombre_clientes VARCHAR (30) NOT NULL,
telefono INT (10),
direccion_clientes VARCHAR(40) NOT NULL 
);

CREATE TABLE detalle_cotizaciones (
    id_detalle INT(50) PRIMARY KEY AUTO_INCREMENT,
    id_cotizacion INT(50) NOT NULL,
    id_producto INT(50) NOT NULL,
    fecha_alquiler VARCHAR(50) NOT NULL,
    duracion_alquiler INT(10) NOT NULL,
    FOREIGN KEY (id_cotizacion) REFERENCES cotizaciones(id_cotizacion),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);

CREATE TABLE salida (
    salida_id INT(50) NOT NULL PRIMARY KEY,
    id_constructora INT(50) NOT NULL,
    fecha_salida VARCHAR (35),
    hora_salida VARCHAR (35),
    subtotalPeso INT(10),
    id_empleado INT(50),
    placatransporte VARCHAR(10),
    observaciones VARCHAR(100),
    FOREIGN KEY (id_constructora) REFERENCES constructoras(id_constructora),
    FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado)
);

CREATE TABLE salida_detalle (
    salida_id INT(50) NOT NULL,
    id_producto INT(50) NOT NULL,
    obra_id INT(50),
    cantidad_salida INT(10),
    cantidad_propia INT(10),
    cantidad_subalquilada INT(10),
    valorUnidad INT(10),
    fecha_standBye VARCHAR (35),
    estado VARCHAR(20),
    valorTotal INT(10),
    id_empleado INT(50),
    PRIMARY KEY (salida_id, id_producto),
    FOREIGN KEY (salida_id) REFERENCES salida(salida_id),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto),
    FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado)
);

CREATE TABLE entrada (
    salida_id INT(50),
    entrada_id INT(50) NOT NULL,
    id_empleado INT(50) NOT NULL,
    id_constructora INT(50) NOT NULL,
    fecha_entrada VARCHAR (35),
    hora_entrada VARCHAR (35),
    observaciones VARCHAR(100),
    PRIMARY KEY (salida_id, entrada_id),
    FOREIGN KEY (salida_id) REFERENCES salida(salida_id),
    FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado),
    FOREIGN KEY (id_constructora) REFERENCES constructoras(id_constructora)
);

CREATE TABLE entrada_detalle (
    id_entrada_detalle INT  AUTO_INCREMENT PRIMARY KEY,
    entrada_id INT(50) NOT NULL,
    id_producto INT(50) NOT NULL,
    obra_id INT(50) NOT NULL,
    entrada_cantidad INT(10) NOT NULL,
    entrada_cantidad_propia INT(10) NOT NULL,
    FOREIGN KEY (entrada_id) REFERENCES entrada(salida_id),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto),
    FOREIGN KEY (obra_id) REFERENCES clientes(id_cliente)
);

CREATE TABLE inventarios(
    id_inventario INT PRIMARY KEY AUTO_INCREMENT,
    id_producto INT, 
    cantidad_inicial INT, 
    cantidad_ingreso INT,
    canridad_salida INT,
    cantidad_final INT,
    fecha_inventario VARCHAR (35) NOT NULL,
    tipo_operacion VARCHAR(100) NOT NULL,
    Foreign Key (id_producto) REFERENCES productos (id_producto)    

)