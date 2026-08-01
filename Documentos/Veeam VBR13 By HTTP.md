# Template Zabbix - Veeam Backup & Replication 13 (HTTP API)

## Visão Geral

O **Veeam VBR13 By HTTP** é um template para monitoramento do **Veeam Backup & Replication 13** utilizando exclusivamente a **REST API oficial** do produto.

O template foi desenvolvido para funcionar através de **HTTP Agent**, eliminando a necessidade de instalar agentes adicionais ou executar scripts externos.

## Funcionalidades

Atualmente o template contempla:

- ✅ Autenticação automática via Bearer Token
- ✅ Descoberta automática (LLD) dos Jobs
- ✅ Descoberta automática (LLD) dos Repositórios
- ✅ Informações gerais do servidor Veeam
- ✅ Informações da licença
- ✅ Coleta de métricas de execução dos Jobs
- ✅ Coleta de utilização dos Repositórios

---

# Requisitos

- Zabbix 7.2 ou superior
- Veeam Backup & Replication 13
- REST API habilitada
- Usuário com permissão de leitura na API

Permissões mínimas recomendadas:

- **Veeam Backup Viewer**

ou qualquer perfil superior.

---

# Estrutura do Template

## Itens principais

| Item | Descrição |
|------|-----------|
| VBR Get/Update Token | Obtém e renova automaticamente o Bearer Token |
| VBR Get Jobs | Consulta todos os Jobs |
| VBR Get Repositories | Consulta todos os Repositórios |
| VBR Get ServerInfo | Consulta informações gerais do servidor |
| VBR Get License: Expiration Date | Consulta a data de expiração da licença |

---

## Regras de Descoberta (LLD)

O template realiza descoberta automática para:

- Jobs
- Repositórios

Não é necessário criar itens manualmente para novos Jobs ou novos Repositórios.

---

# Endpoints utilizados

## Jobs

```
GET /api/v1/jobs/states
```

Obtém o estado de todos os Jobs cadastrados no ambiente.

Informações coletadas:

- Nome
- Tipo
- Status
- Última execução
- Próxima execução
- Resultado da última execução
- Duração
- Percentual
- Taxa de processamento
- Volume processado
- Volume transferido
- Repositório utilizado

Permissões aceitas:

- Veeam Backup Administrator
- Veeam Backup Operator
- Veeam Restore Operator
- Veeam Tape Operator
- Veeam Backup Viewer
- Veeam Security Administrator

---

## Repositórios

```
GET /api/v1/backupInfrastructure/repositories/states
```

Obtém informações dos repositórios cadastrados.

Informações coletadas:

- Nome
- Localização
- Espaço Total
- Espaço Livre
- Espaço Utilizado
- Percentual de utilização
- Estado do Repositório

Permissões aceitas:

- Veeam Backup Administrator
- Veeam Backup Operator
- Veeam Restore Operator
- Veeam Backup Viewer
- Veeam Tape Operator

---

## Informações do Servidor

O template consulta informações gerais do servidor Veeam para disponibilizar dados adicionais em futuras versões.

---

## Licenciamento

O template também consulta informações da licença instalada.

Entre elas:

- Data de expiração
- Tempo restante até o vencimento (quando configurado)

Permitindo criar dashboards e triggers para alertar sobre licenças próximas do vencimento.

---

# Autenticação

O template realiza autenticação automática utilizando a API REST do Veeam.

Fluxo:

```text
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

A renovação do token é automática e transparente.

---

# Pré-processamento

Diversos valores retornados pela API são convertidos para formatos mais úteis para gráficos e triggers.

## Última execução

Entrada:

```
2026-07-24T22:00:15.057882-03:00
```

Pode ser utilizada para calcular:

- Tempo desde a última execução
- Data da última execução
- SLA de backups

---

## Duração do Job

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
- comparação entre execuções
- triggers para backups demorados

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

## Expiração da licença

Entrada:

```
2028-04-30T00:00:00Z
```

Pode ser convertida para:

- Dias restantes
- Segundos restantes
- Tempo restante

Facilitando a criação de alertas preventivos.

---

# Possíveis evoluções

A estrutura foi desenvolvida de forma modular para facilitar a inclusão de novos recursos da API oficial do Veeam.

Entre eles:

- Backup Sessions
- Backup Copy Jobs
- Agents
- NAS Backup
- SureBackup
- Scale-Out Backup Repository
- Backup Proxies
- Object Storage
- Capacity Tier
- Alarmes
- Licenciamento avançado
- Estatísticas históricas

---

# Objetivo

Disponibilizar um template simples, leve e totalmente baseado na **REST API oficial do Veeam Backup & Replication**, permitindo monitoramento centralizado no Zabbix sem utilização de scripts externos, proporcionando fácil manutenção, alta compatibilidade e expansão futura.
