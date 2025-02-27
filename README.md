# Sistema de Gerenciamento de Biblioteca

Este projeto é um sistema simples para gerenciamento de uma biblioteca, desenvolvido para permitir o CRUD de usuários e livros, classificação de livros por gênero e funcionalidades de empréstimo de livros.

## Funcionalidades

- **CRUD de Usuários**:
  - Campos obrigatórios: Nome, Email, Número de Cadastro.
- **CRUD de Livros**:
  - Campos obrigatórios: Nome, Autor, Número de Registro, Situação (Emprestado ou Disponível).
- **Classificação de Livros por Gênero**:
  - Gêneros disponíveis: Ficção, Romance, Fantasia, Aventura, etc.
- **Funcionalidade de Empréstimo**:
  - Cadastrar novo empréstimo para um usuário com data de devolução.
  - Opção de marcar o empréstimo como Atrasado ou Devolvido.

## Pré-requisitos

Antes de começar, certifique-se de que você tem os seguintes softwares instalados em sua máquina:

- **Docker**: [Guia de instalação do Docker](https://docs.docker.com/get-docker/)
- **Docker Compose**: [Guia de instalação do Docker Compose](https://docs.docker.com/compose/install/)

## Como Executar o Projeto

Siga os passos abaixo para configurar e executar a aplicação:

### 1. Clone o Repositório

Primeiro, clone o repositório para o seu ambiente local:

```bash
git clone https://github.com/HENQ42/laravel-test.git
cd laravel-test
```

### 2. Configure o Ambiente

O projeto utiliza o Docker Compose para gerenciar os contêineres. Certifique-se de que o Docker e o Docker Compose estão instalados e funcionando corretamente.

### 3. Execute o Docker Compose

Na raiz do projeto, execute o seguinte comando para iniciar os contêineres:

```bash
sudo docker compose up
```

Este comando irá:
- Construir as imagens Docker necessárias.
- Iniciar os contêineres para o banco de dados e a aplicação.
- Expor a aplicação na porta configurada `8000`.

### 4. Acesse a Aplicação

Após o Docker Compose terminar de inicializar os contêineres, você pode acessar a aplicação no seu navegador:

- **Frontend**: `http://localhost:8000`.

### 5. Parar a Aplicação

Para parar a aplicação e os contêineres, pressione `Ctrl + C` no terminal onde o Docker Compose está rodando ou execute:

```bash
sudo docker compose down
```