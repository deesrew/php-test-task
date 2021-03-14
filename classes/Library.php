<?php

class Library
{
    /**
     * Запрос
     *
     * @var string
     */
    private const QUERY = 'SELECT name FROM author WHERE id IN (SELECT author_id FROM book_author GROUP BY author_id HAVING count(author_id) < 7)';

    /**
     * Выводим авторов
     */
    public static function getAuthorsFromQuery(): void
    {
        $db = Db::getConnection();
        $result = $db->query(self::QUERY);

        while ($row = $result->fetch()) {
            echo $row['name'] . "\n";
        }
    }
}