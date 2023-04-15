git.push:
	git add .
	git commit -m "next commit `date`"
	git push

app.reset:
	php artisan migrate:fresh --seed --force

app.migrate:
	php artisan migrate

app.migrate.rollback:
	php artisan migrate:rollback
