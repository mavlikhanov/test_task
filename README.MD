1. git clone https://github.com/mavlikhanov/test_task.git
2. cd test_task
3. docker-compose up -d
4. docker-compose exec app composer install
5. docker-compose exec php /app/generate_leads --10000
