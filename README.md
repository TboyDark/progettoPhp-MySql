<<<<<<< HEAD
![GitHub repo size](https://img.shields.io/github/repo-size/TboyDark/progettoPhp-MySql?style=for-the-badge) ![GitHub top language](https://img.shields.io/github/languages/top/TboyDark/progettoPhp-MySql?style=for-the-badge&logo=php) ![](https://img.shields.io/badge/dependency%20manager%20used-composer-green?style=for-the-badge&logo=composer)
![GitHub last commit](https://img.shields.io/github/last-commit/TboyDark/progettoPhp-MySql?style=for-the-badge&logo=github) ![](https://img.shields.io/badge/PHP%20Package-WAMP-purple?style=for-the-badge&logo=wampserver)
#   My PHP and MySQL Project

## _What it is?_

 This is an API for REST architecture for an application where italian citizen can buy performances.
 This API can create 2 DB tables: the tipology and the performance delivered.
 Also you can filter the tables by the tipology, the Date it was buyed and the Total Hours it saved for the italian citizens.
 
---

## _How it works this project?_
With POSTMAN App enter this URL to filter by tipology
```bash
http://localhost/ProgettoPHPeMySQL/www/api/prestazioniErogate/filterTipologia.php
```
With type **POST** and **PUT** select **Body** -> **raw** select **JSON** type and then right under write a json with this request:
```bash
{
    "tipologiaPrestazione": "1"
}
```
---
With POSTMAN App enter this URL to filter by time range
```bash
http://localhost/ProgettoPHPeMySQL/www/api/prestazioniErogate/filterRangeTemporale.php
```
With type **POST** and **PUT** select **Body** -> **raw** select **JSON** type and then right under write a json with this request:
```bash
{
    "dataDiVendita": "2023-01-01"
}
```
---
With POSTMAN App enter this URL to get the toal hours saved by the italian citizen with each performance
```bash
http://localhost/ProgettoPHPeMySQL/www/api/tipologiaPrestazione/filterTempoRisparmiato.php
```
Select type **GET**

---
With POSTMAN App enter this URL to create, read, update and delete of a tipology:<br>
<br>
Select TYPE: **POST** 

```bash
http://localhost/ProgettoPHPeMySQL/www/api/tipologiaPrestazione/create.php
```
Select TYPE: **GET**
```bash
http://localhost/ProgettoPHPeMySQL/www/api/tipologiaPrestazione/read.php
```
Select TYPE: **PUT**
```bash
http://localhost/ProgettoPHPeMySQL/www/api/tipologiaPrestazione/update.php
```
Select TYPE: **DELETE**
```bash
http://localhost/ProgettoPHPeMySQL/www/api/tipologiaPrestazione/delete.php
```
As like the filters, for type **POST** and **PUT** select **Body** -> **raw** select **JSON** type and then right under write a json with those datas:
```bash
{
    "id": 3,
    "nome": "example",
    "tempoRisparmiato": 2
}
```
Note that for the create.php you should not insert in the JSON the id data.

For the delivered performance is the same as the tipology, but you have to change the POSTMAN URL with this:
```bash
http://localhost/ProgettoPHPeMySQL/www/api/prestazioniErogate/CRUD_METHODS.php
```

---

## Author
[@TboyDark](https://www.github.com/TboyDark)
my Twitter [@TboyDark98](https://twitter.com/TboyDark98) 
Email: tommasobaldan1998@gmail.com

---
## Requirements for this project

It's required composer and vlucas/phpdotenv to get the project working.

---
## Licenses

Distributed under the BSD-3Clause License, Composer License and APACHE license.

---

## Acknowledgments

- [Start2Impact](https://www.start2impact.it/)
- Web guides 😁
---

=======
![GitHub repo size](https://img.shields.io/github/repo-size/TboyDark/progettoPhp-MySql?style=for-the-badge) ![GitHub top language](https://img.shields.io/github/languages/top/TboyDark/progettoPhp-MySql?style=for-the-badge&logo=php) ![](https://img.shields.io/badge/dependency%20manager%20used-composer-green?style=for-the-badge&logo=composer)
![GitHub last commit](https://img.shields.io/github/last-commit/TboyDark/progettoPhp-MySql?style=for-the-badge&logo=github) ![](https://img.shields.io/badge/PHP%20Package-WAMP-purple?style=for-the-badge&logo=wampserver)
#   My PHP and MySQL Project

## _What it is?_

 This is an API for REST architecture for an application where italian citizen can buy performances.
 This API can create 2 DB tables: the tipology and the performance delivered.
 Also you can filter the tables by the tipology, the Date it was buyed and the Total Hours it saved for the italian citizens.
 
---

## _How it works this project?_
With POSTMAN App enter this URL to filter by tipology
```bash
http://localhost/ProgettoPHPeMySQL/www/api/prestazioniErogate/filterTipologia.php
```
With type **POST** and **PUT** select **Body** -> **raw** select **JSON** type and then right under write a json with this request:
```bash
{
    "tipologiaPrestazione": "1"
}
```
---
With POSTMAN App enter this URL to filter by time range
```bash
http://localhost/ProgettoPHPeMySQL/www/api/prestazioniErogate/filterRangeTemporale.php
```
With type **POST** and **PUT** select **Body** -> **raw** select **JSON** type and then right under write a json with this request:
```bash
{
    "dataDiVendita": "2023-01-01"
}
```
---
With POSTMAN App enter this URL to get the toal hours saved by the italian citizen with each performance
```bash
http://localhost/ProgettoPHPeMySQL/www/api/tipologiaPrestazione/filterTempoRisparmiato.php
```
Select type **GET**

---
With POSTMAN App enter this URL to create, read, update and delete of a tipology:<br>
<br>
Select TYPE: **POST** 

```bash
http://localhost/ProgettoPHPeMySQL/www/api/tipologiaPrestazione/create.php
```
Select TYPE: **GET**
```bash
http://localhost/ProgettoPHPeMySQL/www/api/tipologiaPrestazione/read.php
```
Select TYPE: **PUT**
```bash
http://localhost/ProgettoPHPeMySQL/www/api/tipologiaPrestazione/update.php
```
Select TYPE: **DELETE**
```bash
http://localhost/ProgettoPHPeMySQL/www/api/tipologiaPrestazione/delete.php
```
As like the filters, for type **POST** and **PUT** select **Body** -> **raw** select **JSON** type and then right under write a json with those datas:
```bash
{
    "id": 3,
    "nome": "example",
    "tempoRisparmiato": 2
}
```
Note that for the create.php you should not insert in the JSON the id data.

For the delivered performance is the same as the tipology, but you have to change the POSTMAN URL with this:
```bash
http://localhost/ProgettoPHPeMySQL/www/api/prestazioniErogate/CRUD_METHODS.php
```

---

## Author
[@TboyDark](https://www.github.com/TboyDark)
my Twitter [@TboyDark98](https://twitter.com/TboyDark98) 
Email: tommasobaldan1998@gmail.com

---
## Requirements for this project

It's required composer and vlucas/phpdotenv to get the project working.

---
## Licenses

Distributed under the BSD-3Clause License, Composer License and APACHE license.

---

## Acknowledgments

- [Start2Impact](https://www.start2impact.it/)
- Web guides 😁
---

>>>>>>> 664480c4a832f68d7657e4d854eccdb0def35bcd
