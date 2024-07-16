# Mars CDC Data

## Setup

- Clone Repo OR Download and Extract The Project
- Rename the .env.example to .env
- Change the Database sqlite path to your absolute path
- Run php artisan:migrate &&  php artisan:app:ingest-cdc-data
- Run php artisan tinker and create a admin user
- To get the token -- http://127.0.0.1:8000/api/token  Note :this is not a real world application of token
- To get the Api data http://127.0.0.1:8000/api/cdc-data?jurisdiction=National
- use the filters accordingly 
