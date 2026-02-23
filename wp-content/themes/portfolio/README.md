# Portfolio 2026

A clean, professional WordPress theme with modern tooling and best practices. Built for developers who want a solid foundation without project-specific code.

## 🚀 Features

### Modern Development Stack
- **Tailwind CSS v3.4.1** - Utility-first CSS with comprehensive custom configuration
- **esbuild** - Fast JavaScript bundling and minification
- **ACF Pro Support** - Advanced Custom Fields integration with example blocks
- **WordPress Coding Standards** - PHPCS configured with WPCS ruleset
- **Husky Git Hooks** - Automatic code quality checks and builds before commits
- **npm-run-all** - Parallel script execution for efficient development

### Tailwind Configuration
Professional color system with semantic colors:
- **Brand colors** - Full 50-950 scale (customizable)
- **Success, Warning, Error** - Complete semantic color palettes
- **Typography scale** - xs to 9xl with optimized line heights
- **Container system** - Multiple max-width options (container, container-lg, container-sm, prose)
- **Custom spacing** - Extended spacing scale
- **Animations** - fade-in, slide-up, slide-down with keyframes
- **Named z-index** - dropdown, sticky, fixed, modal, tooltip layers

### WordPress Features
- **Custom Logo Support** - Easy logo management through WordPress Customizer
- **Navigation Menus** - Primary and Footer menu locations
- **Widget Areas** - Footer widget area ready to use
- **Post Thumbnails** - Full featured image support
- **HTML5 Support** - Modern semantic markup
- **No Comments** - Comments disabled and hidden from admin

### Theme Components
- **Generic Header** - Simple header with logo and mobile menu
- **Generic Footer** - Footer with widgets, menu, social links, and copyright
- **Card Component** - Reusable card with multiple usage examples
- **Content Templates** - Generic post and page templates
- **Search Template** - Clean, accessible search results page
- **ACF Blocks** (commented, ready to activate):
  - Hero block
  - Carousel block
  - Content form block
  - CTA banner block

### Code Quality
- **PHPCS** - WordPress Coding Standards enforcement
- **Pre-commit hooks** - Automatic builds before commits
- **Clean code** - No project-specific code, fully generic
- **SVG Icon System** - Utility and social media icons with `currentColor`

## 📦 Installation

### Requirements
- Node.js (v14 or higher)
- npm or yarn
- Composer (for PHPCS)
- WordPress 5.0+
- PHP 7.4+

### Setup

1. **Clone or download** this theme into your WordPress themes directory:
   ```bash
   cd wp-content/themes
   git clone git@github.com:julian-c-dev/WordPress-empty-template.git empty
   cd empty
   ```

2. **Install npm dependencies**:
   ```bash
   npm install
   ```

3. **Install Composer dependencies** (for PHPCS):

   **On Mac/Linux:**
   ```bash
   composer install
   ```

   **On Windows (Local by Flywheel):**

   Composer requires PHP to be in your PATH. With Local by Flywheel, you need to use the Local site shell:

   1. Right-click your site in Local
   2. Select "Open Site Shell"
   3. Navigate to your theme directory
   4. Run: `composer install`

   Alternatively, add Local's PHP to your system PATH or use the full path to PHP.

4. **Build assets**:
   ```bash
   npm run build
   ```

5. **Activate the theme** in WordPress admin (Appearance → Themes)

## 🛠️ Development

### Available Scripts

#### CSS Development
```bash
# Watch and compile CSS (development)
npm run dev:css

# Build and minify CSS (production)
npm run build:css
```

#### JavaScript Development
```bash
# Watch and bundle JS (development)
npm run dev:js

# Build and minify JS (production)
npm run build:js
```

#### Combined Development
```bash
# Watch both CSS and JS in parallel
npm run dev

# Build both CSS and JS for production
npm run build
```

#### Code Quality (PHP)
```bash
# Check PHP code against WordPress standards
npm run lint:php

# Automatically fix PHP code style issues
npm run lint:php:fix

# Check for errors only (no warnings)
npm run lint:php:errors
```

Or use Composer directly:
```bash
# Check code
composer lint

# Fix code
composer lint:fix

# Errors only
composer lint:errors
```

### Git Workflow

This theme uses **Husky** for pre-commit hooks. Before each commit:
1. ✅ Builds CSS and JS automatically
2. ✅ Minifies assets for production

**Note**: PHPCS check is currently disabled in the hook due to PATH requirements. To enable it:
1. Ensure PHP is in your system PATH
2. Uncomment the PHPCS check in `.husky/pre-commit`

## 📂 Project Structure

```
portfolio_2026/
├── .husky/              # Git hooks configuration
├── assets/
│   ├── dist/            # Compiled CSS & JS (git ignored)
│   │   ├── css/
│   │   ├── js/
│   │   └── fonts/
│   └── src/             # Source files
│       ├── css/         # Tailwind CSS source
│       └── js/          # JavaScript source
├── inc/                 # PHP includes
│   ├── admin/           # Admin-related functions
│   ├── helpers/         # Helper functions and utilities
│   │   ├── functions.php
│   │   └── svgs.php
│   ├── lib/             # Third-party libraries (TGM)
│   └── setup/           # Theme setup files
│       ├── acf.php
│       ├── enqueue.php
│       ├── post-types.php
│       └── required-plugins.php
├── plugins/             # Required plugins (ACF Pro ZIP)
├── template-parts/
│   ├── blocks/          # ACF blocks (commented out)
│   │   ├── hero/
│   │   ├── carousel-manual-data/
│   │   ├── content-form/
│   │   └── cta-banner/
│   ├── components/      # Reusable components
│   │   ├── card.php
│   │   └── card-example.php
│   └── content/         # Content templates
│       ├── content-post.php
│       └── content-page.php
├── .gitignore
├── 404.php
├── composer.json        # PHP dependencies
├── footer.php
├── functions.php
├── header.php
├── index.php
├── package.json         # Node dependencies
├── page.php
├── phpcs.xml           # PHPCS configuration
├── postcss.config.js   # PostCSS configuration
├── search.php
├── single.php
├── style.css           # Theme header (required by WordPress)
└── tailwind.config.js  # Tailwind configuration
```

## 🎨 Tailwind CSS

### Custom Prefix
All Tailwind classes use the `mk-` prefix to avoid conflicts:
```html
<div class="mk-flex mk-items-center mk-gap-4">
  <h1 class="mk-text-3xl mk-font-bold">Title</h1>
</div>
```

### Custom Classes
The theme includes custom utility classes defined in `assets/src/css/app.css`:
- `.btn`, `.btn-primary`, `.btn-secondary`, `.btn-outline` - Button styles
- `.card`, `.card-header`, `.card-body`, `.card-footer` - Card components
- `.form-input`, `.form-textarea`, `.form-select`, `.form-label` - Form elements
- `.prose` - Content styling for blog posts and pages

### Container Widths
```css
mk-max-w-container      /* 1200px - Main site container */
mk-max-w-container-lg   /* 1440px - Large container */
mk-max-w-container-sm   /* 960px - Small container */
mk-max-w-prose          /* 65ch - Optimal reading width */
```

## 🔌 Required Plugins

### ACF Pro
The theme is designed to work with Advanced Custom Fields Pro.

**Installation via TGM:**
1. Place `advanced-custom-fields-pro.zip` in the `plugins/` directory
2. Activate the theme
3. You'll see a notice to install ACF Pro
4. Click "Begin installing plugins"

**ACF Blocks:**
The theme includes 4 example blocks (currently commented out):
- Hero
- Carousel (manual data)
- Content form
- CTA banner

To activate them:
1. Create the ACF field groups for each block
2. Uncomment the block registration in `inc/setup/acf.php`

## 🎯 Usage Examples

### Card Component
```php
<?php
// Example 1: With post data
get_template_part('template-parts/components/card', null, array(
    'image_url' => get_the_post_thumbnail_url(),
    'title'     => get_the_title(),
    'excerpt'   => get_the_excerpt(),
    'link'      => get_permalink(),
    'link_text' => 'Read More',
    'date'      => get_the_date('Y-m-d'),
    'category'  => get_the_category()[0]->name ?? '',
));

// Example 2: With custom data
get_template_part('template-parts/components/card', null, array(
    'image_url' => 'https://example.com/image.jpg',
    'title'     => 'Card Title',
    'excerpt'   => 'Card description text...',
    'link'      => '/custom-link',
    'link_text' => 'Learn More',
    'category'  => 'Featured',
));
?>
```

See `template-parts/components/card-example.php` for more usage examples.

### SVG Icons
```php
<?php
// Available icons: search, close, menu, arrow-down, arrow-right, arrow-left
// Social: facebook, twitter, instagram, linkedin, youtube
echo wp_kses( empty_svgs( 'search' ), empty_allowed_svg_tags() );
?>
```

Icons use `currentColor` for easy theming with Tailwind classes.

## 🔧 Customization

### Colors
Edit `tailwind.config.js` to customize the brand colors:
```js
colors: {
  brand: {
    50: '#f0f9ff',
    // ... customize your brand colors
    950: '#082f49',
  },
}
```

### Fonts
Replace the default Inter font in `tailwind.config.js`:
```js
fontFamily: {
  sans: ['Your-Font', 'system-ui', 'sans-serif'],
}
```

### Logo
Upload your logo via WordPress Customizer:
- Appearance → Customize → Site Identity → Logo

### Menus
Create menus via WordPress admin:
- Appearance → Menus
- Available locations: Primary Menu, Footer Menu

### Social Links
Add social media URLs via WordPress Customizer:
- Appearance → Customize → (Your social links section)

Or modify the footer.php to add custom social link logic.

## 📝 Notes

### Composer on Windows
When using Local by Flywheel on Windows, Composer requires PHP to be accessible. Use the Local site shell to run Composer commands, or add Local's PHP to your system PATH.

### PHPCS Pre-commit Hook
The PHPCS check in the pre-commit hook is currently disabled. To enable it:
1. Ensure PHP is in your system PATH
2. Uncomment the PHPCS section in `.husky/pre-commit`

### Node Version
If you encounter issues with esbuild or Tailwind, ensure you're using Node.js v14 or higher.

## 🤝 Contributing

This is a starter theme meant to be forked and customized for your projects. Feel free to:
- Fork the repository
- Customize for your needs
- Share improvements back to the community

## 📄 License

GPL v2 or later

## 🙏 Credits

Built with modern WordPress development practices and powered by:
- [Tailwind CSS](https://tailwindcss.com/)
- [esbuild](https://esbuild.github.io/)
- [Advanced Custom Fields](https://www.advancedcustomfields.com/)
- [WordPress Coding Standards](https://github.com/WordPress/WordPress-Coding-Standards)
- [Husky](https://typicode.github.io/husky/)

---

**Made with ❤️ for the WordPress community**

For issues, questions, or contributions, visit: [GitHub Repository](https://github.com/julian-c-dev/WordPress-empty-template)
