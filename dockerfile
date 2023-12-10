# Use a imagem PHP oficial com o servidor embutido
FROM php:7.4-cli

# Copie os arquivos da aplicação para o contêiner
COPY . /var/www/html

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Instale as dependências necessárias (se houver)
# Exemplo: RUN apt-get update && apt-get install -y dependencia1 dependencia2

# Exponha a porta 80 para o servidor web embutido do PHP
EXPOSE 80

# Comando para iniciar o servidor web embutido do PHP
CMD ["php", "-S", "0.0.0.0:80"]
