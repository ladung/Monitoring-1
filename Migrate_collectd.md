# Thực hiện Migrate database của Collectd từ hệ thống này sang hệ thống khác.

## Mô hình Lab
|Server|IP|
|------|--|
|Graphite01|172.16.68.149|
|Graphite02|172.16.68.232|

## 1. Thực hiện copy toàn bộ database từ `Graphite01` sang `Graphite02`
- Thực hiện trên **Graphite02**

```ssh
$ cd /var/lib/graphite/whisper/
$ rsync -a root@172.16.68.149:/var/lib/graphite/whisper
```
- Restart service apache

```sh
service apache2 restart
```

## Tài liệu tham khảo
- https://www.digitalocean.com/community/tutorials/how-to-use-rsync-to-sync-local-and-remote-directories
