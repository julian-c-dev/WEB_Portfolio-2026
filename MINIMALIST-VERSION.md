# 🎨 Portfolio Minimalista - Versión Brittany Chiang

## ✅ Nueva Versión Creada

He rediseñado completamente tu portafolio con un estilo minimalista inspirado en Brittany Chiang.

---

## 🆕 Cambios Principales

### **1. Diseño Split Screen (Desktop)**
- **Lado Izquierdo (Fijo):**
  - Tu nombre y título
  - Navegación lateral con indicadores animados
  - Enlaces sociales (GitHub, LinkedIn, etc.)
  - Ocupa el 50% de la pantalla

- **Lado Derecho (Scroll):**
  - Contenido de About, Experience, Projects
  - Scroll suave con navegación automática
  - Ocupa el otro 50% de la pantalla

### **2. Paleta de Colores Minimalista**
- **Grises neutros:** Slate (50, 500, 600, 700, 900)
- **Color de acento:** Teal para tags de tecnologías
- **Sin degradados** ni efectos visuales excesivos
- **Mucho espacio en blanco**

### **3. Navegación Mejorada**
- Indicadores de línea que crecen en hover
- Active state automático al hacer scroll
- Enlaces ARIA accesibles
- Smooth scroll nativo

### **4. Secciones Rediseñadas**

#### **About**
- Texto simple en formato prose
- Sin galería de fotos (enfoque en contenido)
- Máxima legibilidad

#### **Experience**
- Lista horizontal (desktop: fecha | contenido)
- Cards con hover effect sutil
- Tags de tecnologías con color teal
- Link directo a detalles

#### **Projects**
- Grid de 2 columnas (imagen | contenido)
- Imagen a la izquierda en desktop
- Enlaces externos inline (View Project, GitHub)
- Hover effects sutiles
- Tags de tecnologías

---

## 📂 Archivos Nuevos

### Templates V2 (Minimalistas)
```
/template-parts/portfolio-v2/
├── about-me.php      → Texto simple, sin galería
├── experience.php    → Lista horizontal con fechas
└── projects.php      → Grid con imágenes a la izquierda
```

### Front Page Actualizado
- **front-page.php** → Completamente rediseñado

---

## 🔄 Diferencias con la Versión Anterior

| Característica | Versión Original | Versión Minimalista |
|----------------|------------------|---------------------|
| **Navegación** | Tabs estilo folder | Sidebar fijo + scroll |
| **Hero** | Fullscreen con imagen | Split screen lateral |
| **Colores** | Colorido con degradados | Grises neutros |
| **Experience** | Timeline alternada vertical | Lista horizontal |
| **Projects** | Grid de 3 cards | Lista vertical con imágenes |
| **Efectos** | Muchos hovers y animaciones | Sutiles y minimalistas |
| **Social Links** | En footer | En sidebar fijo |

---

## 🎯 Nuevos Campos ACF Necesarios

Añade estos campos en **Theme Settings**:

1. **Hero Location** (`hero_location`)
   - Tipo: Text
   - Ejemplo: "Based in Spain"

2. **Resume URL** (`resume_url`)
   - Tipo: URL
   - Tu CV en PDF (opcional)

3. **Social Links** (`social_links`)
   - Tipo: Repeater
   - Sub-fields:
     - `platform` (Text) → "GitHub", "LinkedIn"
     - `url` (URL) → Link a tu perfil

---

## 📱 Responsive Behavior

### Desktop (>1024px)
- Split screen 50/50
- Sidebar fijo a la izquierda
- Navegación lateral visible

### Tablet (768px - 1023px)
- Layout móvil con header en top
- Scroll vertical normal

### Mobile (<768px)
- Header compacto arriba
- Todo en una columna
- Social links en footer (añadir si es necesario)

---

## 🎨 Elementos de Diseño Clave

### **1. Active Nav Indicators**
Los indicadores de navegación se animan cuando:
- Haces scroll a una sección
- Haces hover sobre el link
- Cambian de tamaño (8px → 16px)

### **2. Hover Effects**
Cards de experience y projects:
- Opacity de grupos al hacer hover
- Solo el item en hover tiene 100% opacity
- Los demás bajan a 50% opacity

### **3. Arrow Icons**
Links tienen flechas animadas que se mueven:
- Hover: diagonal (↗)
- Color: heredado del texto

### **4. Tech Tags**
- Background: teal-400/10 (transparente)
- Text: teal-900
- Rounded full
- Padding pequeño

---

## 🚀 Cómo Activar Esta Versión

La nueva versión YA ESTÁ ACTIVA en **front-page.php**.

Si quieres volver a la versión con tabs, necesitarías restaurar el archivo anterior.

---

## 📝 Contenido Recomendado

### **About Section** (2-4 párrafos)
Ejemplo del estilo:
```
Back in [YEAR], I decided to try my hand at [SOMETHING] and tumbled
head first into the rabbit hole of coding and web development.
Fast-forward to today, and I've had the privilege of building
software for [TYPES OF COMPANIES].

My main focus these days is [CURRENT WORK]. I most enjoy building
software in the sweet spot where design and engineering meet —
things that look good but are also built well under the hood.

When I'm not at the computer, I'm usually [HOBBIES/INTERESTS].
```

### **Experience**
- Usa bullet points en el excerpt
- Enfócate en logros, no tareas
- Ejemplo: "Built X that did Y, impacting Z users"

### **Projects**
- Descripción concisa (2-3 líneas)
- Menciona el impacto si es posible
- Ejemplo: "A Chrome extension with 100k+ installs"

---

## ✨ Características Únicas

### **1. Smooth Scroll Automático**
JavaScript incluido para:
- Scroll suave al hacer click en navegación
- Active state automático basado en scroll position
- Sin librerías externas necesarias

### **2. Accesibilidad**
- ARIA labels en navegación
- Skip links accesibles
- Contraste de colores WCAG AA compliant
- Keyboard navigation friendly

### **3. Performance**
- No usa Alpine.js (más ligero)
- JavaScript vanilla mínimo
- Imágenes lazy loading
- Sin librerías pesadas

---

## 🎯 Próximos Pasos

1. **Configura los nuevos ACF Fields:**
   - Hero Location
   - Resume URL
   - Social Links (Repeater)

2. **Actualiza About Me:**
   - Escribe 2-4 párrafos con tu historia
   - Estilo narrativo y personal
   - Sin galería de fotos

3. **Añade tus datos:**
   - Links sociales (GitHub, LinkedIn, etc.)
   - URL de tu resume/CV
   - Ubicación actual

4. **Ajusta colores si quieres:**
   - Cambiar `teal` por otro color de acento
   - Los grises mantenerlos para el estilo minimalista

---

## 🔧 Personalización Fácil

### Cambiar color de acento (Teal)
Busca y reemplaza:
- `mk-bg-teal-400/10` → `mk-bg-blue-400/10`
- `mk-text-teal-900` → `mk-text-blue-900`

### Ajustar anchos de sidebar
En `front-page.php`, línea 22:
```php
lg:mk-w-1/2  → lg:mk-w-2/5  (sidebar más estrecho)
```

### Cambiar fuente
En Tailwind config o CSS custom:
```css
font-family: 'Inter', system-ui, sans-serif;
```

---

## ✅ Checklist Final

- [ ] Nuevos ACF Fields creados (location, resume, social links)
- [ ] About Me escrito en estilo narrativo
- [ ] Social links configurados
- [ ] Resume URL añadido (si tienes)
- [ ] Al menos 2-3 Experiences
- [ ] Al menos 3 Projects con imágenes
- [ ] Probado en desktop, tablet y mobile
- [ ] Colores ajustados si es necesario

---

## 🎉 ¡Listo!

Tu portafolio minimalista estilo Brittany Chiang está configurado y listo.

**Recuerda:** Este diseño es perfecto para desarrolladores que buscan trabajo, ya que:
- ✅ Es profesional y limpio
- ✅ Enfoca en el contenido, no en diseño excesivo
- ✅ Es rápido y accesible
- ✅ Se ve bien en todos los dispositivos
- ✅ Es fácil de actualizar

**¡Mucha suerte en tu búsqueda de trabajo! 🚀**
