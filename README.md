# ham-radio
[![Latest Version on Packagist](https://img.shields.io/packagist/v/repat/ham-radio.svg?style=flat-square)](https://packagist.org/packages/repat/ham-radio)
[![Total Downloads](https://img.shields.io/packagist/dt/repat/ham-radio.svg?style=flat-square)](https://packagist.org/packages/repat/ham-radio)

**ham-radio** is a library for quickly validating the format of a call sign by the rules of the country and also run a check against the official public database, e.g. by the FCC in the US.

## Installation
`$ composer require repat/ham-radio`

## Example
```php
$us = new US;
$us->verifyCallSign('KN6DZC');
// returns: [
//     "Response" => [
//       "Licenses" => [
//         "License" => [
//           "licName" => "...."

$us ->validateCallSign('KN6DZC');
// returns: true
```

## Supported Countries
* US

## Contribute
1. Fork the project
2. Create a new class that `extends Helper`
3. Name the class after the ISO3166 country code
4. Add a function `regex() : string` that returns a regular expression to validate the call sign format.
5. Add a function `verifyCallSign(string $callSign) : array`. With `$this->client` you get a `GuzzleHttp`  client for making API calls. I also pulled in `repat/http-constants` for checking HTTP status codes in the response. In case the API returns XML, check out `$this->xml2array()`. A json response could be returned by `json_decode($response, true)`.

## License
* MIT, see [LICENSE](https://github.com/repat/laravel-job-models/blob/master/LICENSE)

## Version
* Version 0.1

## Contact
#### repat
* Homepage: https://repat.de
* e-mail: repat@repat.de
* Twitter: [@repat123](https://twitter.com/repat123 "repat123 on twitter")
* KN6DZC

[![Flattr this git repo](http://api.flattr.com/button/flattr-badge-large.png)](https://flattr.com/submit/auto?user_id=repat&url=https://github.com/repat/laravel-job-models&title=laravel-job-models&language=&tags=github&category=software)
