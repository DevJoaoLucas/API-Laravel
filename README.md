# CRUD API em Laravel

## Tecnologias Utilizadas

- **Laravel**: framework de PHP para desenvolvimento de aplicações web.
- **Postman**: Ferramenta para teste de APIs.
- **MySQL**: Sistema de gerenciamento de banco de dados utilizado para armazenar dados da aplicação.

## Descrição

Projeto desenvolvido para aprender sobre a criação de APIs RESTful utilizando Laravel. A API permite operações básicas de CRUD (Criar, Ler, Atualizar e Deletar) para um modelo de `Produto`.

## Funcionalidades

- **Listar Produtos**: 
  - **Método**: `GET /api/produtos`
  - **Descrição**: Retorna todos os produtos cadastrados.

- **Criar Produto**: 
  - **Método**: `POST /api/produtos`
  - **Descrição**: Cria um novo produto. 
  - **Campos**: 
    - `nome`: string (obrigatório)
    - `preco`: número (obrigatório, deve ser maior ou igual a 0)
    - `quantidade`: inteiro (obrigatório, deve ser maior ou igual a 0)
    - `fornecedor`: string (obrigatório, deve ter exatamente 3 dígitos)
  - **Validações**: Retorna mensagens de erro caso as validações não sejam atendidas.

- **Mostrar Produto**: 
  - **Método**: `GET /api/produtos/{id}`
  - **Descrição**: Retorna um produto específico pelo ID.

- **Atualizar Produto**: 
  - **Método**: `PUT /api/produtos/{id}`
  - **Descrição**: Atualiza os dados de um produto existente.
  - **Permite**: Atualização de campos individualmente.

- **Deletar Produto**: 
  - **Método**: `DELETE /api/produtos/{id}`
  - **Descrição**: Remove um produto pelo ID.
  - **Resposta**: Retorna uma mensagem de sucesso ou falha.


## Instalação
1. Clonar o repositório:
    `git clone https://github.com/DevJoaoLucas/API-Laravel.git`
    `cd API-Laravel`

2. Instalar Dependências
    `composer install`

3. Configurar o ambiente
  `cp .env.example .env`

4. Gere a chave do app
    `php artisan key:generate`

5.Executar Migrações
    `php artisan migrate`
6. Iniciar o Servidor local:
    `php artisan serve`
