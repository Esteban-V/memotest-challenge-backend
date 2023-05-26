#!/bin/bash

set -e

host="$1"
shift
username="$1"
shift
password="$1"
shift
cmd="$@"

until mysql -h"$host" -u"$username" -p"$password" -e 'SELECT 1'; do
  >&2 echo "Mariadb is unavailable - sleeping"
  sleep 1
done

>&2 echo "Mariadb is up - executing command"
exec $cmd
