# ACF Fields Configuration Guide - Portfolio 2026

Este documento detalla todos los campos ACF (Advanced Custom Fields) que necesitas crear para que el portafolio funcione correctamente.

## 📋 Tabla de Contenidos
1. [Theme Settings (Options Page)](#theme-settings-options-page)
2. [Skills CPT Fields](#skills-cpt-fields)
3. [Experience CPT Fields](#experience-cpt-fields)
4. [Projects CPT Fields](#projects-cpt-fields)

---

## 1. Theme Settings (Options Page)

**Ubicación:** Options Page (ya configurada en `inc/setup/acf.php`)
**Slug:** `theme-general-settings`

### Hero Section Fields

| Field Label | Field Name | Field Type | Required | Instrucciones |
|------------|------------|------------|----------|---------------|
| Hero Name | `hero_name` | Text | No | Tu nombre completo (ej: "Julian C Dev") |
| Hero Title | `hero_title` | Text | No | Tu título profesional (ej: "Full Stack Developer") |
| Hero Summary | `hero_summary` | Textarea | No | Resumen breve de quién eres (2-3 líneas) |
| Hero Location | `hero_location` | Text | No | Tu ubicación (ej: "Based in Spain") |
| Resume URL | `resume_url` | URL | No | Link a tu CV/Resume en PDF |
| Social Links | `social_links` | Repeater | No | Enlaces a redes sociales |

**Sub-fields del Repeater "Social Links":**
- Platform (`platform`) - Text - Nombre de la plataforma (ej: "GitHub", "LinkedIn")
- URL (`url`) - URL - Link a tu perfil

### About Me Section Fields

| Field Label | Field Name | Field Type | Required | Instrucciones |
|------------|------------|------------|----------|---------------|
| About Me Text | `about_me_text` | WYSIWYG Editor | No | Descripción completa sobre ti (acepta HTML) |
| About Me Photos | `about_me_photos` | Gallery | No | Galería de fotos (mínimo 2-4 imágenes) |

---

## 2. Skills CPT Fields

**Se aplica a:** Custom Post Type "Skill"
**Ubicación:** Edit Skill

### Fields Group: Skill Details

| Field Label | Field Name | Field Type | Required | Instrucciones |
|------------|------------|------------|----------|---------------|
| Skill Level | `skill_level` | Number | Sí | Nivel de habilidad de 1 a 100 (ej: 85) |
| Skill Category | `skill_category` | Text | No | Categoría (ej: "Frontend", "Backend", "Tools") |
| Skill Icon | `skill_icon` | Image | No | Icono o logo de la tecnología (recomendado: 128x128px) |

**Nota:** El título del post es el nombre de la skill (ej: "React", "PHP", "Docker")
**Nota:** El excerpt del post puede usarse para una descripción corta

---

## 3. Experience CPT Fields

**Se aplica a:** Custom Post Type "Experience"
**Ubicación:** Edit Experience

### Fields Group: Experience Details

| Field Label | Field Name | Field Type | Required | Instrucciones |
|------------|------------|------------|----------|---------------|
| Company Name | `company_name` | Text | Sí | Nombre de la empresa |
| Job Title | `job_title` | Text | Sí | Tu puesto/título en la empresa |
| Start Date | `start_date` | Date Picker | Sí | Fecha de inicio (formato: Y-m-d) |
| End Date | `end_date` | Text | No | Fecha de fin o escribe "Present" |
| Location | `location` | Text | No | Ubicación (ej: "Madrid, Spain" o "Remote") |
| Company Logo | `company_logo` | Image | No | Logo de la empresa (recomendado: 200x80px) |
| Technologies | `technologies` | Select (Multiple) o Text | No | Tecnologías usadas (separadas por comas si es texto) |

**Nota:** El content del post debe contener la descripción de tus responsabilidades y logros

**Configuración del Select Field "Technologies" (si usas Select):**
- Tipo: Select
- Allow Multiple Values: Yes
- Choices (ejemplo):
```
JavaScript
TypeScript
React
Vue
PHP
WordPress
Laravel
MySQL
Docker
AWS
```

---

## 4. Projects CPT Fields

**Se aplica a:** Custom Post Type "Project"
**Ubicación:** Edit Project

### Fields Group: Project Details

| Field Label | Field Name | Field Type | Required | Instrucciones |
|------------|------------|------------|----------|---------------|
| Project URL | `project_url` | URL | No | URL del proyecto en vivo |
| GitHub URL | `github_url` | URL | No | URL del repositorio en GitHub |
| Project Status | `project_status` | Select | No | Estado actual del proyecto |
| Technologies Used | `technologies_used` | Select (Multiple) | No | Tecnologías utilizadas |
| Project Start Date | `project_start_date` | Date Picker | No | Fecha de inicio del proyecto |
| Project End Date | `project_end_date` | Date Picker | No | Fecha de finalización |
| Project Gallery | `project_gallery` | Gallery | No | Galería de imágenes del proyecto |

**Configuración del Select Field "Project Status":**
- Tipo: Select
- Choices:
```
Active : Active
Completed : Completed
In Progress : In Progress
```

**Configuración del Select Field "Technologies Used":**
- Tipo: Select
- Allow Multiple Values: Yes
- Choices (personaliza según tus necesidades):
```
HTML
CSS
JavaScript
TypeScript
React
Next.js
Vue
Angular
PHP
WordPress
Laravel
Node.js
Express
MySQL
PostgreSQL
MongoDB
Tailwind CSS
Bootstrap
Git
Docker
AWS
```

### Fields Group: Project Features (Repeater)

| Field Label | Field Name | Field Type | Required | Instrucciones |
|------------|------------|------------|----------|---------------|
| Project Features | `project_features` | Repeater | No | Lista de características principales |

**Sub-fields del Repeater:**
- Feature Title (`feature_title`) - Text - Título de la característica
- Feature Description (`feature_description`) - Textarea - Descripción breve

**Nota:**
- El título del post es el nombre del proyecto
- El excerpt es la descripción corta que aparece en el grid
- El content es la descripción completa del proyecto
- Featured Image es la imagen principal del proyecto

---

## 🎯 Orden de Configuración Recomendado

1. **Primero:** Configura Theme Settings (Hero y About Me)
2. **Segundo:** Crea algunos Skills
3. **Tercero:** Añade tu Experience
4. **Cuarto:** Agrega tus Projects

## 📝 Notas Importantes

### Para crear estos campos en ACF:

1. Ve a **Custom Fields → Add New**
2. Dale un nombre al grupo (ej: "Hero Settings")
3. Añade los campos según las tablas anteriores
4. En **Location Rules**, configura dónde aparecerán:
   - Para Theme Settings: `Options Page is equal to Theme Settings`
   - Para Skills: `Post Type is equal to Skill`
   - Para Experience: `Post Type is equal to Experience`
   - Para Projects: `Post Type is equal to Project`

### Export/Import JSON

Los campos ACF se guardarán automáticamente en:
```
/wp-content/themes/portfolio/acf-json/
```

Esto permite compartir la configuración entre diferentes instalaciones.

---

## 🚀 Ejemplo de Datos de Prueba

### Skill Example:
- **Title:** React
- **Skill Level:** 90
- **Skill Category:** Frontend
- **Excerpt:** Modern JavaScript library for building user interfaces

### Experience Example:
- **Title:** Senior Developer (puedes usar job_title también)
- **Company Name:** Tech Corp
- **Job Title:** Senior Full Stack Developer
- **Start Date:** 2022-01-15
- **End Date:** Present
- **Location:** Remote
- **Technologies:** React, Node.js, MongoDB, AWS
- **Content:** Led development of... (descripción completa)

### Project Example:
- **Title:** E-commerce Platform
- **Excerpt:** Full-featured online store with payment integration
- **Content:** Built a complete e-commerce solution... (descripción completa)
- **Project URL:** https://example.com
- **GitHub URL:** https://github.com/username/project
- **Status:** Completed
- **Technologies:** React, Next.js, Stripe, Tailwind CSS
- **Featured Image:** Screenshot del proyecto
- **Features:**
  - Shopping Cart
  - Stripe Integration
  - Admin Dashboard
  - etc.

---

## ✅ Checklist Final

- [ ] Theme Settings configurado con Hero y About Me
- [ ] Al menos 5 Skills agregadas
- [ ] Al menos 2 Experiences agregadas
- [ ] Al menos 3 Projects agregados
- [ ] Todas las imágenes optimizadas y subidas
- [ ] ACF fields exportados a JSON

---

**¿Necesitas ayuda?** Contacta al desarrollador del tema.
