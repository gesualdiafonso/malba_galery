# Usa imagem base do PHP com CLI
FROM php:8.2-cli

# Instala dependências do PostgreSQL + extensões PDO
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Define diretório de trabalho no container
WORKDIR /app

# Copia todos os arquivos do projeto para o container
COPY . .

# Exponha a porta (Render escuta por padrão na 10000)
EXPOSE 10000

# Comando para rodar o PHP embutido
CMD ["php", "-S", "0.0.0.0:10000"]