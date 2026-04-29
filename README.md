# ImmensTheme

**ImmensTheme** is a lightweight, fully‑customisable Blocksy‑inspired theme tailored for ImmensPress.  It provides a clean foundation for high‑speed direct‑response sites and includes a starter block palette, typography, and layout options that map directly to the ImmensPress performance philosophy.

## Features
- **Full Site Editing** – Leverage the latest WordPress block editor to design pages without leaving the admin.
- **Customizable Color Palette** – 4 core colors (Primary, Secondary, Background, Foreground) and a palette manager for brand extensions.
- **Typography Flexibility** – System fonts with an optional custom sans‑serif stack via `theme.json`.
- **Responsive Layout** – Wide and full‑width support with a maximum width of 2 k px.
- **Minimal CSS** – All visual defaults handled via `theme.json`; the stylesheet only contains essential resets.
- **Block Compatibility** – Designed to work with WP core blocks and the ImmensPress extensions.

## Installation
1. Clone or pull the repo into `wp-content/themes/immens`.
2. Activate the theme from the WordPress admin.
3. Optional: add your own block patterns or templates in the theme folder.

## Getting Started
Create a new `functions.php` if you want to enqueue additional assets or register custom blocks.  The theme ships with default styles and layout that follow the ImmensPress guidelines.

## Contributing
Pull requests are welcome!  Make sure to run `npm run lint` (if you maintain the build pipeline) and verify that the theme passes basic static analysis.  Package.json may need to be extended to support scss or other build tools.

## License
GPL‑3.0 or later – see the `LICENSE` file.
