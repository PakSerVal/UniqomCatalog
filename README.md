#Описание API

## Получить список автомобилей

`GET /api/get-cars`

#### Ответ

Код: `200`

Запрос успешно обработан

Содержимое ответа

```
[
  {
  	"id": int,
	"model": string,
	"brand": string
	"helm": string
  }
]
``` 

Пример

```
[
    {
        "id": 57,
        "model": "Corolla",
        "brand": "Toyota",
        "helm": "Правый руль"
    },
    {
        "id": 58,
        "model": "Prius",
        "brand": "Toyota",
        "helm": "Правый руль"
    },
    {
        "id": 59,
        "model": "Juke",
        "brand": "Nissan",
        "helm": "Левый руль"
    },
    {
        "id": 60,
        "model": "Corolla",
        "brand": "Toyota",
        "helm": "Правый руль"
    },
    {
        "id": 61,
        "model": "Prius",
        "brand": "Toyota",
        "helm": "Правый руль"
    }
]
```