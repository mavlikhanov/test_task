1. git clone https://github.com/mavlikhanov/test_task.git
2. docker-compose up -d
3. docker-compose exec app composer install
4. docker-compose exec php /app/generate_leads --10000