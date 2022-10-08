<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cocks $model */

$this->title = 'Документация';
?>

<div class="tree-nav-body">
    <div class="tree-nav-header">
        <a href="#sidebar" class="u-none-md">
            <span class="icon">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </span>
        </a>
    </div>

    <div class="tree-nav" style="background: #f7f7f7;" id="sidebar">
        <div class="tree-nav-container">
            <div class="tree">
                <div class="tree-item">
                    <input type="checkbox" id="description" class="u-none" name="descriptionTree">
                    <label class="tree-item-header" for="description">
                        <span class="icon">
                            <i class="fa fa-chevron-right small" aria-hidden="true"></i>
                        </span>
                        Описание
                    </label>
                    <div class="tree-item-body">
                        <ul class="menu">
                            <li class="menu-item"><a href="#description-requests">Запросы</a></li>
                            <li class="menu-item"><a href="#description-responses">Ответы</a></li>
                            <li class="menu-item"><a href="#description-datetime">Дата и время</a></li>
                            <li class="menu-item"><a href="#description-pagination">Постраничная навигация</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tree-item">
                    <input type="checkbox" id="quickstart" class="u-none" name="quickstartTree">
                    <label class="tree-item-header" for="quickstart">
                        <span class="icon">
                            <i class="fa fa-chevron-right small" aria-hidden="true"></i>
                        </span>
                        Быстрый старт
                    </label>
                    <div class="tree-item-body">
                        <ul class="menu">
                            <li class="menu-item"><a href="#quickstart-setup">Установка</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tree-item">
                    <input type="checkbox" id="resources" class="u-none" name="resourcesTree">
                    <label class="tree-item-header" for="resources">
                        <span class="icon">
                            <i class="fa fa-chevron-right small" aria-hidden="true"></i>
                        </span>
                        Ресурсы
                    </label>
                    <div class="tree-item-body">
                        <ul class="menu">
                            <li class="menu-item"><a href="#resources-employees">Сотрудники</a></li>
                            <li class="menu-item"><a href="#resources-meetings">Собрания</a></li>
                            <li class="menu-item"><a href="#resources-appointments">Связи между сотрудниками и
                                    собраниями</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tree-item">
                    <input type="checkbox" id="endpoints" class="u-none" name="endpointsTree">
                    <label class="tree-item-header" for="endpoints">
                        <span class="icon">
                            <i class="fa fa-chevron-right small" aria-hidden="true"></i>
                        </span>
                        Конечные точки
                    </label>
                    <div class="tree-item-body">
                        <ul class="menu">
                            <li class="menu-item"><a href="#endpoints-employees">/employees</a></li>
                            <li class="menu-item"><a href="#endpoints-meetings">/meetings</a></li>
                            <li class="menu-item"><a href="#endpoints-appointments">/appointments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#sidebar-close" id="sidebar-close" class="tree-nav-close"></a>

    <div class="tree-nav-content">
        <h1>API о сотрудниках, собраниях и расписаниях</h1>
        <hr>

        Основываясь на принципах REST, этот API предоставляет конечные точки для операций над сотрудниками, собраниями и
        для
        составления расписаний для сотрудников. <br>

        <h2>Описание</h2>
        <h5 id="description-requests">Запросы</h5>
        Доступ к ресурсам может быть получен через стандартные HTTP запросы в формате UTF-8, отправленные к нужной
        конечной точке.<br>
        Для каждой операции API использует соответствующие HTTP методы:
        <div class="table-container">
            <table class="table small">
                <thead>
                    <tr>
                        <th>Метод</th>
                        <th>Операция</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><samp class="tag tag--info">GET</samp></td>
                        <td>Получить ресурс</td>
                    </tr>
                    <tr>
                        <td><samp class="tag tag--success">POST</samp></td>
                        <td>Создать ресурс</td>
                    </tr>
                    <tr>
                        <td><samp class="tag tag--warning">PATCH</samp></td>
                        <td>Изменить ресурс</td>
                    </tr>
                    <tr>
                        <td><samp class="tag tag--danger">DELETE</samp></td>
                        <td>Удалить ресурс</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h5 id="description-responses">Ответы</h5>
        Ответы содержат JSON объект. Документация конечных точек описывает типичные ответы от каждой из них.

        <h5 id="description-datetime">Дата и время</h5>
        Даты имеют формат <code>ГГГГ-ММ-ДД</code>. Время имеет формат <code>ЧЧ:ММ:СС</code> или <code>ЧЧ:ММ</code>.

        <h5 id="description-pagination">Постраничная навигация</h5>
        Конечные точки, возвращающие коллекции ресурсов, автоматически разбиваются на страницы.<br>
        Одна страница содержит 20 ресурсов. Нумерация страниц начинается с 1.<br>
        Можно выбирать страницу, добавляя параметр запроса <code>page</code>:
        <pre><code>http://meetings.test/v1/appointments?page=2</code></pre>
        Информация о пагинации включена в HTTP ответ в следующих заголовках:
        <div class="table-container">
            <table class="table small">
                <thead>
                    <tr>
                        <th>Заголовок</th>
                        <th>Описание</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><samp>X-Pagination-Total-Count</samp></td>
                        <td>Общее количество ресурсов</td>
                    </tr>
                    <tr>
                        <td><samp>X-Pagination-Page-Count</samp></td>
                        <td>Количество страниц</td>
                    </tr>
                    <tr>
                        <td><samp>X-Pagination-Current-Page</samp></td>
                        <td>Номер текущей страницы</td>
                    </tr>
                    <tr>
                        <td><samp>X-Pagination-Per-Page</samp></td>
                        <td>Количество ресурсов на одну страницу</td>
                    </tr>
                    <tr>
                        <td><samp>Link</samp></td>
                        <td>Список навигационных ссылок для всех страниц</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>

        <h2>Быстрый старт</h2>
        <h5 id="quickstart-setup">Установка</h5>
        <ol>
            <li>Откройте командную строку в папке приложения и запустите следующую команду, чтобы установить необходимые
                расширения:
                <pre><code>composer install</code></pre>
                Затем запустите следующую команду, чтобы проверить требования:
                <pre><code>php requirements.php</code></pre>
            </li>
            <li>Откройте файл <code>config/db.php</code> и измените параметры на верные для вашей базы данных.<br>
                По умолчанию этот файл содержит следующее:
                <pre><code>&lt;?php
    
    return [
        &apos;class&apos; =&gt; &apos;yii\db\Connection&apos;,
        &apos;dsn&apos; =&gt; &apos;mysql:host=127.0.0.1;dbname=meeting_schedule_service&apos;,
        &apos;username&apos; =&gt; &apos;root&apos;,
        &apos;password&apos; =&gt; &apos;&apos;,
        &apos;charset&apos; =&gt; &apos;utf8&apos;,
    ];</code></pre>
            </li>
            <li>Подключите приложение к вашему серверу Apache или Nginx.<br>
                Создайте для него виртуальный хост с именем
                <code>meetings.test</code>.
            </li>
            <li>Запустите сервер и проверьте подключение, открыв адрес <code>http://meetings.test/</code></li>
        </ol>
        <hr>

        <h2>Ресурсы</h2>

        <h5 id="resources-employees">Сотрудники</h5>
        Каждый сотрудник имеет имя и должность.<br>
        С каждым сотрудником связаны собрания, на которые он назначен.<br>
        Для каждого сотрудника можно составить расписание на указанный день, при котором он сможет посетить максимальное количество собраний.<br>
        <br>
        Структура:
        <div class="table-container">
            <table class="table small">
                <thead>
                    <tr>
                        <th>Поле</th>
                        <th>Тип данных</th>
                        <th>Описание</th>
                        <th>Правила</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><samp>id</samp></td>
                        <td><samp>int</samp></td>
                        <td>ID сотрудника.</td>
                        <td>Заполняется автоматически.</td>
                    </tr>
                    <tr>
                        <td><samp>name</samp></td>
                        <td><samp>string</samp></td>
                        <td>Полное имя сотрудника.</td>
                        <td>Обязательно.</td>
                    </tr>
                    <tr>
                        <td><samp>title</samp></td>
                        <td><samp>string</samp></td>
                        <td>Должность сотрудника.</td>
                        <td>Необязательно.</td>
                    </tr>
                    <tr>
                        <td><samp>meetings</samp></td>
                        <td><samp>array</samp></td>
                        <td>Список собраний, на которые назначен сотрудник.</td>
                        <td>По умолчанию скрыто.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h5 id="resources-meetings">Собрания</h5>
        Каждое собрание имеет дату, время начала, время конца и тему.<br>
        С каждым собранием связаны сотрудники, которые на него назначены.<br>
        <br>
        Структура:
        <div class="table-container">
            <table class="table small">
                <thead>
                    <tr>
                        <th>Поле</th>
                        <th>Тип данных</th>
                        <th>Описание</th>
                        <th>Правила</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><samp>id</samp></td>
                        <td><samp>int</samp></td>
                        <td>ID собрания.</td>
                        <td>Заполняется автоматически.</td>
                    </tr>
                    <tr>
                        <td><samp>date</samp></td>
                        <td><samp>string</samp></td>
                        <td>Дата собрания.</td>
                        <td>Обязательно.</td>
                    </tr>
                    <tr>
                        <td><samp>start_time</samp></td>
                        <td><samp>string</samp></td>
                        <td>Время начала собрания.</td>
                        <td>Обязательно. Не может быть позже конца.</td>
                    </tr>
                    <tr>
                        <td><samp>end_time</samp></td>
                        <td><samp>string</samp></td>
                        <td>Время конца собрания.</td>
                        <td>Обязательно.</td>
                    </tr>
                    <tr>
                        <td><samp>topic</samp></td>
                        <td><samp>string</samp></td>
                        <td>Тема собрания.</td>
                        <td>Необязательно.</td>
                    </tr>
                    <tr>
                        <td><samp>employees</samp></td>
                        <td><samp>array</samp></td>
                        <td>Список сотрудников, которые назначены на собрание.</td>
                        <td>По умолчанию скрыто.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h5 id="resources-appointments">Связи между сотрудниками и собраниями</h5>
        Связующие звенья между сотрудниками и собраниями.<br>
        Каждая связь соединяет одного сотрудника и одно собрание.<br>
        Один сотрудник может быть связан со многими собраниями, а собрание - со многими сотрудниками.<br>
        <br>
        Структура:
        <div class="table-container">
            <table class="table small">
                <thead>
                    <tr>
                        <th>Поле</th>
                        <th>Тип данных</th>
                        <th>Описание</th>
                        <th>Правила</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><samp>meeting_id</samp></td>
                        <td><samp>int</samp></td>
                        <td>ID собрания.</td>
                        <td>Обязательно.</td>
                    </tr>
                    <tr>
                        <td><samp>employee_id</samp></td>
                        <td><samp>int</samp></td>
                        <td>ID сотрудника.</td>
                        <td>Обязательно.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr>

        <h2>Конечные точки</h2>
        Базовый адрес для всех запросов - <code>http://meetings.test/v1</code>.

        <h5>Параметры запроса</h5>
        К каждому запросу можно добавить параметры для пагинации, фильтрации и сортировки коллекций, а также для скрытия
        и
        добавления полей ресурсов:
        <div class="table-container">
            <table class="table small">
                <thead>
                    <tr>
                        <th>Параметр</th>
                        <th>Описание</th>
                        <th>Пример</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><samp>page</samp></td>
                        <td>Переносит на заданную страницу.</td>
                        <td><code>http://meetings.test/v1/appointments?page=3</code></td>
                    </tr>
                    <tr>
                        <td><samp>filter[{field}][{control}]</samp></td>
                        <td>Фильтрует коллекцию и возвращает только те ресурсы,
                            <br>в которых поля соответствуют условию.<br>
                            По умолчанию проверяет на равенство, но можно<br>
                            указать другие операторы в {control}. (<a
                                href="https://www.yiiframework.com/doc/api/2.0/yii-data-datafilter#$filterControls-detail">Доступные
                                операторы</a>)
                        </td>
                        <td><code>http://meetings.test/v1/meetings?filter[start_time]=03:00:00</code><br>
                            <code>http://meetings.test/v1/appointments?filter[employee_id][gt]=3</code>
                        </td>
                    </tr>
                    <tr>
                        <td><samp>sort</samp></td>
                        <td>Сортирует коллекцию по заданному полю.</td>
                        <td><code>http://meetings.test/v1/meetings?sort=date</code></td>
                    </tr>
                    <tr>
                        <td><samp>fields</samp></td>
                        <td>Скрывает из ресурсов все поля кроме заданных.<br>
                            Поля перечисляются через запятую без пробелов.</td>
                        <td><code>http://meetings.test/v1/employees?fields=name,title</code></td>
                    </tr>
                    <tr>
                        <td><samp>expand</samp></td>
                        <td>Добавляет в ресурсы поля, которые по умолчанию скрыты.</td>
                        <td><code>http://meetings.test/v1/employees?expand=meetings</code><br>
                            <code>http://meetings.test/v1/meetings?expand=employees</code>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h5 id="endpoints-employees">/employees</h5>
        Позволяет выполнять CRUD-операции над сотрудниками, а также составлять расписания.<br>
        Ресурс имеет скрытое поле <code>meetings</code>, которое можно добавить параметром <code>expand</code>.<br>
        <br>
        <samp><span class="tag tag--info">GET</span> /employees</samp> - вывод списка всех сотрудников.<br>
        Пример ответа:
        <pre><code><small>[<br>&nbsp; &nbsp; {<br>&nbsp; &nbsp; &nbsp; &nbsp; &quot;id&quot;: 1,<br>&nbsp; &nbsp; &nbsp; &nbsp; &quot;name&quot;: &quot;Otto Hastie&quot;,<br>&nbsp; &nbsp; &nbsp; &nbsp; &quot;title&quot;: &quot;Analog Circuit Design manager&quot;<br>&nbsp; &nbsp; },<br>&nbsp; &nbsp; {<br>&nbsp; &nbsp; &nbsp; &nbsp; &quot;id&quot;: 2,<br>&nbsp; &nbsp; &nbsp; &nbsp; &quot;name&quot;: &quot;Cornelius Slyde&quot;,<br>&nbsp; &nbsp; &nbsp; &nbsp; &quot;title&quot;: &quot;Teacher&quot;<br>&nbsp; &nbsp; },<br>&nbsp; &nbsp; {<br>&nbsp; &nbsp; &nbsp; &nbsp; &quot;id&quot;: 3,<br>&nbsp; &nbsp; &nbsp; &nbsp; &quot;name&quot;: &quot;Vinny Pizzapasta&quot;,<br>&nbsp; &nbsp; &nbsp; &nbsp; &quot;title&quot;: &quot;VP Quality Control&quot;<br>&nbsp; &nbsp; }<br>]</small></code></pre>
        <br>

        <samp><span class="tag tag--info">GET</span> /employees/{id}</samp> - вывод сотрудника по <code>{id}</code>.<br>
        Пример запроса: <code>http://meetings.test/v1/employees/4?expand=meetings</code><br>
        Пример ответа:
        <pre><code><small>{<br>    &quot;id&quot;: 4,
        &quot;name&quot;: &quot;Vinny Pizzapasta&quot;,
        &quot;title&quot;: &quot;VP Quality Control&quot;,
        &quot;meetings&quot;: [
            {
                &quot;id&quot;: 63,
                &quot;date&quot;: &quot;2022-10-07&quot;,
                &quot;start_time&quot;: &quot;01:00:00&quot;,
                &quot;end_time&quot;: &quot;02:00:00&quot;,
                &quot;topic&quot;: &quot;Commercial distribution&quot;
            }
        ]
    }</small></code></pre>
        <br>

        <samp><span class="tag tag--success">POST</span> /employees</samp> - создание нового сотрудника.<br>
        Пример тела запроса:
        <pre><code><small>{<br>    &quot;name&quot;: &quot;Alexander Hamilton&quot;,
        &quot;title&quot;: &quot;Secretary&quot;
    }</small></code></pre><br>

        <samp><span class="tag tag--warning">PATCH</span> /employees/{id}</samp> - обновление информации о сотруднике по
        <code>{id}</code>.<br>
        Пример тела запроса:
        <pre><code><small>{<br>    &quot;title&quot;: &quot;Accountant&quot;
    }</small></code></pre><br>

        <samp><span class="tag tag--danger">DELETE</span> /employees/{id}</samp> - удаление сотрудника по
        <code>{id}</code>.<br>
        <br>

        <samp><span class="tag tag--info">GET</span> /employees/{id}/build-schedule?date={date}</samp> - составление
        расписания для
        сотрудника по <code>{id}</code> в день <code>{date}</code>.<br>
        Пример запроса: <code>http://meetings.test/v1/employees/4/build-schedule?date=2022-10-07</code><br>
        Пример ответа:
        <pre><code><small>[<br>    {
            &quot;id&quot;: 63,
            &quot;date&quot;: &quot;2022-10-07&quot;,
            &quot;start_time&quot;: &quot;01:00:00&quot;,
            &quot;end_time&quot;: &quot;02:00:00&quot;,
            &quot;topic&quot;: &quot;Commercial distribution&quot;
        },
        {
            &quot;id&quot;: 64,
            &quot;date&quot;: &quot;2022-10-07&quot;,
            &quot;start_time&quot;: &quot;02:00:00&quot;,
            &quot;end_time&quot;: &quot;04:00:00&quot;,
            &quot;topic&quot;: &quot;Money&quot;
        },
        {
            &quot;id&quot;: 67,
            &quot;date&quot;: &quot;2022-10-07&quot;,
            &quot;start_time&quot;: &quot;05:00:00&quot;,
            &quot;end_time&quot;: &quot;06:00:00&quot;,
            &quot;topic&quot;: &quot;Small talk&quot;
        }
    ]</small></code></pre>
        <br>
        <br>

        <h5 id="endpoints-meetings">/meetings</h5>
        Позволяет выполнять CRUD-операции над собраниями.<br>
        Ресурс имеет скрытое поле <code>employees</code>, которое можно добавить параметром <code>expand</code>.<br>
        <br>
        <samp><span class="tag tag--info">GET</span> /meetings</samp> - вывод списка всех собраний.<br>
        Пример ответа:
        <pre><code><small>[<br>    {
            &quot;id&quot;: 62,
            &quot;date&quot;: &quot;2022-10-07&quot;,
            &quot;start_time&quot;: &quot;00:00:00&quot;,
            &quot;end_time&quot;: &quot;04:00:00&quot;,
            &quot;topic&quot;: &quot;Business business&quot;
        },
        {
            &quot;id&quot;: 63,
            &quot;date&quot;: &quot;2022-10-07&quot;,
            &quot;start_time&quot;: &quot;01:00:00&quot;,
            &quot;end_time&quot;: &quot;02:00:00&quot;,
            &quot;topic&quot;: &quot;Commercial distribution&quot;
        },
        {
            &quot;id&quot;: 64,
            &quot;date&quot;: &quot;2022-10-07&quot;,
            &quot;start_time&quot;: &quot;02:00:00&quot;,
            &quot;end_time&quot;: &quot;04:00:00&quot;,
            &quot;topic&quot;: &quot;Money&quot;
        }
    ]</small></code></pre>
        <br>

        <samp><span class="tag tag--info">GET</span> /meetings/&ltid&gt</samp> - вывод собрания по
        <code>{id}</code>.<br>
        Пример запроса: <code>http://meetings.test/v1/meetings/69?expand=employees</code><br>
        Пример ответа:
        <pre><code><small>{<br>    &quot;id&quot;: 69,
        &quot;date&quot;: &quot;2022-10-07&quot;,
        &quot;start_time&quot;: &quot;06:00:00&quot;,
        &quot;end_time&quot;: &quot;07:00:00&quot;,
        &quot;topic&quot;: &quot;Rooter: A Methodology for the Typical Unification of Access Points and Redundancy&quot;,
        &quot;employees&quot;: [
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Leland Gaskell&quot;,
                &quot;title&quot;: &quot;VP Quality Control&quot;
            }
        ]
    }</small></code></pre>
        <br>

        <samp><span class="tag tag--success">POST</span> /meetings</samp> - создание нового собрания.<br>
        Пример тела запроса:
        <pre><code><small>{<br>    &quot;start_time&quot;: &quot;08:00&quot;,
        &quot;end_time&quot;: &quot;10:00&quot;,
        &quot;date&quot;: &quot;2022-10-07&quot;,
        &quot;topic&quot;: &quot;Important attend ALL&quot;,
        &quot;employees&quot;: [
            {
                &quot;id&quot;: 2
            },
            {
                &quot;name&quot;: &quot;Babb Ferens&quot;
            },
            {
                &quot;id&quot;: 4
            }
        ]
    }</small></code></pre>
        <br>

        <samp><span class="tag tag--warning">PATCH</span> /meetings/&ltid&gt</samp> - обновление информации о собрании
        по
        <code>{id}</code>.<br>
        Пример тела запроса:
        <pre><code><small>{
        &quot;date&quot;: &quot;2022-10-07&quot;,
        &quot;topic&quot;: &quot;Not very important tbh&quot;
    }</small></code></pre>
        <br>

        <samp><span class="tag tag--danger">DELETE</span> /meetings/&ltid&gt</samp> - удаление собрания по
        <code>{id}</code>.<br>
        <br>

        <h5 id="endpoints-appointments">/appointments</h5>
        Позволяет выполнять операции над связями между сотрудниками и собраниями.<br>

        <samp><span class="tag tag--info">GET</span> /appointments</samp> - вывод списка всех связей.<br>
        Пример ответа:
        <pre><code><small>[<br>    {
            &quot;meeting_id&quot;: 62,
            &quot;employee_id&quot;: 4
        },
        {
            &quot;meeting_id&quot;: 62,
            &quot;employee_id&quot;: 6
        },
        {
            &quot;meeting_id&quot;: 64,
            &quot;employee_id&quot;: 4
        }
    ]</small></code></pre>
        <br>

        <samp><span class="tag tag--success">POST</span> /appointments</samp> - создание новой связи.<br>
        Пример тела запроса:
        <pre><code><small>{<br>    &quot;meeting_id&quot;: 21,
        &quot;employee_id&quot;: 2
    }</small></code></pre>
        <br>
        <hr>
        <br>
        Титов Анатолий 2022
    </div>
</div>