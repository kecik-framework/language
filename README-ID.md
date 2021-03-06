**Kecik Language**
================
Merupakan pustaka/library yang dibuat khusus Framework Kecik, pustaka/library ini dibuat untuk mempermudah dalam membuat project yang menggunakan multi bahasa.

## **Cara Installasi**
file composer.json
```json
{
	"require": {
		"kecik/language": "1.0.*@dev"
	}
}
```

Jalankan perintah
```shell
composer install
```

Library/Pustaka ini membutuhkan sebuah file dalam format json sebagai kamus bahasa. Contoh isi file json.
>nama file: **lang_id.json**
```json
{
	"signin": "Masuk",
	"form": {
		"validation": {
			"must be fill": "Harus diisi"
		}
	}
}
```

>nama file: **lang_us.json**
```json
{
	"signin": "Sign In",
	"form": {
		"validation": {
			"must be fill": "Must be fill"
		}
	}
}
```

## **Contoh penggunaan**
```php
<?php
require "vendor/autoload.php";

$app = new Kecik\Kecik();

$lang = new Kecik\Language(array(
	'id'=>'lang_id.json',
	'us'=>'lang_us.json'
));

$app->get('/', function() use ($lang){
	echo 'Indonesia Sign In :'.$lang->id('signin').'<br />';
	echo 'English [US] Sign In :'.$lang->us('signin').'<br />';
	echo 'Indonesia Must be fill : '.$lang->id('must be fill', array('form', 'validation')).'<br />';
	echo 'English [US] Must be fill :'.$lang->us('must be fill', array('form', 'validation'));
});

$app->run();
?>
```
