# Azapfy Backend Invoice Control Challenge

Este projeto é parte do desafio técnico para a vaga de desenvolvedor backend na empresa Azapfy.

## Descrição

O objetivo deste projeto é desenvolver uma API REST para o controle de notas fiscais dos usuários. A API inclui funcionalidades como cadastro e login de usuários, CRUD para gerenciamento de notas fiscais, autenticação de usuários, validações de campos, envio de e-mails, e muito mais.

## Objetivo

O objetivo deste desafio é avaliar as habilidades dos candidatos na construção de uma API REST para o controle de notas fiscais. Serão considerados os seguintes critérios durante a avaliação:

- **Implementação Funcional:**
  - Desenvolvimento de endpoints para cadastro e login de usuários.
  - Implementação do CRUD para gerenciamento de notas fiscais.
  - Autenticação de usuários para acessar endpoints relacionados a notas fiscais.
  - Envio de e-mails para usuários ao criar uma nova nota fiscal.

- **Qualidade do Código:**
  - Adesão aos princípios SOLID.
  - Boas práticas de programação em PHP e Laravel.
  - Estruturação e organização do código.

- **Testes Automatizados:**
  - Desenvolvimento de testes unitários e/ou de integração.
  - Cobertura de testes adequada para garantir a robustez do código.

- **Documentação:**
  - Documentação clara e concisa para execução, instalação e teste do projeto.
  - Uso de ferramentas como Postman ou Swagger para documentação da API.

- **Utilização de Tecnologias Específicas:**
  - Correta utilização de PHP 8+, Laravel 10+ e MySQL.
  - Integração opcional com Docker para facilitar a configuração do ambiente.

- **Boas Práticas de Segurança:**
  - Implementação de validações adequadas para garantir a segurança dos dados.

## Pré-requisitos

Antes de começar, certifique-se de ter instalado as seguintes ferramentas, dependendo da sua escolha de configuração de ambiente:

### Para Configuração com Docker:

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

### Para Configuração Manual (Sem Docker):

- [PHP](https://www.php.net/) 8+
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/) 10+
- [MySQL](https://www.mysql.com/)

## Tecnologias Utilizadas

- [Laravel](https://laravel.com/) 10+
- [MySQL](https://www.mysql.com/)
- [Docker](https://www.docker.com/) (opcional, mas recomendado)
- [GitHub Actions](https://github.com/features/actions) (para execução de testes automáticos)
- [Postman](https://www.postman.com/) ou [Swagger](https://swagger.io/) (para documentação da API)

## Estrutura do Projeto

- `app/`: Contém os controladores, modelos e lógica de negócios.
- `database/`: Migrations e seeds para configuração do banco de dados.
- `routes/`: Define as rotas da API.
- `tests/`: Testes automatizados.
- `resources/`: Contém os recursos como notificações e transformações de dados.

## Instalação

### Instalação com Docker:

1. Clone o repositório
   ```bash
   git clone https://github.com/viniciusvasconcelosferreira/azapfy-backend-invoice-control-challenge.git
   ```

2. Entre no diretório do projeto
   ```bash
   cd azapfy-backend-invoice-control-challenge
   ```

3. Crie e inicie os contêineres Docker
   ```bash
   docker-compose up -d
   ```

4. Instale as dependências
   ```bash
   docker-compose exec app composer install
   ```

5. Execute as migrações e seeds
   ```bash
   docker-compose exec app php artisan migrate --seed
   ```

6. Acesse a API em `http://localhost:8000`

### Instalação Manual (Sem Docker):

1. Clone o repositório
   ```bash
   git clone https://github.com/viniciusvasconcelosferreira/azapfy-backend-invoice-control-challenge.git
   ```

2. Entre no diretório do projeto
   ```bash
   cd azapfy-backend-invoice-control-challenge
   ```

3. Instale as dependências
   ```bash
   composer install
   ```

4. Configure o ambiente
   ```bash
   cp .env.example .env
   ```
   - Configure o arquivo `.env` com suas configurações locais, como conexão com o banco de dados.

5. Execute as migrações e seeds
   ```bash
   php artisan migrate --seed
   ```

6. Inicie o servidor
   ```bash
   php artisan serve
   ```

7. Acesse a API em `http://localhost:8000`

## Testes Automatizados

### Testes com Docker:

1. Execute os testes usando o Docker Compose
   ```bash
   docker-compose exec app php artisan test
   ```

### Testes Manuais (Sem Docker):

1. Execute os testes
   ```bash
   php artisan test
   ```

## Documentação da API

A documentação da API pode ser encontrada em [Postman](link-postman) ou [Swagger](link-swagger).

## Contribuição

Sinta-se à vontade para contribuir com melhorias, correções de bugs ou novas funcionalidades. Crie um fork do repositório, faça suas alterações e envie um pull request.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
