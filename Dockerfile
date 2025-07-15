FROM php:8.2-cli

# --- Instala driver PDO + headers do Postgres ---
RUN apt-get update \
 && apt-get install -y libpq-dev \
 && docker-php-ext-install pdo_pgsql

# --- Copia a aplicação ---
WORKDIR /app
COPY . .

# --- Porta dinâmica exigida pelo Render ---
EXPOSE 0

# Render injeta $PORT; localmente continua na 10000
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-10000} -t /app"]