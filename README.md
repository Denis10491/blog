# Blog 2.0

### Run Locally

Clone the project

```bash
git clone https://github.com/Denis10491/blog
```

Install dependencies

```bash
composer install
npm install
```

Copy from .env.example to .env and configure the configurations described above

Connect image storage

```bash
php artisan storage:link
```

Run docker build an application image

```bash
docker build -t app .
```

Run docker compose

```bash
docker-compose up -d
```

Generate application key

```bash
docker-compose exec app php artisan key:generate
```

Run migrations and seeds

```bash
docker-compose exec app php artisan migrate:fresh --seed
```

Run a local server for the client side

```bash
npm run dev
```

Open project: http://127.0.0.1:8000
