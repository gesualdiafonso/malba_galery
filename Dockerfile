FROM php:8.2-cli

WORKDIR /app
COPY . .

# Exponha a porta dinamicamente via variável de ambiente
EXPOSE 0

# Use o valor da variável de ambiente PORT fornecida pelo Render
CMD php -S 0.0.0.0:${PORT:-10000}