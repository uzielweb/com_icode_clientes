# Componente Joomla - iCode Clientes

## Descrição

Este é um componente para Joomla que gerencia clientes (com_icode_clientes). O componente fornece funcionalidades completas para cadastro, edição, listagem e gerenciamento de clientes no painel administrativo e frontend do Joomla.

## Autor

**Desenvolvido por:** Rogerio Brito

**Email:** rogerio.brito@intercode.com.br

**Empresa:** InterCode

**Versão:** 1.0.0

**Data de Criação:** 18 de outubro de 2025

**Copyright:** 2025 Rogerio Brito

**Licença:** GNU General Public License versão 2 ou posterior

## Contexto de Criação

Este componente foi desenvolvido utilizando o **Component Creator** (http://www.component-creator.com/), uma ferramenta online que gera automaticamente componentes Joomla seguindo as melhores práticas e padrões de desenvolvimento.

### Sobre o Component Creator:

- 🛠️ **Ferramenta:** Component Creator (component-creator.com)
- 🎯 **Propósito:** Geração automática de componentes Joomla
- ✅ **Benefícios:** Código limpo, estrutura padronizada, compatibilidade garantida
- 🔧 **Arquitetura:** MVC (Model-View-Controller) seguindo padrões Joomla

### Características Principais:

- ✅ Painel administrativo completo para gerenciamento de clientes
- ✅ Interface frontend para visualização de clientes
- ✅ Suporte multilíngue (Português BR e Inglês)
- ✅ Formulários de filtro e busca avançada
- ✅ Plugin de busca integrado (Finder)
- ✅ Campos personalizados com validação
- ✅ Sistema de permissões e controle de acesso
- ✅ Instalador automático com estrutura SQL
- ✅ Sistema de atualização automática configurado
- ✅ Gerado com Component Creator para máxima compatibilidade
- ✅ Namespace PSR-4 implementado: `Icodeclientes\Component\Icode_clientes`

### Detalhes Técnicos:

-**Namespace:**`Icodeclientes\Component\Icode_clientes`

-**Tipo de Extensão:** Component

-**Método de Instalação:** Upgrade

-**Compatibilidade:** Joomla 4.0+

-**Plugin Finder:** Integrado para busca global

-**Update Server:** Configurado para atualizações automáticas

## Estrutura do Componente

### Backend (Administrador)

-**Controllers:** Gerenciamento das ações do componente

-**Models:** Lógica de negócio e acesso aos dados

-**Views:** Apresentação das interfaces

-**Tables:** Definição das tabelas e validações

-**Forms:** Formulários XML para edição e filtros

-**Helper:** Funções auxiliares

### Frontend (Site)

-**Controllers:** Controladores para o frontend

-**Models:** Modelos específicos para o site

-**Views:** Visualizações públicas

-**Templates:** Layouts personalizáveis

### Recursos Adicionais

-**SQL Scripts:** Instalação e atualizações do banco de dados

-**Language Files:** Arquivos de tradução

-**Assets:** CSS e JavaScript

-**Plugin Finder:** Integração com o sistema de busca do Joomla

## 🚀 Roadmap - Compatibilidade Joomla 6

### Status de Desenvolvimento

> **⚠️ IMPORTANTE:** Este componente está sendo preparado para compatibilidade com **Joomla 6.0**

### Alterações Planejadas para Joomla 6:

- [ ] **Atualização do namespace**: Migração para PSR-4 completo
- [ ] **PHP 8.2+ compatibility**: Adequação aos novos requisitos de PHP
- [ ] **Modernização da API**: Utilização das novas APIs do Joomla 6
- [ ] **Performance improvements**: Otimizações para melhor performance
- [ ] **Security enhancements**: Implementação das novas práticas de segurança
- [ ] **Updated dependencies**: Atualização de bibliotecas e dependências
- [ ] **Modern UI/UX**: Interface atualizada seguindo o novo design system
- [ ] **Accessibility improvements**: Melhorias de acessibilidade (WCAG 2.1)

### Requisitos Técnicos Atuais:

-**Joomla:** 4.0+ (em preparação para 6.0)

-**PHP:** 7.4+ (será atualizado para 8.2+)

-**MySQL:** 5.6+ ou MariaDB 10.1+

### Requisitos Futuros (Joomla 6):

-**Joomla:** 6.0+

-**PHP:** 8.2+

-**MySQL:** 8.0+ ou MariaDB 10.4+

## ⚠️ Problemas Conhecidos

### Bugs que Impedem Instalação no Joomla 6

> **ERRO CRÍTICO:** O componente atualmente contém bugs que impedem sua instalação no Joomla 6.

#### Erro Identificado:

```
FatalError - HTTP 500
Compile Error: Cannot use "parent" when current class scope has no parent
in script.php (line 59)
```

#### Descrição do Problema:

- **Arquivo afetado:** `script.php` (linha 59)
- **Classe:** `com_icode_clientesInstallerScript`
- **Método:** `preflight()`
- **Causa:** A classe tenta usar `parent::preflight()` mas não estende corretamente a classe pai `InstallerScript`
- **Status:** 🔴 **Não resolvido - Impede instalação**

#### Impacto:

- ❌ **Instalação falha** no Joomla 6.0
- ❌ **HTTP 500 Error** durante o processo de instalação
- ❌ **Componente não pode ser utilizado** até correção

#### Solução Planejada:

1. **Correção do script de instalação** (`script.php`)
2. **Revisão da herança de classes** 
3. **Testes de compatibilidade** com Joomla 6
4. **Atualização da versão** após correção

> **RECOMENDAÇÃO:** Aguarde a próxima versão (1.0.1) com as correções necessárias antes de tentar instalar no Joomla 6.

## Instalação

1. Faça download do pacote de instalação
2. Acesse o painel administrativo do Joomla
3. Vá em Sistema > Instalar > Extensões
4. Selecione o arquivo do componente
5. Clique em "Instalar"

## Contribuição

Este projeto está em desenvolvimento ativo para compatibilidade com Joomla 6. Contribuições são bem-vindas!

### Como Contribuir:

1. Fork este repositório
2. Crie uma branch para sua feature (`git checkout -b feature/nova-funcionalidade`)
3. Commit suas mudanças (`git commit -am 'Adiciona nova funcionalidade'`)
4. Push para a branch (`git push origin feature/nova-funcionalidade`)
5. Abra um Pull Request

## Suporte

Para suporte técnico ou dúvidas sobre o desenvolvimento:

-**Email:** rogerio.brito@intercode.com.br

-**Empresa:** InterCode

-**Component Creator:** http://www.component-creator.com/

### Atualizações

Este componente possui sistema de atualização automática configurado através do Component Creator. As atualizações serão disponibilizadas automaticamente quando houver novas versões.

## Licença

Este componente é distribuído sob a **GNU General Public License versão 2 ou posterior**, em conformidade com a licença do Joomla.

---

**Desenvolvido com ❤️ por Rogerio Brito (InterCode)**

*Gerado com Component Creator - Preparando o futuro do Joomla, um componente por vez.*

### Créditos

-**Desenvolvedor:** Rogerio Brito

-**Ferramenta:** Component Creator (component-creator.com)

-**Framework:** Joomla CMS
