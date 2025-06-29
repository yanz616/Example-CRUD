FROM docker.io/library/mariadb:10.11

COPY ./penjualan_mobil.sql /docker-entrypoint-initdb.d/
