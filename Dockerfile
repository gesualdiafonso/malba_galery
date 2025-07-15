FROM php:8.2-cli-alpine

# Instala driver do PostgreSQL
RUN apt-get update \
 && apt-get install -y libpq-dev \
 && docker-php-ext-install pdo_pgsql

# Define o diretório de trabalho
WORKDIR /app
COPY . .

# Expor a porta 8080 — padrão da Render
EXPOSE 8080

# Força o uso da porta padrão da Render
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/app", "index.php"]
