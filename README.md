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

## Page

Or just set img attribute src to:

```
/qr/png?text=Some+text.
```

### Json 

Replace text param with json to put json data in qr image.

```
type: widget
data:
  plugin: qr/php_qr_code_1_1_4
  method: png
  data:
    json:
      name: James Smith
      phone: '555-5555'
```

_Check out php code for widget how to build an json url._


Outputs.


```
<img src="/qr/png?text=%7B%22name%22%3A%22James+Smith%22%2C%22phone%22%3A%22555-5555%22%7D">
```



