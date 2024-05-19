# Harchery
An Archery website built my Dhanveer, James, Maximum and Sanya for Bachelors of Computer Science (Design Project)

## Running SQL Queries:

You are also going to need the following python dependencies to initialize the database:

```
python-faker
python-mysql-connector
```
Just modify init.sql and run
```
./exec_query.sh
```
If that doesn't work, it might not have executable permissions:
```
chmod +x exec_query.sh
```
and try again.

> ⚠️ Warning! This script is mainly for modifying tables, if you wan't to perform actual queries just run:
>```shell
>docker exec -it harchery-mysql-1 mysql -uuser -ppassword harcher
>```
> usually the name is `harchery-mysql-1`, however if it's not to find the actual name run:
>```shell
>docker ps
>```

## Harcher Database Not Found:
#### You are likely to have this issue because the database name changed.

1. Stop Docker Compose:

```shell
docker-compose down
```

2. List Docker volumes:

```shell
docker volume ls
```
3. Delete the `dbData` volume (where [folder] represents your directory name):

```shell
docker volume rm [folder]_dbData
```

4. Run your Docker Compose file to recreate the `dbData` volume and the database:

```shell
docker-compose up --build
```

## :)
> for those running windows ```git config --global core.autocrlf false```
