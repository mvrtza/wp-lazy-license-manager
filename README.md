# WP Lazy LicenseManager 
**What this file do:** Copy this file to your desired plugin or theme if you want active and deactivate a site you can send get request and done that

**What i need to change**: First of all there's 4 variable which you need to change to have better security so people don't easily unlock your website
```php
$on_string,$off_string,$option_name,$uniqueid
```
```php
/// If this string to be set in wp_option then
/// mean this site work properly 
$on_string
```

```php
/// If this string to be set in wp_option then
/// mean this site shouldn't work properly 
$off_string
```

```php
/// this is get request header value it should be unique
$uniqeid
```

```php
/// option_name in wp_option
$option_name
```
## FAQ
***What i need to do after i changed variables?*** decode this file with IonCube for more security

***If don't change variable this script work?*** But i don't recommend it

