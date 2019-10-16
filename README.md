# admin-robot-txt

## Instalasi

Jalankan perintah di bawah di folder aplikasi:

```
mim app install admin-robot-txt
```

## Konfigurasi

Pada umumnya, file `robots.txt` akan diambil dari folder `BASEPATH`. Tapi jika lokasi
bukan disana, tambahkan konfigurasi seperti di bawah pada aplikias/module untuk mengubah
lokasi file `robots.txt`.

```php
return [
    'adminRobotTxt' => [
        'base' => '/path/to/basefile'
    ]
];
```