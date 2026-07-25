# Template Zabbix - Veeam Backup & Replication 13 (HTTP API)

## Visão Geral

Este template realiza o monitoramento do **Veeam Backup & Replication 13** utilizando a **REST API** oficial do produto.

A coleta é realizada diretamente via **HTTP Agent** do Zabbix, dispensando a instalação de agentes adicionais no servidor Veeam.

Atualmente o template contempla:

- Autenticação automática via API (Bearer Token)
- Descoberta e monitoramento dos Jobs
- Descoberta e monitoramento dos Repositórios (Repositories)
- Coleta de informações do servidor Veeam

---

# Requisitos

- Zabbix 7.2 ou superior
- Veeam Backup & Replication 13
- REST API habilitada
- Usuário com permissão de leitura na API

Permissões mínimas recomendadas:

- Veeam Backup Viewer

ou superior.

---

# Endpoints utilizados

## Jobs

O template utiliza o endpoint abaixo para obter o estado de todos os Jobs.

```
GET /api/v1/jobs/states
```

Descrição oficial:

> Obtém o estado de todos os Jobs cadastrados no Veeam Backup & Replication.

As informações retornadas incluem:

- Nome do Job
- Status
- Última execução
- Próxima execução
- Resultado da última execução
- Duração
- Taxa de processamento
- Percentual
- Volume processado
- Volume transferido
- Repositório utilizado
- Tipo do Job

Permissões necessárias:

- Veeam Backup Administrator
- Veeam Backup Operator
- Veeam Restore Operator
- Veeam Tape Operator
- Veeam Backup Viewer
- Veeam Security Administrator

---

## Repositórios

Para monitoramento dos repositórios é utilizado:

```
GET /api/v1/backupInfrastructure/repositories/states
```

Descrição oficial:

> Obtém o estado de todos os repositórios cadastrados no ambiente.

As informações incluem:

- Nome
- Localização
- Espaço Total
- Espaço Utilizado
- Espaço Livre
- Percentual de utilização
- Estado do repositório

Permissões necessárias:

- Veeam Backup Administrator
- Veeam Backup Operator
- Veeam Restore Operator
- Veeam Backup Viewer
- Veeam Tape Operator

---

# Estrutura do Template

O template possui atualmente quatro itens principais.

| Item | Descrição |
|------|-----------|
| VBR Get Token | Obtém e renova automaticamente o Bearer Token |
| VBR Get Jobs | Consulta todos os Jobs |
| VBR Get Repositories | Consulta todos os Repositórios |
| VBR Get ServerInfo | Consulta informações gerais do servidor |

---

# Autenticação

A autenticação é realizada automaticamente através da API do Veeam.

Fluxo:

```
Zabbix
    │
    ▼
Solicita Token
    │
    ▼
REST API Veeam
    │
    ▼
Bearer Token
    │
    ▼
Consultas HTTP Agent
```

O token é renovado automaticamente pelo template.

---

# Pré-processamento

Grande parte das informações retornadas pela API são convertidas para facilitar a utilização em dashboards e triggers.

Exemplos:

## Última execução

Entrada:

```
2026-07-24T22:00:15.057882-03:00
```

Pode ser convertida para:

- Timestamp Unix
- Tempo desde a última execução

---

## Duração

Entrada:

```
00:11:48
```

Convertida para:

```
708 segundos
```

Permitindo:

- gráficos
- médias
- triggers de backup demorado

---

## Taxa de processamento

Entrada:

```
536,9 MB/s
```

Convertida para:

```
536.9
```

Armazenada como **Numeric (Float)** em MB/s.

---

# Possíveis evoluções

O template foi desenvolvido de forma modular, permitindo adicionar facilmente novos monitoramentos da API, como por exemplo:

- Backup Copy Jobs
- Backup Sessions
- Agents
- NAS Backup
- SureBackup
- Scale-Out Backup Repository
- Proxies
- Backup Infrastructure
- Licenciamento
- Alarmes
- Capacity Tier
- Object Storage

---

# Objetivo

Disponibilizar um template simples, leve e totalmente baseado na REST API oficial do Veeam, facilitando a criação de dashboards, gráficos e alertas dentro do Zabbix, sem necessidade de scripts externos ou agentes adicionais.
