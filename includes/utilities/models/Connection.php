<?php
class Connection 
{
    private const DB_HOST = 'localhost';
    private const DB_PORT = 5432;
    private const DB_USER = 'postgres';
    private const DB_PASS = 'postgres';
    private const DB_NAME = 'malba_db';

    private const DB_DSN = 'pgsql:host=' . self::DB_HOST .
        ';port=' . self::DB_PORT .
        ';dbname=' . self::DB_NAME .
        ';options=\'--client_encoding=UTF8\'';

    /** @var PDO */
    private static PDO $db;

    /**
     * Conecta (lazy-singleton) e devolve a instância PDO.
     */
    public static function getConnection(): PDO
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                /* Jogada corporativa™: logar o erro e evitar vazar detalhes sensíveis */
                error_log('DB connection failed: ' . $e->getMessage());
                die('Erro ao conectar no PostgreSQL.'); // mensagem genérica pro usuário
            }
        }
        return self::$db;
    }
}