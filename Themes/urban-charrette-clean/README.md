# Urban Charrette Theme - Clean Build

A minimal WordPress theme with **header**, **footer**, and **CTA section only**.

## Files Included

- `header.php` - Site header with responsive navigation
- `footer.php` - Site footer with menus and customizer settings
- `index.php` - CTA section template
- `functions.php` - Theme setup, customizer settings, and asset enqueueing
- `style.css` - Header, footer, CTA, and button styles (clean, no extra sections)
- `assets/js/navigation.js` - Mobile menu toggle functionality

## Setup

1. Extract into your WordPress themes directory
2. Activate the theme in WordPress admin
3. Configure menus (Primary Menu, Quick Links, Get Involved, Social Links)
4. Upload a custom logo in Customizer
5. Add your own sections (hero, about, what we do, projects, etc.)

## Customizer Options

- **Footer Settings**: Subscription tagline, consent text
- **CTA Settings**: Title, subtitle, background image

## Build Your Content

The theme provides the structural foundation. Add your content sections between `get_header()` and `get_footer()` in:
- `home.php` - Homepage template
- `page.php` - Page template
- `single.php` - Post template

All styles follow the `site-header`, `site-footer`, and `cta` naming conventions for consistency.
