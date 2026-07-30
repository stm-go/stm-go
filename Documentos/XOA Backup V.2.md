# Documento de Entrega - Monitoramento XOA Backup V.2

**Solução:** Monitoramento do Xen Orchestra no Zabbix  
**Template:** `XOA Backup V.2`  
**Data:** 28/07/2026

## Objetivo

Implantar uma monitoração centralizada do Xen Orchestra para reduzir o risco de falhas de backup não identificadas e de snapshots permanecerem ativos por períodos excessivos.

## O que a solução monitora

- Disponibilidade da API do Xen Orchestra.
- Validade do acesso utilizado pelo Zabbix.
- Resultado das execuções de backup.
- Backups finalizados com falha, alerta, pendência ou estado desconhecido.
- Quantidade de snapshots existentes.
- Snapshots com idade superior ao limite definido, atualmente **2 dias**.
- Falta de resposta da API de snapshots por mais de 30 minutos.

## Compatibilidade

O template atende ambientes com versões diferentes da API do Xen Orchestra.

A equipe técnica informa no host apenas uma macro:

```text
{$API.VERSION} = NEW ou OLD
```

O template seleciona automaticamente o endpoint adequado, sem necessidade de manter dois modelos separados.

## Benefícios

- Identificação antecipada de falhas de backup.
- Redução do risco de snapshots esquecidos crescerem por vários dias.
- Padronização do monitoramento entre clientes.
- Menor necessidade de verificações manuais no Xen Orchestra.
- Compatibilidade com ambientes antigos e novos.
- Alertas centralizados no Zabbix.

## Funcionamento operacional

O Zabbix consulta periodicamente a API do Xen Orchestra e gera alertas para a equipe responsável.

A solução é somente de leitura. Ela não exclui snapshots, não reinicia serviços e não altera jobs de backup automaticamente.

Quando um snapshot antigo é identificado, a equipe deve validar sua origem e o espaço disponível no armazenamento antes de qualquer exclusão.

## Alertas principais

| Situação | Nível |
|---|---|
| API ou autenticação indisponível | Alto |
| Backup sem sucesso | Desastre |
| API de snapshots sem dados por 30 minutos | Médio |
| Snapshot acima de 2 dias | Atenção |

## Responsabilidades após a entrega

A equipe de infraestrutura deverá:

- Manter a URL e o token de API atualizados.
- Configurar corretamente a versão `NEW` ou `OLD` em cada host.
- Tratar os alertas recebidos pelo Zabbix.
- Validar snapshots antigos antes de excluí-los.
- Revisar o limite de idade conforme a política de cada cliente.

## Limites da solução

- O monitoramento não executa backup.
- O monitoramento não exclui snapshots.
- O monitoramento não mede diretamente o espaço ocupado por cada snapshot.
- A disponibilidade depende da comunicação entre Zabbix e Xen Orchestra.
- Snapshots órfãos retornados pela API podem exigir análise direta no XCP-ng.

## Critérios de aceite

- Template aplicado ao host do Xen Orchestra.
- Comunicação com a API validada.
- Versão da API configurada.
- Logs de backup descobertos no Zabbix.
- Snapshots descobertos no Zabbix.
- Alertas disponíveis para integração com as ações de notificação da operação.

## Conclusão

O **XOA Backup V.2** entrega uma visão centralizada da saúde dos backups e da permanência de snapshots, ajudando a equipe a agir antes que falhas operacionais ou crescimento excessivo de discos causem indisponibilidade.
