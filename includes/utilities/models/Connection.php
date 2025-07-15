<?php
class Connection
{
    public static function getConnection(): PDO
    {
        $url = getenv('DATABASE_URL');

        if (!$url) {
            throw new Exception("DATABASE_URL não definido.");
        }

        $dbparts = parse_url($url);

        $host = $dbparts['host'] ?? 'localhost';
        $port = $dbparts['port'] ?? 5432;
        $dbname = ltrim($dbparts['path'], '/');
        $user = $dbparts['user'];
        $pass = $dbparts['pass'];

        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

        return new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
}