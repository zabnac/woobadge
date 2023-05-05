# Custom Badges for WooCommerce

This WordPress plugin adds custom badges to WooCommerce products. Users can input a text/number to be displayed on the badge and choose its position on the product image. The badge background color is #dd4d4d, the text color is white, and the badge has a border-radius of 8px. When a user inputs a long text, the badge expands horizontally.

## Features

- Adds two fields to the product data/general tab in WooCommerce products.
- Allows users to input a custom badge text/number.
- Allows users to choose the badge position: left top, right top, left bottom, or right bottom.
- Displays a custom badge with the specified text and position on the product image.
- Customizable badge design with CSS.

## Installation

1. Download the `custom-badges.php` file or clone this repository to your local machine.
2. Compress the `custom-badges.php` file into a ZIP archive.
3. In your WordPress admin panel, navigate to "Plugins" > "Add New" > "Upload Plugin".
4. Upload the ZIP archive you created in step 2.
5. After the upload is complete, activate the plugin.

## Usage

1. In your WordPress admin panel, navigate to "Products" and select or create the product you want to add a custom badge to.
2. In the "Product Data" section, click on the "General" tab.
3. In the "General" tab, you'll see two new fields: "Badge Text" and "Badge Position".
4. Enter the text/number you want to display on the badge in the "Badge Text" field.
5. Choose the badge position from the "Badge Position" dropdown: left top, right top, left bottom, or right bottom.
6. Save or update the product.
7. The custom badge will now be displayed on the product image in your WooCommerce store.

## Customization

To modify the badge design, you can edit the CSS rules in the `custom_badges_styles()` function within the `custom-badges.php` file.

## License

This plugin is licensed under the GNU General Public License v3.0 or later.
