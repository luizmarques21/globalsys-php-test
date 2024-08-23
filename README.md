# Globalsys/Mambo PHP Teste

Este projeto foi desenvolvido como solução proposta ao desafio técnico do processo seletivo para a vaga de Desenvolvedor
PHP Sênior.

## Seção 1
### 1. Implementação de API REST

O projeto da API foi feito usando o framework PHP Laravel e os principais arquivos são:
```
/app/Http/Controllers/UserController.php
/app/Models/User.php
/routes/api.php
```

### 2. Refatoração de Código

O código refatorado foi implementado no arquivo ``calculateDiscount.php``

## Seção 2
### 1. Segurança

Para proteção contra SQL Injection, como a API foi feita em Laravel, o Eloquent ORM fornece metodos de consulta ao
banco que previne SQL Injection por padrão e no caso de execução de queries manuais, utilizaria Prepared Statements para
escapar os valores fornecidos pelo usuário.

Para proteção contra XSS, utilizaria funções de sanitização de entrada como ``htmlspecialchars()`` e configuraria políticas
de segurança CSP nos cabeçalhos HTTP.

Para proteção contra CSRF, utilizaria validação de tokens enviado via cabeçalho HTTP nas requisições e configuração de
politícas de CORS.

### 2. Testes Unitários

Os testes unitários estão implementados no arquivo ``/tests/Unit/CalculateDiscountTest.php`` e para executar basta
executar o comando abaixo:

```bash
vendor/bin/phpunit --testdox tests/Unit/CalculateDiscountTest.php
```

## Seção 3
### 1. Design Patterns

Para gerenciar as dependências da API eu utilizar o padrão Dependency Injection pois ele permite o desacoplamento entre
as classes facilitando a manutenção e evolução do código. Facilita também os testes unitários pois facilita a troca das
dependências por mocks durante os testes. Além disso permite que eu altere a implementação de uma dependência sem precisar
modificar as classes onde ela está sendo utilizada fazendo com que a API se torne mais flexível e extensível.

### 2. Arquitetura

Nesse caso, a arquitetura em microsserviços é o modelo ideal pois permite a separação de responsabilidades, a escalabilidade
independente e a flexibilidade na escolha de tecnologias para cada serviço. Considerando o projeto feito na seção 1 poderiamos
separar a aplicação em um serviço para o frontend, um serviço responsavel pela autenticação e autorização do usuário,
outro responsável pela coleta de dados e eventos para análises, relatórios e otimização, um serviço para implementar
funcionalidades de busca de alta performance e por assim em diante.

Para garantir a comunicação entre os microsserviços utilizaria um API Gateway e um serviço de mensageria como oRabbitMQ
ou o Amazon SQS. A depender da infra disponível, estratégias como BD distribuído, Bancos NoSQL e replicação são interessantes
para garantir a escalabilidade e disponibilidade das bases de dados.

Estrátegias de Cache são bastantes interessantes quando se consideram casos de alto uso e disponibilização de dados
acessados com frequência. HTTP Caching para as respostas da API, CDN para distribuição de conteúdo e Memcached para o
armazenamento de queries, sessões e dados de configuração são exemplos do que pode ser utilizado nesses casos.
