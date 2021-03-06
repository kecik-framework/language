**Kecik Language**
================
A library created specifically Kecik Framework, this library was made for ease in making use of multi-language projects.

## **Installation**
composer.json files
```json
{
	"require": {
		"kecik/language": "1.0.*@dev"
	}
}
```

Run a command
```shell
composer install
```

This library requires a file in json format as a dictionary. Examples json file contents.
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

## **Example Using**
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

