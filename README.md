## Aplicação para cadastro de plantas e abelhas e visualização de quais plantas florescem durante o ano.

## Descrição do projeto

Consulta de abelhas

Consulta de Plantas, por tipo de abelha e meses onde ocorre a floração, de acordo com as seguintes regras:

Se nenhum tipo de abelha foi escolhido: pesquisar por plantas polinizadas por qualquer tipo de abelha.

Se um tipo de abelha foi escolhido: pesquisar por plantas polinizadas pelo tipo de abelha escolhido.

Se nenhum mês de floração foi escolhido: pesquisar por plantas que florescem em qualquer mês do ano.

Se um ou mais meses forem escolhidos: pesquisar por plantas que florescem nesses meses.

Se um ou mais meses e um tipo de abelha forem escolhidos: pesquisar por plantas que florescem nesses meses ou polinizadas pelo tipo de abelha escolhido.

## Instalação

### .env

```
#DB_CONNECTION=mysql
#DB_HOST=db
#DB_PORT=3306
#DB_DATABASE=bees_plants
#DB_USERNAME=bees_plants_user
#DB_PASSWORD=password
```

### Subindo a aplicação com o docker

```
$ cd example-laravel-clean-architecture
$ docker-compose build app
$ docker-compose up -d
$ docker-compose exec app composer install
$ docker-compose exec app php artisan key:generate
$ docker-compose exec app php artisan migrate:fresh --seed
```

## Estrutura

```
app/
├─ Http/
│  ├─ Controllers/
│  │  ├─ Api/
│  │  │  ├─ PlantController.php
│  │  │  ├─ BeeController.php
├─ Interfaces/
│  ├─ BeeInterface.php
│  ├─ PlantInterface.php
├─ Models/
│  ├─ Bee.php
│  ├─ Plant.php
├─ Providers/
│  ├─ RepositoryServiceProvider.php
├─ Repositories/
│  ├─ Api/
│  │  ├─ BeeApiRepository.php
│  │  ├─ PlantApiRepository.php
├─ Traits/
│  ├─ ResponseAPI.php

```

## Rotas

#### 127.0.0.1:8000/api/bees [GET]

##### Retorna todas as abelhas
```
{
    "message": "All Bees",
    "error": false,
    "code": 200,
    "results": [
        {
            "id": 1,
            "name": "Uruçu",
            "scientific_name": "Melipona scutellaris"
        },
        {
            "id": 2,
            "name": "Uruçu-Amarela",
            "scientific_name": "Melipona rufiventris"
        },
        {
            "id": 3,
            "name": "Guarupu",
            "scientific_name": "Melipona bicolor"
        },
        {
            "id": 4,
            "name": "Iraí",
            "scientific_name": "Nannotrigona testaceicornes"
        }
    ]
}
```

---

#### 127.0.0.1:8000/api/create-bee [POST]

##### Armazena uma abelha no BD

##### Parâmetros:
    -  name (String)
    -  scientific_name (String)

##### Exemplo:
```
{
    "name": "Nome abelha",
    "scientific_name": "Nome abelha cientifico"
}
```

##### Retorno:

```
{
    "message": "Bee created",
    "error": false,
    "code": 200,
    "results": {
        "name": "Nome abelha",
        "scientific_name": "Nome abelha cientifico",
        "id": 5
    }
}
```

---

#### 127.0.0.1:8000/api/create-plant [POST]

##### Armazena uma planta no BD

##### Parâmetros:
    -  name (String)
    -  scientific_name (String)
    -  month (String) (Nullable)
    -  bee_id (Integer)

##### Exemplo:
```
{
    "name": "Nome planta",
    "scientific_name": "Nome planta cientifico",
    "month": "December",
    "bee_id": 1
}
```

##### Retorno:

```
{
    "message": "Plant created",
    "error": false,
    "code": 200,
    "results": {
        "month": "December",
        "name": "Nome planta",
        "scientific_name": "Nome planta cientifico"
    }
}
```

---

#### 127.0.0.1:8000/api/search-plants [POST]

##### Retorna todas as plantas de acordo com os parâmetros (Caso vazio, retornam todas)

##### Parâmetros:
    -  bee (String) (Nullable)
    -  months (Array) (Nullable)

##### Exemplo:
```
{
    "months": [
        "February",
        "November"
    ]
}
```

##### Retorno:

```
{
    "message": "All Plants",
    "error": false,
    "code": 200,
    "results": [
        {
            "plant_name": "Sininho",
            "plant_scientific_name": "Abutilon megapotamicum",
            "bloom_month": "February",
            "bee_name": "Uruçu"
        },
        {
            "plant_name": "Acalifa-macarrão",
            "plant_scientific_name": "Acalypha hispida",
            "bloom_month": "November",
            "bee_name": "Iraí"
        },
        {
            "plant_name": "Rabo-de-gato",
            "plant_scientific_name": "Acalypha reptans",
            "bloom_month": "November",
            "bee_name": "Guarupu"
        }
    ]
}
```
