```mermaid
graph TD

Cliente[Cliente]
Vendedor[Vendedor]

AirPlace[AirPlace Marketplace]

MySQL[(Banco de Dados MySQL)]
OpenAI[OpenAI API]

Cliente --> AirPlace
Vendedor --> AirPlace

AirPlace --> MySQL
AirPlace --> OpenAI
```
