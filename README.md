# PHP hCaptcha Demo

Este repositório contém um exemplo de um formulário protegido por **hCaptcha**, desenvolvido em **PHP** e estilizado com **Bootstrap**.

## Recursos
- Validação do hCaptcha no lado do servidor.
- Formulário responsivo utilizando Bootstrap.
- Exemplo de requisição via `curl` para testes.

## Como Usar
### 1. Clonar o repositório:
```bash
git clone https://github.com/seu-usuario/php-hcaptcha-demo.git
cd hcaptcha-form-handler
```

### 2. Configurar a Chave do hCaptcha
Altere a sua **chave do site** (`sitekey`) e **chave secreta** (`secret`) no arquivo `hcaptcha.php`:
```php
const HCAPTCHA_SECRET = 'SUA_CHAVE_SECRETA_AQUI';
```
e
```html
<div class="h-captcha" data-sitekey="<site-key>"></div>
```

Cadastre-se no [hCaptcha](https://www.hcaptcha.com/) para obter suas chaves.

### 3. Executar Localmente
Suba um servidor local com PHP:
```bash
php -S localhost:8000
```
Acesse `http://localhost:8000/hcaptcha.php` no navegador.

## Teste Manual via `curl`
Para testar a requisição POST manualmente (com um token válido do hCaptcha):
```powershell
curl -X POST https://seusite.com/hcaptcha.php -d "name=Teste&submit=SUBMIT&h-captcha-response=SEU_TOKEN_AQUI"
```

## Tecnologias Utilizadas
- **PHP** - Backend do formulário
- **hCaptcha** - Proteção contra bots
- **Bootstrap 5** - Estilização do formulário
- **cURL** - Testes via terminal

## Contribuição
Fique à vontade para enviar **pull requests** ou relatar problemas via **issues**.

---
**Autor:** Luiz | [francosinformatica.com](https://www.francosinformatica.com/)

