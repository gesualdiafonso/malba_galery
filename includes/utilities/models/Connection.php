<?php
class Connection
{
    public static function getConnection(): PDO
    {
        $url = getenv('DATABASE_URL'); // vem do Render
        $dbparts = parse_url($url);

        $dsn = "pgsql:host={$dbparts['host']};port={$dbparts['port']};dbname=" . ltrim($dbparts['path'], '/');
        $user = $dbparts['user'];
        $pass = $dbparts['pass'];

        return new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}