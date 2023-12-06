## Requisitos

- Docker
- Node.js

## Instalação

```
### Instalando pacotes do Node.js

Caso não tenha o yarn instalado ainda:

```bash
npm i -g yarn
```

Instalando dependências (Via terminal, acesse o tema):

```bash
yarn install
```

## Desenvolvimento

### Configuração do ambiente

Inicie o Docker 

```bash
sudo service docker start
```

### Rodando o projeto

#### Back-end
No arquivo docker-compose.yaml, faça as configurações de ambiente de acordo com a sua preferência ou mantenha os que estão atualmente definidos. Em seguida rode o seguinte comando:

```bash
docker-compose up -d
```

Parando o docker

```bash
sudo service docker stop
```

#### Front-end

Na pasta raiz do Tema

```bash
npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch
```

grunt para rodar o scss watch
```bash
yarn grunt
```
