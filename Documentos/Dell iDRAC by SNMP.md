# Template Dell iDRAC by SNMP para Zabbix

## Visão geral

Este repositório contém um template personalizado para monitoramento de servidores Dell PowerEdge por meio da interface de gerenciamento **iDRAC**, utilizando o protocolo **SNMP**.

O template foi construído a partir do template oficial **Dell iDRAC by SNMP** do Zabbix e posteriormente ampliado para incluir recursos que não estavam presentes na versão original utilizada no ambiente, principalmente:

- Descoberta de módulos de memória por slot;
- Monitoramento da bateria CMOS/sistema;
- Firmware das controladoras RAID;
- Estado consolidado do subsistema de armazenamento;
- Descoberta e monitoramento das interfaces físicas de rede;
- Ajustes e inclusão de triggers personalizadas.

O objetivo principal é disponibilizar um único template reutilizável em diferentes clientes e gerações de servidores Dell, evitando dependência de um template específico para iDRAC9.

---

## Informações do template

| Propriedade | Valor |
|---|---|
| Nome do template | `Dell iDRAC by SNMP` |
| Formato de exportação | Zabbix `7.2` |
| Versão interna | `7.0-0-custom-3` |
| Grupo | `Templates/Server hardware` |
| Tipo de coleta | SNMP Agent, ICMP e SNMP Trap |
| Itens principais | 18 |
| Regras de descoberta LLD | 11 |
| Protótipos de itens | 38 |
| Triggers e protótipos de triggers | 46 |
| Macros | 39 |
| Mapas de valores | 13 |

Tags aplicadas ao template:

```text
class: hardware
target: dell
target: idrac
```

---

## Compatibilidade

O template utiliza principalmente objetos da `IDRAC-MIB-SMIv2` e foi projetado para equipamentos que exponham essa MIB por SNMP.

Compatibilidade esperada:

- iDRAC7;
- iDRAC8;
- iDRAC9;
- Versões posteriores que mantenham compatibilidade com os mesmos objetos SNMP.

O template **não é exclusivo do iDRAC9**.

A disponibilidade de cada item pode variar conforme:

- Modelo do servidor Dell PowerEdge;
- Geração do equipamento;
- Versão do firmware do iDRAC;
- Modelo da controladora RAID;
- Presença ou ausência de bateria/cache RAID;
- Quantidade e tipo das interfaces de rede;
- Implementação SNMP disponível no hardware.

Caso determinado OID não seja disponibilizado pelo equipamento, somente o item ou discovery relacionado poderá ficar sem dados. Os demais componentes do template continuarão funcionando.

Não foi definida compatibilidade garantida com iDRAC6 ou versões anteriores.

---

## Requisitos

### No servidor Dell

- iDRAC ativo e acessível pela rede de gerenciamento;
- Serviço SNMP habilitado no iDRAC;
- Comunidade SNMP ou credenciais SNMPv3 configuradas;
- Acesso permitido entre o Zabbix Server ou Proxy e o iDRAC;
- Porta UDP `161` liberada;
- Porta UDP `162` liberada apenas quando forem utilizados SNMP Traps;
- Firmware do iDRAC preferencialmente atualizado.

### No Zabbix

- Zabbix Server ou Proxy com suporte a SNMP;
- Interface SNMP configurada no host;
- Template importado e vinculado ao host;
- Credenciais SNMP configuradas na interface do host;
- MIBs Dell instaladas no sistema são opcionais para a coleta, pois o template utiliza OIDs numéricos.

---

## MIBs utilizadas

O template utiliza objetos das seguintes MIBs:

```text
HOST-RESOURCES-MIB
IDRAC-MIB-SMIv2
SNMPv2-MIB
```

A maior parte das informações de hardware é obtida por meio da árvore Dell:

```text
1.3.6.1.4.1.674.10892.5
```

Os OIDs foram mantidos em formato numérico para reduzir dependência da instalação local dos arquivos de MIB no Zabbix Server ou Proxy.

---

## Como o template foi construído

O processo de construção foi realizado em etapas:

1. Utilização do template oficial `Dell iDRAC by SNMP` como base;
2. Comparação com um template específico para iDRAC9;
3. Identificação dos componentes ausentes no template genérico;
4. Validação das tabelas disponíveis na `IDRAC-MIB-SMIv2`;
5. Inclusão de novas regras de descoberta de baixo nível, chamadas de LLD;
6. Criação dos protótipos de itens associados aos discoveries;
7. Aplicação de mapas de valores para converter números SNMP em estados legíveis;
8. Criação e ajuste das triggers;
9. Manutenção do nome e UUID principal do template para permitir atualização direta;
10. Validação da estrutura YAML e verificação de UUIDs e chaves duplicadas.

### Estratégia utilizada

O template trabalha com dois tipos principais de coleta:

- **Itens fixos:** informações que existem uma única vez por servidor, como modelo, serial, firmware e estado geral;
- **Low-Level Discovery:** informações que podem ter quantidade variável, como discos, memórias, ventiladores, fontes, controladoras e NICs.

Essa estrutura permite aplicar o mesmo template em servidores com diferentes configurações de hardware sem criar itens manualmente para cada equipamento.

---

## Estrutura de coleta

### Itens principais

Os itens fixos coletam informações gerais do equipamento e da comunicação.

| Item | Finalidade |
|---|---|
| ICMP ping | Verifica se o endereço do iDRAC responde a ping |
| ICMP loss | Mede perda de pacotes ICMP |
| ICMP response time | Mede o tempo de resposta ICMP |
| SNMP traps fallback | Recebe traps SNMP não associados a outro item |
| System contact details | Coleta o contato configurado no SNMP |
| System description | Coleta a descrição SNMP do equipamento |
| Firmware version | Coleta a versão do firmware do iDRAC |
| Hardware model name | Coleta o modelo do servidor |
| Hardware serial number | Coleta o Service Tag ou número de série |
| Overall storage health status | Coleta o estado geral do armazenamento |
| Uptime hardware | Coleta o tempo de atividade do hardware |
| System location | Coleta a localização configurada no SNMP |
| System name | Coleta o nome SNMP do sistema |
| Uptime network | Coleta o uptime do agente SNMP |
| System object ID | Identifica o tipo de objeto SNMP |
| Overall system health status | Coleta o estado geral do servidor |
| Operating system | Coleta o sistema operacional informado pelo iDRAC |
| SNMP agent availability | Verifica se o Zabbix está conseguindo coletar via SNMP |

### Frequências principais

- Estado geral do sistema: `30s`;
- Uptime: `30s`;
- Informações de identificação: entre `15m` e `1h`;
- Discoveries: `1h`;
- Informações estáticas de inventário: normalmente `1d`;
- Estados de discos, fontes, temperatura e ventiladores: normalmente `3m`.

Todos os itens possuem retenção de histórico de `7d` no arquivo atual. Itens de estado numérico possuem tendências desabilitadas quando esse armazenamento não apresenta benefício operacional.

---

# Componentes monitorados

## 1. Disponibilidade do iDRAC

O template verifica a disponibilidade por dois métodos independentes:

- ICMP;
- Disponibilidade do agente SNMP.

Isso permite diferenciar um equipamento completamente inacessível de um iDRAC que responde à rede, mas não está entregando dados SNMP.

### Alertas

| Alerta | Condição | Severidade |
|---|---|---|
| Indisponível por ping ICMP | Três coletas consecutivas sem resposta | Disaster |
| High ICMP ping loss | Perda maior que `{$ICMP_LOSS_WARN}` e menor que 100% | Warning |
| High ICMP ping response time | Média de resposta maior que `{$ICMP_RESPONSE_TIME_WARN}` | Warning |
| Sem coleta de dados SNMP | Agente SNMP indisponível durante `{$SNMP.TIMEOUT}` | High |

---

## 2. Estado geral do servidor

O estado geral é coletado pelo objeto `globalSystemStatus`.

Estados principais:

| Valor | Estado |
|---:|---|
| 3 | OK |
| 4 | Non-critical |
| 5 | Critical |
| 6 | Non-recoverable |

### Alertas

| Estado | Severidade |
|---|---|
| Warning / Non-critical | Warning |
| Critical | High |
| Non-recoverable | Disaster |

---

## 3. Estado geral do armazenamento

Foi adicionado o item:

```text
Overall storage health status
```

Chave:

```text
system.hw.storage.status[globalStorageStatus]
```

OID:

```text
1.3.6.1.4.1.674.10892.5.2.3.0
```

Esse item representa um estado consolidado do subsistema de armazenamento, podendo refletir problemas em:

- Controladora RAID;
- Discos físicos;
- Discos virtuais;
- Cache ou bateria da controladora;
- Outros componentes relacionados ao armazenamento.

### Alertas

| Estado | Severidade |
|---|---|
| Warning | Warning |
| Critical | High |
| Non-recoverable | Disaster |

---

## 4. Controladora RAID

Regra de discovery:

```text
Array Controller Discovery
```

Chave:

```text
physicaldisk.arr.discovery
```

A regra identifica automaticamente todas as controladoras RAID apresentadas pelo iDRAC.

### Informações coletadas

- Nome da controladora;
- Modelo da controladora;
- Versão do firmware;
- Estado do componente.

### Alertas

| Estado | Severidade |
|---|---|
| Non-critical | Average |
| Critical | High |
| Non-recoverable | Disaster |

---

## 5. Bateria/cache da controladora RAID

Regra de discovery:

```text
Array Controller Cache Discovery
```

Chave:

```text
array.cache.discovery
```

Essa regra monitora a bateria ou o módulo de cache da controladora RAID.

Principais estados:

| Valor | Estado |
|---:|---|
| 1 | Unknown |
| 2 | Ready |
| 3 | Failed |
| 4 | Degraded |
| 5 | Missing |
| 6 | Charging |
| 7 | Below threshold |

### Alertas

- Estado crítico;
- Estado de aviso;
- Qualquer estado diferente de `Ready`.

A bateria da controladora RAID é diferente da bateria CMOS da placa-mãe.

---

## 6. Discos físicos

Regra de discovery:

```text
Physical Disk Discovery
```

Chave:

```text
physicaldisk.discovery
```

### Informações coletadas

- Nome do disco ou posição física;
- Tipo de mídia: HDD ou SSD;
- Modelo;
- Part number;
- Número de série;
- Capacidade;
- Estado operacional;
- Alerta preditivo S.M.A.R.T.

### Diferença entre estado físico e S.M.A.R.T.

O item `Physical disk status` representa o estado operacional atual informado pela controladora.

```text
3 = OK
4 = Non-critical
5 = Critical
6 = Non-recoverable
```

O item `Physical disk S.M.A.R.T. status` informa apenas se existe previsão de falha:

```text
0 = OK / sem alerta preditivo
1 = Failed / alerta preditivo ativo
```

Um disco pode estar operacional e, ao mesmo tempo, possuir um alerta S.M.A.R.T. de falha futura.

### Alertas

| Alerta | Condição | Severidade |
|---|---|---|
| Physical disk is in warning state | Estado `Non-critical` | Warning |
| Physical disk failed | Estado `Critical` ou `Non-recoverable` | High |
| Physical disk S.M.A.R.T. failed | Alerta preditivo igual a `1` | High |
| Disk has been replaced | Alteração do número de série | Information |

---

## 7. Discos virtuais e volumes RAID

Regra de discovery:

```text
Virtual Disk Discovery
```

Chave:

```text
virtualdisk.discovery
```

### Informações coletadas

- Nome do volume;
- Capacidade;
- Layout RAID;
- Estado atual;
- Estado operacional;
- Política de leitura;
- Política de escrita.

Layouts reconhecidos:

- RAID 0;
- RAID 1;
- RAID 5;
- RAID 6;
- RAID 10;
- RAID 50;
- RAID 60;
- Outros layouts informados pela controladora.

### Alertas

| Estado | Severidade |
|---|---|
| Degraded | Average |
| Failed | High |

---

## 8. Memória por slot

Regra de discovery adicionada:

```text
Memory Slot Discovery
```

Chave:

```text
memory.slot.discovery
```

Tabela SNMP utilizada:

```text
1.3.6.1.4.1.674.10892.5.4.1100.50
```

### Filtro de discovery

O discovery ignora slots vazios ou que retornem tamanho desconhecido:

```text
0
2147483647
```

### Informações coletadas

- Identificação ou localização do slot;
- Estado do módulo;
- Capacidade;
- Velocidade em MHz;
- Fabricante;
- Part number;
- Número de série.

O tamanho retornado em KB é convertido para bytes por meio de preprocessing.

### Alertas

O arquivo contém triggers por severidade e uma trigger personalizada adicional:

| Condição | Severidade |
|---|---|
| Non-critical | Warning |
| Critical | High |
| Non-recoverable | Disaster |
| Estado diferente de OK | Average |

---

## 9. Bateria CMOS/sistema

Regra de discovery adicionada:

```text
System Battery Discovery
```

Chave:

```text
system.battery.discovery
```

Tabela SNMP:

```text
1.3.6.1.4.1.674.10892.5.4.600.50
```

A bateria CMOS/sistema é monitorada separadamente da bateria da controladora RAID.

### Informações coletadas

- Localização da bateria;
- Estado da bateria.

### Alertas

| Estado | Severidade |
|---|---|
| Non-critical | Warning |
| Critical | High |
| Non-recoverable | Disaster |

---

## 10. Ventiladores

Regra de discovery:

```text
FAN Discovery
```

Chave:

```text
fan.discovery
```

A regra filtra somente componentes classificados como ventiladores.

### Informações coletadas

- Descrição do ventilador;
- Velocidade em RPM;
- Estado do ventilador.

### Alertas

- Estado de aviso por limite superior ou inferior;
- Estado crítico;
- Estado não recuperável;
- Falha do componente;
- Trigger personalizada quando o estado for diferente de `OK (3)`.

---

## 11. Fontes de alimentação

Regra de discovery:

```text
PSU Discovery
```

Chave:

```text
psu.discovery
```

### Informações coletadas

- Identificação da fonte;
- Estado da fonte de alimentação.

### Alertas

| Estado | Severidade |
|---|---|
| Non-critical | Warning |
| Critical ou Non-recoverable | Average |

O estado da fonte é informado pelo hardware. Uma fonte sem alimentação elétrica, removida ou com falha pode alterar o estado conforme o modelo do servidor.

---

## 12. Temperatura ambiente

Regra de discovery:

```text
Temperature Ambient Discovery
```

Chave:

```text
temp.ambient.discovery
```

Filtro utilizado:

```text
.*Inlet Temp.*
```

### Informações coletadas

- Temperatura de entrada do servidor;
- Estado do sensor de temperatura.

### Limites padrão

| Macro | Valor |
|---|---:|
| `{$TEMP_WARN:"Ambient"}` | 30 °C |
| `{$TEMP_CRIT:"Ambient"}` | 35 °C |

### Alertas

- Temperatura acima do limite de aviso;
- Temperatura acima do limite crítico;
- Estado do sensor em Warning, Critical ou Non-recoverable;
- Temperatura abaixo do limite crítico inferior.

---

## 13. Temperatura de CPU

Regra de discovery:

```text
Temperature CPU Discovery
```

Chave:

```text
temp.cpu.discovery
```

Filtro utilizado:

```text
.*CPU.*
```

### Limites padrão

| Macro | Valor |
|---|---:|
| `{$TEMP_WARN:"CPU"}` | 70 °C |
| `{$TEMP_CRIT:"CPU"}` | 75 °C |

### Alertas

- Temperatura acima do limite de aviso;
- Temperatura acima do limite crítico;
- Estado do sensor em Warning, Critical ou Non-recoverable;
- Temperatura abaixo do limite crítico inferior.

---

## 14. Interfaces físicas de rede

Regra de discovery adicionada:

```text
Physical NIC Discovery
```

Chave:

```text
system.nic.discovery
```

Tabela SNMP utilizada:

```text
1.3.6.1.4.1.674.10892.5.4.1100.90
```

O discovery identifica interfaces físicas de rede apresentadas pelo inventário do iDRAC.

### Informações coletadas

- FQDD da interface;
- Estado do hardware;
- Estado do link físico;
- Nome ou modelo do produto;
- Fabricante;
- Endereço MAC atual;
- Endereço MAC permanente.

Exemplo de FQDD:

```text
NIC.Integrated.1-1-1
```

### Hardware status

O estado de hardware indica a saúde física da placa ou porta de rede.

```text
3 = OK
4 = Non-critical
5 = Critical
6 = Non-recoverable
```

Foi utilizada uma trigger simplificada:

```text
NIC {#NIC_FQDD}: Hardware status is not OK
```

Expressão lógica:

```text
status <> 3
```

Qualquer estado diferente de `OK (3)` gera um alerta de severidade **High**.

### Link status

O estado do link representa a condição da conexão física.

| Valor | Estado |
|---:|---|
| 0 | Unknown |
| 1 | Connected |
| 2 | Disconnected |
| 3 | Driver bad |
| 4 | Driver disabled |
| 10 | Hardware initializing |
| 11 | Hardware resetting |
| 12 | Hardware closing |
| 13 | Hardware not ready |

`Hardware status: OK` e `Link status: Disconnected` não representam necessariamente uma falha. Essa combinação pode indicar apenas uma porta saudável que não possui cabo conectado.

### Trigger de link desconectado

A trigger de link é controlada por macro e permanece desabilitada globalmente:

```text
{$IDRAC.NIC.LINK.DOWN.ENABLED}=0
```

Para habilitar o alerta em uma interface específica, deve ser criada uma macro contextual no host:

```text
{$IDRAC.NIC.LINK.DOWN.ENABLED:"NIC.Integrated.1-1-1"}=1
```

A trigger somente abre problema quando:

- O link retorna `Disconnected (2)` pelo menos duas vezes em 10 minutos;
- A macro contextual da porta está definida como `1`.

Severidade do alerta: **Average**.

### Limitações do monitoramento de NIC

A tabela do iDRAC fornece inventário e estado físico. Ela não substitui o monitoramento da interface no sistema operacional.

Este template não garante coleta de:

- Tráfego recebido e enviado;
- Utilização em Mbps;
- Erros e descartes;
- Endereço IP configurado no sistema operacional;
- VLAN do sistema operacional;
- Estado lógico de bonds, teams ou bridges.

Esses dados devem ser coletados pelo Zabbix Agent ou SNMP diretamente no sistema operacional, hypervisor ou switch.

---

# Triggers de alteração de inventário

Além dos alertas de falha, o template possui triggers informativas para detectar alterações importantes:

| Evento | Severidade |
|---|---|
| Alteração do firmware do iDRAC | Information |
| Alteração do número de série do servidor | Information |
| Alteração do nome do sistema | Information |
| Alteração da descrição do sistema operacional | Information |
| Substituição de disco físico por mudança de serial | Information |

Essas triggers ajudam a registrar mudanças de hardware ou configuração que podem ocorrer durante manutenção.

---

# Macros

O template utiliza macros para centralizar limites e estados esperados.

## Disponibilidade

```text
{$ICMP_LOSS_WARN}=20
{$ICMP_RESPONSE_TIME_WARN}=0.15
{$SNMP.TIMEOUT}=5m
```

## Estado geral

```text
{$HEALTH_WARN_STATUS}=4
{$HEALTH_CRIT_STATUS}=5
{$HEALTH_DISASTER_STATUS}=6
```

## Temperatura

```text
{$TEMP_WARN}=50
{$TEMP_CRIT}=60
{$TEMP_CRIT_LOW}=5
{$TEMP_WARN:"Ambient"}=30
{$TEMP_CRIT:"Ambient"}=35
{$TEMP_WARN:"CPU"}=70
{$TEMP_CRIT:"CPU"}=75
```

## NIC

```text
{$IDRAC.NIC.LINK.DOWN.ENABLED}=0
```

## Armazenamento

Existem macros específicas para:

- Estado da controladora RAID;
- Estado da bateria/cache RAID;
- Estado dos discos físicos;
- Alerta S.M.A.R.T.;
- Estado dos volumes virtuais.

## Ventiladores e fontes

Existem macros separadas para estados de warning, critical, non-recoverable e failed.

### Personalização por host

As macros podem ser sobrescritas diretamente no host sem modificar o template.

Exemplo para alterar o limite crítico de temperatura ambiente:

```text
{$TEMP_CRIT:"Ambient"}=40
```

Exemplo para habilitar o monitoramento de link de uma porta:

```text
{$IDRAC.NIC.LINK.DOWN.ENABLED:"NIC.Integrated.1-1-1"}=1
```

---

# Mapas de valores

Os mapas de valores convertem os números recebidos via SNMP em textos compreensíveis.

Principais mapas utilizados:

- Estado geral de objetos Dell;
- Estado da bateria/cache RAID;
- Estado booleano do S.M.A.R.T.;
- Tipo de mídia HDD ou SSD;
- Estado de sensores;
- Layout RAID;
- Estado de disco virtual;
- Política de leitura e escrita;
- Estado de conexão das NICs;
- Disponibilidade do agente SNMP.

Exemplo:

```text
3 -> ok
4 -> nonCritical
5 -> critical
6 -> nonRecoverable
```

---

# Importação no Zabbix

## Nova instalação

1. Acesse `Data collection` ou `Coleta de dados`;
2. Entre em `Templates`;
3. Clique em `Import`;
4. Selecione o arquivo YAML;
5. Revise as opções de importação;
6. Confirme a importação;
7. Crie ou abra o host do iDRAC;
8. Adicione uma interface SNMP com o IP do iDRAC;
9. Configure a comunidade SNMP ou credenciais SNMPv3;
10. Vincule o template `Dell iDRAC by SNMP`.

## Atualização de uma versão anterior

O UUID principal do template foi preservado para permitir atualização direta.

Ao importar uma versão atualizada:

- Habilite a atualização de objetos existentes;
- Utilize `Delete missing` ou `Excluir ausentes` somente quando desejar remover objetos antigos que não existem mais no YAML;
- Faça backup do template anterior antes da substituição;
- Valide inicialmente em um host de homologação.

O uso de `Delete missing` exige atenção, pois pode remover itens e triggers personalizados que tenham sido criados diretamente no mesmo template após a exportação.

---

# Configuração recomendada do host

## Interface SNMP

Exemplo para SNMPv2c:

```text
IP: endereço do iDRAC
Porta: 161
Versão: SNMPv2
Community: comunidade configurada no iDRAC
```

## Nome do host

Sugestão de padronização:

```text
IDRAC-NOME-DO-SERVIDOR
```

ou:

```text
CLIENTE-IDRAC-SERVIDOR
```

## Proxy

Quando o cliente possui Zabbix Proxy, a coleta deve ser realizada pelo proxy localizado no ambiente ou com rota até a rede de gerenciamento.

---

# Validação SNMP

Antes de vincular o template, recomenda-se testar a comunicação a partir do Zabbix Server ou Proxy.

## Teste básico

```bash
snmpget -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.2.1.1.1.0
```

## Estado geral

```bash
snmpget -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.4.1.674.10892.5.2.1.0
```

## Estado geral do armazenamento

```bash
snmpget -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.4.1.674.10892.5.2.3.0
```

## Memória

```bash
snmpwalk -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.4.1.674.10892.5.4.1100.50
```

## Bateria CMOS/sistema

```bash
snmpwalk -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.4.1.674.10892.5.4.600.50
```

## Controladoras e discos físicos

```bash
snmpwalk -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.4.1.674.10892.5.5.1.20.130
```

## Discos virtuais

```bash
snmpwalk -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.4.1.674.10892.5.5.1.20.140
```

## Interfaces físicas de rede

```bash
snmpwalk -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.4.1.674.10892.5.4.1100.90
```

## Sensores de temperatura

```bash
snmpwalk -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.4.1.674.10892.5.4.700.20
```

## Ventiladores

```bash
snmpwalk -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.4.1.674.10892.5.4.700.12
```

## Fontes de alimentação

```bash
snmpwalk -v2c -c COMUNIDADE IP_IDRAC 1.3.6.1.4.1.674.10892.5.4.600.12
```

---

# Diagnóstico de problemas

## SNMP indisponível

Verificar:

- IP da interface SNMP no host;
- Comunidade ou credenciais;
- Porta UDP 161;
- ACL do iDRAC;
- Firewall entre o Zabbix e o iDRAC;
- Proxy responsável pela coleta;
- Serviço SNMP habilitado no iDRAC.

## Discovery sem resultados

Executar o `snmpwalk` da tabela correspondente.

Possíveis causas:

- O hardware não possui o componente;
- O firmware não expõe a tabela;
- O OID retorna `No Such Object`;
- O componente está oculto por filtro LLD;
- O equipamento utiliza implementação diferente da MIB.

## Item não suportado

Verificar a mensagem de erro do item no Zabbix.

Erros comuns:

```text
No Such Object available on this agent at this OID
No Such Instance currently exists at this OID
Timeout while connecting to SNMP agent
```

Um item não suportado não significa necessariamente que o template inteiro está com problema. Pode ser apenas um OID não implementado naquele modelo.

---

# Limitações conhecidas

- Compatibilidade depende dos OIDs disponibilizados pelo firmware;
- Alguns modelos não possuem bateria na controladora RAID;
- Servidores sem controladora PERC podem não retornar as tabelas de RAID;
- Portas de NIC não utilizadas podem aparecer como `Disconnected`;
- O iDRAC não fornece necessariamente métricas de tráfego das interfaces do sistema operacional;
- O estado S.M.A.R.T. é preditivo e não substitui o estado operacional do disco;
- O estado geral pode indicar falha sem identificar sozinho o componente afetado;
- As traduções de alguns nomes de triggers estão misturadas entre português e inglês no arquivo atual;
- Algumas triggers personalizadas coexistem com triggers originais por severidade e podem gerar mais de um evento para o mesmo componente.

---

# Boas práticas

- Validar novas versões em um host de homologação;
- Manter backup do YAML anterior;
- Padronizar macros no nível de template e sobrescrever somente exceções no host;
- Habilitar alerta de link apenas para NICs efetivamente utilizadas;
- Manter o firmware do iDRAC e da controladora RAID atualizado;
- Monitorar também o sistema operacional com Zabbix Agent;
- Utilizar o estado geral como alerta de entrada e os itens individuais para diagnóstico;
- Revisar itens não suportados após atualizações de firmware;
- Documentar alterações de UUID, chaves e macros em um changelog.

---

# Resumo dos alertas monitorados

O template pode gerar alertas para:

- iDRAC sem resposta ICMP;
- Perda ou latência ICMP elevada;
- Coleta SNMP indisponível;
- Estado geral do servidor em warning, critical ou non-recoverable;
- Estado geral do armazenamento degradado ou com falha;
- Controladora RAID degradada ou com falha;
- Bateria/cache RAID fora do estado ideal;
- Disco físico degradado ou com falha;
- Alerta preditivo S.M.A.R.T.;
- Volume RAID degradado ou com falha;
- Módulo de memória com estado diferente de OK;
- Bateria CMOS em estado de warning ou falha;
- Ventilador com estado anormal;
- Fonte de alimentação com estado anormal;
- Temperatura ambiente ou de CPU elevada;
- NIC física com hardware diferente de OK;
- Link de NIC desconectado, quando habilitado por macro;
- Alteração de firmware, serial, nome do sistema ou sistema operacional;
- Substituição de disco detectada pela mudança do número de série.

---

# Histórico de customizações

## Custom 1

- Inclusão do discovery de memória por slot;
- Inclusão da bateria CMOS/sistema;
- Inclusão do firmware da controladora RAID;
- Inclusão do estado geral do armazenamento.

## Custom 2

- Inclusão do discovery de NICs físicas;
- Inclusão do estado de hardware e link;
- Inclusão de fabricante, modelo, FQDD e endereços MAC;
- Inclusão da macro contextual para link desconectado.

## Custom 3

- Simplificação da trigger de hardware da NIC;
- Remoção das triggers separadas por Warning, Critical e Non-recoverable;
- Criação de uma única trigger quando o estado for diferente de `OK (3)`.

---

# Arquivo do template

Arquivo utilizado como base desta documentação:

```text
zbx_export_templates_NIC_trigger_simplificada.yaml
```

Versão documentada:

```text
7.0-0-custom-3
```

---

## Licenciamento e créditos

Este template é uma customização baseada no template oficial do Zabbix para Dell iDRAC por SNMP.

Antes de redistribuir o arquivo, mantenha os créditos e as informações de licença presentes no projeto original do Zabbix e consulte as políticas aplicáveis ao ambiente onde o template será publicado.
