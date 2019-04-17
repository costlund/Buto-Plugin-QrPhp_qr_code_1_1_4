# Buto-Plugin-QrPhp_qr_code_1_1_4

Generate QR png images from text.


## Settings

Page setup.
```
plugin_modules:
  qr:
    plugin: 'qr/php_qr_code_1_1_4'
```

## Widget

```
type: widget
data:
  plugin: qr/php_qr_code_1_1_4
  method: png
  data:
    text: 'Some text.'
```

Outputs.

```
<img src="/qr/png?text=Some+text.">
```

### Json 

If param text is not a string json data is included in qr image.

```
type: widget
data:
  plugin: qr/php_qr_code_1_1_4
  method: png
  data:
    text:
      name: James Smith
      phone: '555-5555'
```

Outputs.

```
<img src="/qr/png?text=%7B%22name%22%3A%22James+Smith%22%2C%22phone%22%3A%22555-5555%22%7D">
```


## Page

Or just set img attribute src to:

```
/qr/png?text=Some+text.
```


## Image src attribute

It is possible to just get the url for more flexible usage.

```
wfPlugin::includeonce('qr/php_qr_code_1_1_4');
$qr = new PluginQrPhp_qr_code_1_1_4();
$src = $qr->getSrc('Some text or an array to render json.');
echo $src;
```

Outputs.

```
/qr/png?text=Some+text+or+an+array+to+render+json.
```

## Save file.

One could save file. Can be handy for PDF usage where file must exist on server.

```
wfPlugin::includeonce('qr/php_qr_code_1_1_4');
$qr = new PluginQrPhp_qr_code_1_1_4();
$filename = __DIR__."/qr_file.png";
$text = 'Some text.';
$qr->save_file($filename, $text);
```


## GD extension for PHP
When using this plugin PHP needs method ImageCreate to be enabled. In Ubuntu this could be solved with this commands.
```
sudo apt-get install php7.0-gd
/etc/init.d/apache2 restart
```
