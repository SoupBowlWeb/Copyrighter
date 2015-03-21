# Copyrighter

**Copyrighter** displays the copyright symbol and the current year on your PHP website.

## Usage

You can use **Copyrighter** in your PHPs...

```php

use Copyrighter\CopyrighterFactory;

$copyrighter = CopyrighterFactory::create();
$copyright = $copyrighter->getCopyright();

// $copyright variable now contains the goods. Go nuts.

```

...or you can use **Copyrighter** directly in your HTML templates. Saves time and money.

```html

<footer>
    <p><?php Copyrighter::show(); ?> Vandelay Industries.</p>
</footer>

```

## Geo Aware Year

**Copyrighter** features the ability to serve clients a Geo Aware year portion of the returned **Copyrighter** value.
Users will be served the current year for **their timezone**, not the current year of the server.

To enable Geo Aware mode, simply pass a configuration array to the CopyrighterFactory create() method:

```php

use \Copyrighter\CopyrighterFactory;

$copyrighter = CopyrighterFactory::create([ 'geo-locator' => 'FreeGeoIP' ]);
echo $copyrighter->getCopyright();

```
*Note: Currently the only supported GeoLocator is FreeGeoIP*

The configuration array can also be passed to the Copyrighter::show() method:

```html

<footer>
    <p><?php Copyrighter::show([ 'geo-locator' => 'FreeGeoIP' ]); ?> Vandelay Industries.</p>
</footer>

```