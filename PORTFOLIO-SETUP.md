# 🎨 Portfolio 2026 - Setup Completo

## ✅ Lo que se ha creado

### 1. 📦 Custom Post Types (CPTs)
Creados en: `inc/setup/post-types.php`

- **Skills** (`skill`) - Para tus habilidades técnicas
- **Experience** (`experience`) - Para tu experiencia laboral
- **Projects** (`project`) - Para tus proyectos personales

### 2. 📄 Templates Creados

#### Front Page Template
- **Archivo:** `front-page.php`
- **Descripción:** Página principal del portafolio con sistema de tabs estilo "folder"
- **Secciones:**
  - Hero Section (pantalla completa con tu nombre y summary)
  - Sistema de tabs con Alpine.js para navegación suave

#### Template Parts (en `/template-parts/portfolio/`)
- **about-me.php** - Tab de About Me (texto + galería de fotos)
- **skills.php** - Tab de Skills (grid de tarjetas con iconos y niveles)
- **experience.php** - Tab de Experience (línea temporal vertical alternada)
- **projects.php** - Tab de Projects (grid de proyectos)

#### Single Project Template
- **Archivo:** `single-project.php`
- **Descripción:** Página individual de cada proyecto tipo "news article"
- **Incluye:**
  - Hero con información del proyecto
  - Descripción completa
  - Galería de imágenes
  - Tecnologías utilizadas
  - Features/Características
  - Links a demo y GitHub

### 3. 🎨 Diseño Visual

#### Estilo Folder/Dossier
- Tabs con borde superior en color (estilo carpetas)
- Fondo de contenido tipo papel (blanco con sombra)
- Transiciones suaves entre tabs con Alpine.js

#### Hero Section
- Fondo degradado oscuro con patrón sutil
- Foto de perfil circular con borde
- Animaciones de entrada
- Scroll indicator animado

#### Timeline Vertical (Experience)
- Línea central con degradado de color
- Cards alternadas izquierda/derecha
- Puntos indicadores en la línea
- Responsive: se convierte en timeline lateral en móvil

#### Projects Grid
- Cards con hover effects
- Status badges (Active/Completed/In Progress)
- Imágenes con zoom en hover
- Links a demo y GitHub

### 4. 📋 Guía ACF
- **Archivo:** `ACF-FIELDS-GUIDE.md`
- **Contenido:** Instrucciones detalladas para crear todos los campos ACF necesarios

---

## 🚀 Pasos para Configurar

### Paso 1: Verificar que ACF Pro esté activo
```
Dashboard → Plugins → Advanced Custom Fields Pro
```

### Paso 2: Crear los ACF Field Groups

#### A) Theme Settings (Options Page)
1. Ve a **Custom Fields → Add New**
2. Nombre del grupo: "Hero Settings"
3. Añade estos campos:
   - `hero_name` (Text)
   - `hero_title` (Text)
   - `hero_summary` (Textarea)
   - `hero_cta_text` (Text)
   - `hero_profile_image` (Image)
4. Location: `Options Page is equal to Theme Settings`
5. Guarda

#### B) Crear grupo "About Me Settings"
1. Custom Fields → Add New
2. Nombre: "About Me Settings"
3. Campos:
   - `about_me_text` (WYSIWYG)
   - `about_me_photos` (Gallery)
4. Location: `Options Page is equal to Theme Settings`

#### C) Skill Fields
1. Custom Fields → Add New
2. Nombre: "Skill Details"
3. Campos:
   - `skill_level` (Number, min: 1, max: 100)
   - `skill_category` (Text)
   - `skill_icon` (Image)
4. Location: `Post Type is equal to Skill`

#### D) Experience Fields
1. Custom Fields → Add New
2. Nombre: "Experience Details"
3. Campos:
   - `company_name` (Text)
   - `job_title` (Text)
   - `start_date` (Date Picker)
   - `end_date` (Text)
   - `location` (Text)
   - `company_logo` (Image)
   - `technologies` (Select, Multiple)
4. Location: `Post Type is equal to Experience`

#### E) Project Fields
1. Custom Fields → Add New
2. Nombre: "Project Details"
3. Campos:
   - `project_url` (URL)
   - `github_url` (URL)
   - `project_status` (Select: Active/Completed/In Progress)
   - `technologies_used` (Select, Multiple)
   - `project_start_date` (Date Picker)
   - `project_end_date` (Date Picker)
   - `project_gallery` (Gallery)
   - `project_features` (Repeater con sub-fields: feature_title, feature_description)
4. Location: `Post Type is equal to Project`

### Paso 3: Configurar Theme Settings
```
Dashboard → Theme Settings
```
- Completa todos los campos del Hero
- Añade tu texto About Me
- Sube tus fotos a la galería

### Paso 4: Añadir Contenido

#### Skills (al menos 5-8)
```
Dashboard → Skills → Add New
```
Ejemplo:
- Title: React
- Skill Level: 90
- Category: Frontend
- Icon: (logo de React)

#### Experience (al menos 2-3)
```
Dashboard → Experience → Add New
```
Ejemplo:
- Title: Senior Developer
- Company: Tech Corp
- Dates: 2022-01 → Present
- Technologies: React, Node.js, AWS

#### Projects (al menos 3-5)
```
Dashboard → Projects → Add New
```
Ejemplo:
- Title: E-commerce Platform
- Featured Image: Screenshot
- Status: Completed
- URLs: Demo + GitHub

### Paso 5: Configurar Página de Inicio
```
Settings → Reading
```
- "Your homepage displays": A static page
- Homepage: Selecciona una página (créala si no existe) o déjala vacía para que use front-page.php automáticamente

---

## 🎯 Estructura de la Página

```
┌─────────────────────────────────────────┐
│         HERO SECTION (Fullscreen)       │
│  - Foto de perfil                       │
│  - Nombre                               │
│  - Título                               │
│  - Summary                              │
│  - Botón CTA                            │
└─────────────────────────────────────────┘
              ↓ (Scroll)
┌─────────────────────────────────────────┐
│         TAB NAVIGATION (Folder Style)   │
│  [📋 About] [⭐ Skills] [💼 Exp] [🚀 Proj] │
├─────────────────────────────────────────┤
│                                         │
│         CONTENIDO DEL TAB ACTIVO        │
│                                         │
│  • About: Texto + Fotos                 │
│  • Skills: Grid de cards               │
│  • Experience: Timeline vertical        │
│  • Projects: Grid de proyectos         │
│                                         │
└─────────────────────────────────────────┘
```

---

## 💡 Tips y Recomendaciones

### Imágenes Recomendadas
- **Hero Profile:** 500x500px (cuadrada)
- **About Me Photos:** 800x600px
- **Skill Icons:** 128x128px (PNG con fondo transparente)
- **Company Logos:** 200x80px
- **Project Thumbnails:** 1200x800px
- **Project Gallery:** 1600x1200px

### Contenido Sugerido

#### About Me (2-3 párrafos)
- Quién eres
- Qué te apasiona
- Tus objetivos profesionales
- Hobbies/intereses

#### Skills (Categorías sugeridas)
- **Frontend:** React, Vue, Tailwind, etc.
- **Backend:** PHP, Node.js, Laravel, etc.
- **Database:** MySQL, MongoDB, etc.
- **Tools:** Git, Docker, AWS, etc.

#### Experience
- Usa bullet points en la descripción
- Enfócate en logros, no solo en tareas
- Incluye métricas si es posible (ej: "Aumenté performance en 40%")

#### Projects
- Incluye al menos 1 screenshot de calidad
- Describe el problema que resuelve
- Menciona tu rol específico
- Si es posible, añade demo en vivo

---

## 🔧 Personalización

### Cambiar Colores
Los colores principales están en Tailwind (prefijo `mk-`):
- Azul: `mk-bg-blue-600`
- Gris: `mk-bg-gray-900`
- etc.

### Cambiar Emojis de los Tabs
En `front-page.php`, líneas 75-95:
```php
📋 About Me   → Cambia el emoji
⭐ Skills     → Cambia el emoji
💼 Experience → Cambia el emoji
🚀 Projects   → Cambia el emoji
```

### Añadir más Tabs
1. Añade botón en la navegación
2. Crea template part en `/template-parts/portfolio/`
3. Añade el panel de contenido

---

## 📱 Responsive Design

El diseño es completamente responsive:
- **Desktop:** Timeline alternada, grid 3 columnas
- **Tablet:** Grid 2 columnas, timeline alternada
- **Mobile:** Grid 1 columna, timeline lateral

---

## ✅ Checklist de Lanzamiento

- [ ] ACF Fields creados y configurados
- [ ] Theme Settings completado
- [ ] Al menos 5 Skills añadidas
- [ ] Al menos 2 Experiencias añadidas
- [ ] Al menos 3 Proyectos añadidos
- [ ] Todas las imágenes optimizadas
- [ ] Probado en móvil, tablet y desktop
- [ ] Links verificados (GitHub, demos)
- [ ] Textos revisados sin errores
- [ ] Permalinks configurados (Settings → Permalinks → Post name)

---

## 🚨 Troubleshooting

### Los tabs no funcionan
→ Verifica que Alpine.js se está cargando (está en `inc/setup/enqueue.php`)

### Las imágenes no se muestran
→ Verifica que ACF Pro esté activo y los campos estén creados

### El timeline se ve raro
→ Revisa que las fechas estén en formato correcto (Y-m-d)

### 404 en proyectos
→ Ve a Settings → Permalinks y haz clic en "Save Changes"

---

## 🎉 ¡Listo!

Tu portafolio ahora está configurado y listo para buscar trabajo. Solo necesitas:
1. Crear los ACF Fields (15-20 minutos)
2. Completar Theme Settings (5 minutos)
3. Añadir tu contenido (1-2 horas)

**Buena suerte en tu búsqueda de trabajo! 🚀**
