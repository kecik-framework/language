**Kecik Language**
================

## Cara Installasi
file composer.json
```json
{
	"require": {
		"kecik/language": "dev-master"
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
```
{
	"signin": "Sign In",
	"form": {
		"validation": {
			"must be fill": "Must be fill"
		}
	}
}
```

## Contoh penggunaan
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
