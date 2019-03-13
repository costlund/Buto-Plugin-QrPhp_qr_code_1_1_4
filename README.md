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
