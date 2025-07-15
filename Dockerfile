FROM php:8.2-cli-bullseye

# Instala driver do PostgreSQL
RUN apt-get update \
  && apt-get install -y libpq-dev \
  && docker-php-ext-install pdo_pgsql

# Define o diretório de trabalho
WORKDIR /app
COPY . .

# Expor porta usada pelo servidor PHP
EXPOSE 8080

# Start no modo servidor embutido
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/app"]
