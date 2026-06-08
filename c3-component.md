```mermaid
graph TD

Backend[Back-End PHP]

Login[Componente Login]

Cadastro[Componente Cadastro]

Produtos[Componente Produtos]

Carrinho[Componente Carrinho]

Pedidos[Componente Pedidos]

Banco[(MySQL)]

Backend --> Login
Backend --> Cadastro
Backend --> Produtos
Backend --> Carrinho
Backend --> Pedidos

Login --> Banco
Cadastro --> Banco
Produtos --> Banco
Carrinho --> Banco
Pedidos --> Banco
```
