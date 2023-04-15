git.push:
	git add .
	git commit -m "next commit `date`"
	git push

app.reset:
	php artisan migrate:fresh --seed --force
	php artisan migrate --path="database/migrations/instance"

app.migrate:
	php artisan migrate --path="database/migrations/instance"

app.migrate.rollback:
	php artisan migrate:rollback --path="database/migrations/instance"
