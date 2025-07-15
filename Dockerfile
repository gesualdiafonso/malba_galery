# Usa imagem oficial do PHP
FROM php:8.2-cli

# Define a pasta onde seu app vai rodar
WORKDIR /app

# Copia tudo da pasta atual pro container
COPY . .

# Expõe a porta 10000
EXPOSE 10000

# Comando para iniciar o servidor embutido do PHP
CMD ["php", "-S", "0.0.0.0:10000"]