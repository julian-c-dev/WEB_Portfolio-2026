# Portfolio 2026

Personal WordPress portfolio theme. Single-page layout with sections for About, Skills, Experience, and Projects. Built with Tailwind CSS, Alpine.js, and ACF Pro.

## Stack

- **WordPress** with custom post types and ACF Pro
- **Tailwind CSS v3** — utility-first styling
- **Alpine.js** — lightweight JS interactions
- **esbuild** — JS bundling
- **PHPCS / WPCS** — WordPress Coding Standards enforcement
- **Husky** — pre-commit build hook

## Requirements

- WordPress 6.0+
- PHP 8.0+
- Node.js 16+
- Composer (for PHPCS)
- ACF Pro (installed via TGM from `plugins/advanced-custom-fields-pro.zip`)

## Setup

```bash
# Install Node dependencies
npm install

# Install Composer dependencies (needed for lint scripts)
# On Windows with Local by Flywheel: right-click site → Open Site Shell, then:
composer install

# Build assets
npm run build

# Activate theme in WordPress admin
```

## Development

```bash
npm run dev        # Watch CSS + JS in parallel
npm run build      # Build and minify CSS + JS for production

npm run lint:php         # Check PHP against WordPress Coding Standards
npm run lint:php:fix     # Auto-fix PHP code style
npm run lint:php:errors  # Check errors only (no warnings)
```

## Custom Post Types

| CPT | Description |
|-----|-------------|
| `project` | Portfolio projects shown on the front page |
| `experience` | Work experience entries |
| `skill` | Skills, grouped by `skill_category` taxonomy |

## ACF Fields

All global settings live in **Appearance → Theme Settings** (ACF Options page), under a single `settings` group field:

| Field | Type | Used in |
|-------|------|---------|
| `hero_name` | Text | Front page hero |
| `hero_role` | Text | Front page hero |
| `hero_summary` | Textarea | Front page hero |
| `resume` | File | Download link in Experience section |
| `about` | WYSIWYG | About section |
| `social_media` | Group (github, linkedin, codepen) | Sidebar social links |
| `footer` | WYSIWYG | Footer text |

Project CPT fields: `title`, `link` (URL), `description`, `skills` (relationship to skill CPT).

Experience CPT fields: `title`, `link` (ACF link), `start_date`, `end_date`, `description`, `skills` (relationship).

## Project Structure

```
├── assets/
│   ├── src/css/app.css       # Tailwind source
│   ├── src/js/app.js         # JS source
│   └── dist/                 # Compiled output (git-ignored)
├── acf-json/                 # ACF field group JSON (auto-sync)
├── inc/
│   ├── helpers/
│   │   ├── functions.php     # Theme setup, skill color helpers
│   │   └── svgs.php          # SVG icon library
│   └── setup/
│       ├── acf.php           # ACF options page registration
│       ├── enqueue.php       # Frontend / admin asset enqueue
│       ├── post-types.php    # CPT registration
│       ├── required-plugins.php  # TGM plugin activation
│       └── seo.php           # Meta tags, Open Graph, JSON-LD
├── template-parts/
│   └── portfolio-v2/
│       ├── about-me.php
│       ├── experience.php
│       ├── projects.php
│       └── skills.php
├── front-page.php            # Single-page portfolio layout
├── single-project.php        # Individual project page
├── phpcs.xml                 # PHPCS ruleset
├── tailwind.config.js
└── composer.json
```

## Credits

Design inspired by [Brittany Chiang's portfolio](https://brittanychiang.com). Built as a WordPress adaptation of her layout and visual style.

## License

GPL v2 or later
