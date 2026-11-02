# site-edisonfernandez

## Propósito

Este proyecto tiene una finalidad **educativa y de aprendizaje**. Su objetivo es practicar y reforzar conceptos de desarrollo web mediante la construcción de un sitio desde cero.

## Tecnologías

- **PHP**: lenguaje de programación para la lógica del lado del servidor.
- **HTML**: estructura del contenido de las páginas.
- **CSS**: diseño y estilos visuales del sitio.
- **Bootstrap**: framework de diseño para optimizar el tiempo de maquetado y mantener consistencia visual.

## Estructura del proyecto

```
site-edisonfernandez/
├── index.php            # Página principal
├── includes/
│   ├── header.php       # Navbar (Bootstrap)
│   └── footer.php       # Pie de página
├── css/
│   └── style.css        # Estilos propios
└── README.md
```

## Requisitos previos

- Un stack con Apache + PHP instalado: [XAMPP](https://www.apachefriends.org/) (Windows/Linux) o [MAMP](https://www.mamp.info/) (macOS). WAMP también funciona en Windows.
- No se requiere base de datos ni dependencias adicionales, Bootstrap se carga vía CDN.

## Cómo ejecutar el proyecto en local (XAMPP / WAMP / MAMP)

Estos servidores solo sirven archivos ubicados dentro de su carpeta pública (`htdocs` en XAMPP/WAMP, `htdocs` dentro de `/Applications/MAMP/htdocs` en MAMP). Por eso el proyecto debe clonarse o copiarse ahí, no en cualquier otra carpeta.

1. Ubica la carpeta `htdocs` de tu instalación:

   - **XAMPP (Windows)**: `C:\xampp\htdocs`
   - **XAMPP (Linux)**: `/opt/lampp/htdocs`
   - **MAMP (macOS)**: `/Applications/MAMP/htdocs`
   - **WAMP (Windows)**: `C:\wamp64\www`

2. Clona el repositorio directamente dentro de esa carpeta:

   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/AXEL1988/site-edisonfernandez.git
   ```

   (Si ya lo tienes descargado en otro lugar, simplemente mueve o copia la carpeta `site-edisonfernandez` dentro de `htdocs`.)

3. Abre el panel de control de XAMPP/WAMP/MAMP y arranca los servicios **Apache** (MySQL no es necesario para este proyecto).

4. Abre tu navegador en:

   ```
   http://localhost/site-edisonfernandez
   ```

   > **Nota MAMP**: por defecto usa el puerto `8888` en lugar del `80`, así que la URL sería `http://localhost:8888/site-edisonfernandez/`. Puedes confirmar el puerto en el panel de MAMP, pestaña "Ports" o "Preferences".

### Alternativa: servidor embebido de PHP

Si solo tienes PHP instalado (sin Apache), puedes levantar el sitio sin usar `htdocs`:

```bash
cd site-edisonfernandez
php -S localhost:8000
```

Y abrir `http://localhost:8000` en el navegador.

## Estado

Proyecto en desarrollo inicial, documentado como parte de este repositorio.
