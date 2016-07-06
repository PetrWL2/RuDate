# RuDate
Класс для форматирования даты на русском языке

###Пример:
```
RuDate::create('21-06-2016')->format(); // Сегодня в 00:00
RuDate::create('20-06-2016 10:22:33')->format(); // Вчера в 10:22
RuDate::create('19-06-2016 10:22:33')->format(); // 19 июня в 10:22
```

##Установка
Установка через composer, composer.json:

```
{
    "require": {
        "petrschegolskov/rudate":"dev-master"
    },
    "repositories":[
        {
            "type":"git",
            "url":"https://github.com/PetrSchegolskov/RuDate"
        }
    ]
}
```

## Альтернативные методы:

Для вывода даты на русском языке можно использовать стандартную функцию strftime, установив локаль: 

```
setlocale(LC_ALL, 'ru_RU.UTF-8');
strftime('%e %b. %A. в %H:%M', strtotime( $date ))
```

Можно стандартным php модулем intl

```
$formatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
$formatter->setPattern('d MMMM');
echo $formatter->format(new DateTime()); // 22 января
echo $formatter->format(new DateTime('05-03-2013')); // 5 марта
```

Ссылки:
```
http://php.net/strftime
https://php.ru/forum/threads/data-na-russkom-jazyke.37809/
https://toster.ru/q/32933
```
