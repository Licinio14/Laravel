# 🎵 BandBase 🎵

Bem-vindo ao **BandBase**, um site completo para gerenciar bandas, álbuns, usuários e muito mais! Este projeto foi desenvolvido para oferecer uma experiência completa e segura para os amantes de música. Abaixo estão as principais funcionalidades do sistema:

---

## ✨ Funcionalidades

### 🎸 Bandas
- **Mostrar bandas**: Visualize todas as bandas cadastradas.
- **Inserir bandas**: Adicione novas bandas ao sistema.
- **Editar bandas**: Atualize informações das bandas existentes.
- **Eliminar bandas**: Remova bandas do sistema.

### 💿 Álbuns
- **Mostrar álbuns**: Veja todos os álbuns cadastrados.
- **Inserir álbuns**: Adicione novos álbuns ao sistema.
- **Editar álbuns**: Atualize informações dos álbuns existentes.
- **Eliminar álbuns**: Remova álbuns do sistema.
- **Ver álbuns de uma banda**: Visualize todos os álbuns de uma banda específica.

### 👤 Usuários
- **Registo e Login**: Os usuários podem criar uma conta e fazer login no sistema.
- **Administração de Usuários**:
  - O administrador pode **editar** e **eliminar** usuários.
  - O administrador pode definir se um usuário é **admin** ou não.
- **Reset de Password**: Recuperação de senha via **Mailtrap**.

### 💬 Chat de Mensagens
- **Deixar mensagens**: Os usuários podem deixar mensagens no chat.
- **Apagar mensagens**: Apenas o administrador pode apagar mensagens.

### 🔒 Segurança
- **Middleware personalizada**: Proteção para evitar edição ou eliminação manual de dados sem permissão.
  - Verifica se o usuário é **admin** antes de permitir ações críticas.

### 🌱 Seeds
- O banco de dados é pré-preenchido com dados de exemplo:
  - **50 bandas**
  - **200 álbuns**
  - **50 comentários**
  - **51 usuários** (incluindo o administrador padrão).

---

## 👨‍💻 Administrador Padrão
- **Email**: `admin@gmail.com`
- **Senha**: `admin`

---

## 🛠️ Tecnologias Utilizadas
- **Backend**: Laravel
- **Frontend**: Laravel + Bootstrap
- **Autenticação**: Fortify
- **Banco de Dados**: MySQL
- **Email**: Mailtrap (para reset de senha)
- **Outras**: Middleware personalizada para controle de acesso.
