#!/bin/bash

sed -i "s/JNCTF{plz_initialize_this_flag}/$1/g" /var/www/html/flag.php
