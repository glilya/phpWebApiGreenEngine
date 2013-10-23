phpWebApiGreenEngine
====================

Server side php engine, work on [WebApi](http://en.wikipedia.org/wiki/Web_API "Wiki") standards.

Движок релизет интерфейc WebApi по следующему признаку:
    * Обходит директорию с контроллерами и получает список файлов
    * Фильтрует список, оставляя только нужные классы-контроллеры
    * Сравнивает строку запроса и назнание класса, если таковой найден рефлектором проверяются все условия успешности вызова (метод  и параметры)

Пример валидного метода (класс содержащий метод должен наследовать класс Controllers\Generic)
    /*
     * Внутренне описание класса
     *
     * @webApiMethodName Внешнее описание класса, выводится когда был присланг пустой запрос
     * @webApiHttp ANY [POST|GET|PUT|DELETE]
     * @WebApiParameters index:int name:string
     */
     public function MethodApiName ($index, $name) {
        // some code
     }
