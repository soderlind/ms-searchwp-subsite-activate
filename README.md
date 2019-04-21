# Automatically Activate SearchWP on Subsite

When you create a subsite, automatically activate the SearchWP plugin and enable its license on the subsite.

## Prerequisite

- WordPress multisite
- SearchWP installed
- Your SearchWP license added to wp-config.php:

  `define( 'SEARCHWP_LICENSE_KEY', 'my-license-key-goes-here' );`

## Installation

Install the plugin and network activate it.

## Usage

When you add a new subsite, this plugin will, on the subsite:

- Activate the SearchWP plugin.
- Activate the SearchWP license.
- Tell SearchWP to work with the default generated config on install.
- Run the SearchWP indexer on the default index.

## Copyright and License
Automatically Activate SearchWP on Subsite is copyright 2019 Per Soderlind

Automatically Activate SearchWP on Subsite is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any later version.

Automatically Activate SearchWP on Subsite is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU Lesser General Public License along with the Extension. If not, see http://www.gnu.org/licenses/.