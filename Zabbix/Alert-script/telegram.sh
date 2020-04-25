#!/bin/bash

## Reference: https://serveradmin.ru/nastroyka-opoveshheniy-zabbix-v-telegram/

token='526250249:AAFtAqy4ln0BqK5vtU_9IoSlLduhtl8IaGg'
chat="$1"
subj="$2"
message="$3"

/usr/bin/curl -s --header 'Content-Type: application/json' --request 'POST' --data "{\"chat_id\":\"${chat}\",\"text\":\"${subj}\n${message}\"}" "https://api.telegram.org/bot${token}/sendMessage"