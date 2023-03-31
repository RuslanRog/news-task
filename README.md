

## Реалізована задача яка демонструє роботу функціонала API.
### Використовується два домени:
* http://news-view.loc
* http://news-api.loc

Використовується CodeIgniter 4.

На стороні API Використовується Eloquent ORM.

### Налаштування для http://news-api.loc
* Створення таблиць: php spark migrate
* Базу потрібно заповнити даними самостійно.

Переглянути роути: php spark route:list

### Роути для перевірки:
Отримання певної кількості новин:

http://news-view.loc/api/v1/language/ua/news/count/2/category/Футбол

Результат:

`[{"title_ua":"Новини про Бетхема","description_ua":"Довга історія про Бетхема"},{"title_ua":"Бетхем 2 з'явився на світ","description_ua":"Довга історія про Бетхема 2"}]`


Отримання конкретної новини (пошук по назві):

http://news-view.loc/api/v1/language/en/news/title/Bethem%20news%20today

Результат:

`[{"title_en":"Bethem news today","description_en":"Long story about Batham"}]`
