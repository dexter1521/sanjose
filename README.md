# Sistema de Gestión "Chiles San José"

## 📋 Descripción General

Sistema de gestión empresarial desarrollado para la empresa "Chiles San José". Es una aplicación web modular que maneja múltiples aspectos operativos de una empresa distribuidora de productos alimenticios.

**Fecha de análisis:** 6 de julio de 2025

## 🏗️ Arquitectura del Sistema

### Tecnologías Utilizadas
- **Backend:** PHP (sin framework)
- **Frontend:** HTML5, CSS3, JavaScript con jQuery
- **Base de datos:** MySQL
- **Generación de PDFs:** FPDF y FPDI
- **Estructura:** Modular por funcionalidades

### Configuración de Base de Datos
- **Servidor:** localhost
- **Usuario:** root
- **Password:** atmel3233
- **Base de datos:** bd_chiles_mysql

## 📁 Estructura del Proyecto

```
sanjose/
├── index.php                    # Página principal del sistema
├── estilos.css                  # Estilos globales
├── bd_chiles_mysql/             # Base de datos
│   └── bd_chiles_mysql.sql
├── busqueda_etiquetas_2/        # Módulo de etiquetas
├── facturacion/                 # Módulo de facturación
├── formatos_checklist/          # Módulo de checklists
├── inventarios_listas/          # Módulo de inventarios
├── lista_rapida/                # Lista rápida de pendientes
├── mytinytodo/                  # Sistema de tareas pendientes
├── precios_2_php/               # Precios para móvil
├── precios_3_php/               # Precios para escritorio
├── pendientes/                  # Gestión de pendientes
├── recursos_humanos/            # RRHH (acceso restringido)
├── promos/                      # Promociones
└── img/                         # Recursos gráficos
```

## 📋 Módulos del Sistema

### 1. 📊 **Módulo de Precios**
- **Ubicación:** `precios_2_php/` (móvil), `precios_3_php/` (escritorio)
- **Funcionalidad:** Consulta de productos y precios
- **Características:**
  - Búsqueda dinámica con AJAX
  - Interfaz adaptativa según dispositivo
  - Validación de entrada mínima (3 caracteres)

### 2. 📦 **Inventarios y Listas**
- **Ubicación:** `inventarios_listas/`
- **Funcionalidad:** Gestión de inventarios por proveedor
- **Características:**
  - Múltiples proveedores (Bimbo, Cadexa, Abarrotes, etc.)
  - Generación de listas de precios en PDF
  - Consultas SQL especializadas

### 3. 🏷️ **Búsqueda de Etiquetas**
- **Ubicación:** `busqueda_etiquetas_2/`
- **Funcionalidad:** Generación e impresión de etiquetas
- **Características:**
  - Búsqueda de productos
  - Generación de etiquetas en PDF
  - Logo corporativo integrado

### 4. ✅ **Formatos Checklist**
- **Ubicación:** `formatos_checklist/`
- **Funcionalidad:** Formularios de verificación
- **Características:**
  - Generación de documentos PDF
  - Plantillas predefinidas
  - Sistema de etiquetas

### 5. 💰 **Facturación**
- **Ubicación:** `facturacion/`
- **Funcionalidad:** Sistema de facturación

### 6. 👥 **Recursos Humanos**
- **Ubicación:** `recursos_humanos/`
- **Funcionalidad:** Gestión de personal
- **Restricción:** Solo accesible desde IPs específicas de la red local

### 7. 📝 **Gestión de Pendientes**
- **Ubicación:** `mytinytodo/`, `pendientes/`, `lista_rapida/`
- **Funcionalidad:** Listas de tareas y pendientes
- **Características:**
  - Sistema MyTinyTodo integrado
  - Lista rápida de pendientes
  - Gestión de empaque

## 🗄️ Base de Datos

### Tablas Principales de Inventario
La base de datos contiene múltiples tablas organizadas por proveedor:

```sql
-- Ejemplos de tablas de inventario
qry_inventario_abarrotes
qry_inventario_abarrotes_desechables
qry_inventario_altena
qry_inventario_arero
qry_inventario_bimbo
qry_inventario_bodegon
qry_inventario_boni_bodegon
qry_inventario_botanas_otros
qry_inventario_caalfrabet
qry_inventario_cadexa
qry_inventario_cafe_victoria
qry_inventario_celofan
qry_inventario_chiles_semillas
qry_inventario_deiman
qry_inventario_desechables
qry_inventario_granmark_vmfiesta
qry_inventario_ideal
qry_inventario_inix
qry_inventario_interflex
qry_inventario_lala_patrona_bimbo
qry_inventario_mabeel
```

## 🔒 Control de Acceso

### Restricción por IP
El sistema implementa control de acceso basado en direcciones IP:

```php
// IPs autorizadas para funcionalidades completas
$ips_autorizadas = [
    "192.168.1.105", "192.168.1.101", "192.168.1.102",
    "192.168.1.120", "192.168.1.106", "192.168.1.127",
    "192.168.1.136", "192.168.1.146", "192.168.1.122",
    "192.168.1.110", "192.168.1.128"
];
```

### Detección de Dispositivo
- **Móvil:** Redirige a `precios_2_php`
- **Escritorio:** Redirige a `precios_3_php`

## 🎨 Características de la Interfaz

### Responsive Design
- Adaptación automática a dispositivos móviles
- Detección de User-Agent para determinar tipo de dispositivo

### Navegación
- Botones con iconos descriptivos
- Funciones JavaScript para abrir módulos
- Interfaz intuitiva y clara

### Búsqueda
- Búsqueda dinámica con AJAX
- Validación de entrada en tiempo real
- Resultados instantáneos

## 📁 Estructura Modular Tipo

Cada módulo sigue una estructura similar:

```
modulo/
├── index.php          # Interfaz principal
├── BaseDatos.php      # Clase de conexión a BD
├── estilos.css        # Estilos específicos del módulo
├── productos.php      # Lógica de productos (si aplica)
├── javascript/        # Scripts JavaScript
├── img/              # Imágenes del módulo
├── fpdf181/          # Librería FPDF para PDFs
├── fpdi220/          # Librería FPDI (si se usa)
└── pdf/              # PDFs generados
```

## 💡 Fortalezas del Sistema

1. **✅ Modularidad:** Fácil mantenimiento y escalabilidad
2. **✅ Funcionalidad Completa:** Cubre múltiples aspectos del negocio
3. **✅ Generación de PDFs:** Para reportes e impresiones
4. **✅ Interfaz Adaptativa:** Funciona en móviles y escritorio
5. **✅ Múltiples Proveedores:** Gestión independiente por proveedor
6. **✅ Búsqueda Dinámica:** Experiencia de usuario fluida

## ⚠️ Áreas de Mejora

### 🔐 Seguridad
- **❌ Credenciales expuestas:** Password de BD en texto plano
- **❌ Validación insuficiente:** Falta sanitización de entrada
- **❌ Autenticación básica:** Solo control por IP
- **❌ Inyección SQL:** Posibles vulnerabilidades

### 🏗️ Arquitectura
- **❌ Código mezclado:** Lógica y presentación juntas
- **❌ Sin framework:** Falta estructura MVC
- **❌ Código repetitivo:** Duplicación entre módulos
- **❌ Sin manejo de errores:** Falta tratamiento de excepciones

### 🔄 Modernización
- **❌ Tecnologías obsoletas:** PHP sin framework moderno
- **❌ Sin control de versiones:** Carpetas "OLD" sugieren mal versionado
- **❌ Sin documentación:** Falta documentación técnica
- **❌ Sin tests:** No hay pruebas automatizadas

## 🎯 Funcionalidad Principal

Este sistema es el **núcleo operativo** de una empresa distribuidora de productos alimenticios que maneja:

- 📊 Consulta de precios en tiempo real
- 📦 Inventarios de múltiples proveedores
- 🏷️ Generación de etiquetas
- 💰 Proceso de facturación
- ✅ Control de calidad con checklists
- 👥 Gestión básica de recursos humanos
- 📝 Seguimiento de tareas y pendientes

## 🔧 Configuración Requerida

### Servidor Web
- Apache/Nginx con soporte PHP
- PHP 7.0+ (recomendado 8.0+)
- MySQL 5.7+ o MariaDB

### Extensiones PHP Necesarias
- mysqli
- gd (para generación de imágenes)
- mbstring

### Base de Datos
1. Importar `bd_chiles_mysql/bd_chiles_mysql.sql`
2. Configurar credenciales en archivos `BaseDatos.php`

## 📞 Soporte y Mantenimiento

### Archivos de Configuración Críticos
- `BaseDatos.php` (en cada módulo) - Conexión a BD
- `index.php` (principal) - Punto de entrada
- `estilos.css` - Estilos globales

### Respaldos
- Carpeta `OLD/` contiene versiones anteriores
- Se recomienda implementar sistema de respaldos automáticos

---

**Última actualización:** 6 de julio de 2025  
**Sistema desarrollado para:** Chiles San José  
**Tecnología principal:** PHP + MySQL + jQuery
