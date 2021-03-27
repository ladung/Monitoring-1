```sh
ip a
cd
vim /etc/graphite/local_settings.py
egrep -v "^$|^#" /etc/graphite/local_settings.py
vim /etc/graphite/local_settings.py
graphite-manage syncdb
service apache2 reload
service apache2 restart
q!
vim /etc/hosts
vim /etc/apache2/sites-available
vim /etc/apache2/sites-available/apache2-graphite.conf
q!
vim /etc/apache2/sites-available/apache2-graphite.conf
service apache2 restart
egrep -v "^$|^#" /etc/graphite/local_settings.py
vim /etc/default/graphite-carbon
vim /etc/carbon/carbon.conf
egrep -v "^$|^#" /etc/carbon/carbon.conf
service apache2 reload
sudo a2dissite 000-default
sudo service apache2 reload
sudo apt-get install graphite-web graphite-carbon
apt-get install –y postgresql libpq-dev python-psycopg2
apt-get install yy postgresql libpq-dev python-psycopg2
apt-get install -y postgresql libpq-dev python-psycopg2
sudo -u postgres psql
sudo graphite-manage syncdb
sudo a2dissite 000-default
service apache2 reload
cd /etc/carbon/carbon.conf
vim /etc/carbon/carbon.conf
vim /etc/carbon/storage-schemas.conf
vim /etc/carbon/storage-aggregation.conf
apt-get install apache2 libapache2-mod-wsgi
a2ensite apache2-graphite
sudo service apache2 reload
sudo service apache2 stop
init 0
cd
sudo apt-get update
sudo apt-get install graphite-web graphite-carbon
sudo apt-get install graphite-web graphite-carbon -y
sudo apt-get install –y postgresql libpq-dev python-psycopg2
sudo apt-get install -y postgresql libpq-dev python-psycopg2
sudo -u postgres psql
apt install vim -y
vim /etc/graphite/local_setttings.py
vim /etc/graphite/local_settings.py
cp /etc/graphite/local_settings.py /etc/graphite/local_settings.py.org
vim /etc/graphite/local_settings.py
sudo graphite-manage syncdb
vim /etc/graphite/local_settings.py
sudo graphite-manage syncdb
vim /etc/default/graphite-carbon
vim /etc/carbon/carbon.conf
sudo apt-get install -y apache2 libapache2-mod-wsgi
a2dissite 000-default
sudo cp /usr/share/graphite-web/apache2-graphite.conf /etc/apache2/sites-available/
sudo service apache2 reload
ip a
vim /etc/apache2/sites-available
vim /etc/apache2/sites-available/apache2-graphite.conf
ip a
apt-get install graphite-web graphite-carbon
vim /etc/graphite/local_settings.py
sudo su
cd /var/lib/graphite/whisper/
ls
ls -alh
watch ls -alh
cd
cd /var/lib/graphite/whisper/
ls -alh
rsync --help
ls -alh
rsync -a root@172.16.68.149:/var/lib/graphite/whisper .
ls -alh
cd whisper/
mv * ../
ls -alh
cd carbon/
ls
cd ../..
;s
ls
ls -alh
service apache2 restart
hítory
history
ip a
cd /var/lib/graphite/whisper
ls -alh
cd whisper/
ls
cd carbon/
ls
cd ..
cd
history
```

```sh
$ vim /etc/graphite/local_settings.py
SECRET_KEY = 'a_salty_string'
TIME_ZONE = 'Asia/Ho_Chi_Minh'
LOG_RENDERING_PERFORMANCE = True
LOG_CACHE_PERFORMANCE = True
LOG_METRIC_ACCESS = True
GRAPHITE_ROOT = '/usr/share/graphite-web'
CONF_DIR = '/etc/graphite'
STORAGE_DIR = '/var/lib/graphite/whisper'
CONTENT_DIR = '/usr/share/graphite-web/static'
WHISPER_DIR = '/var/lib/graphite/whisper'
LOG_DIR = '/var/log/graphite'
INDEX_FILE = '/var/lib/graphite/search_index'  # Search index file
USE_REMOTE_USER_AUTHENTICATION = True
DATABASES = {
    'default': {
        'NAME': 'graphite',
        'ENGINE': 'django.db.backends.postgresql_psycopg2',
        'USER': 'graphite',
        'PASSWORD': 'password',
        'HOST': '127.0.0.1',
        'PORT': ''
    }
}
```
```sh
graphite-manage syncdb
service apache2 reload
service apache2 restart
```

```sh
$ vim /etc/apache2/sites-available/apache2-graphite.conf

<VirtualHost *:80>

        WSGIDaemonProcess _graphite processes=5 threads=5 display-name='%{GROUP}' inactivity-timeout=120 user=_graphite group=_graphite
        WSGIProcessGroup _graphite
        WSGIImportScript /usr/share/graphite-web/graphite.wsgi process-group=_graphite application-group=%{GLOBAL}
        WSGIScriptAlias / /usr/share/graphite-web/graphite.wsgi

        Alias /content/ /usr/share/graphite-web/static/
        <Location "/content/">
                SetHandler None
        </Location>

        <Location "/server-status">
                SetHandler server-status
                Require all granted
         </Location>

        ErrorLog ${APACHE_LOG_DIR}/graphite-web_error.log

        # Possible values include: debug, info, notice, warn, error, crit,
        # alert, emerg.
        LogLevel warn

        CustomLog ${APACHE_LOG_DIR}/graphite-web_access.log combined

</VirtualHost>
```
```sh
service apache2 restart
```

```sh
$ vim /etc/carbon/carbon.conf

[cache]
STORAGE_DIR    = /var/lib/graphite/
CONF_DIR       = /etc/carbon/
LOG_DIR        = /var/log/carbon/
PID_DIR        = /var/run/
LOCAL_DATA_DIR = /var/lib/graphite/whisper/
ENABLE_LOGROTATION = True
USER = _graphite
MAX_CACHE_SIZE = inf
MAX_UPDATES_PER_SECOND = 500
MAX_CREATES_PER_MINUTE = 50
LINE_RECEIVER_INTERFACE = 0.0.0.0
LINE_RECEIVER_PORT = 2003
ENABLE_UDP_LISTENER = False
UDP_RECEIVER_INTERFACE = 0.0.0.0
UDP_RECEIVER_PORT = 2003
PICKLE_RECEIVER_INTERFACE = 0.0.0.0
PICKLE_RECEIVER_PORT = 2004
LOG_LISTENER_CONNECTIONS = True
USE_INSECURE_UNPICKLER = False
CACHE_QUERY_INTERFACE = 0.0.0.0
CACHE_QUERY_PORT = 7002
USE_FLOW_CONTROL = True
LOG_UPDATES = False
LOG_CACHE_HITS = False
LOG_CACHE_QUEUE_SORTS = True
CACHE_WRITE_STRATEGY = sorted
WHISPER_AUTOFLUSH = False
WHISPER_FALLOCATE_CREATE = True
[relay]
LINE_RECEIVER_INTERFACE = 0.0.0.0
LINE_RECEIVER_PORT = 2013
PICKLE_RECEIVER_INTERFACE = 0.0.0.0
PICKLE_RECEIVER_PORT = 2014
LOG_LISTENER_CONNECTIONS = True
RELAY_METHOD = rules
REPLICATION_FACTOR = 1
DESTINATIONS = 127.0.0.1:2004
MAX_DATAPOINTS_PER_MESSAGE = 500
MAX_QUEUE_SIZE = 10000
USE_FLOW_CONTROL = True
[aggregator]
LINE_RECEIVER_INTERFACE = 0.0.0.0
LINE_RECEIVER_PORT = 2023
PICKLE_RECEIVER_INTERFACE = 0.0.0.0
PICKLE_RECEIVER_PORT = 2024
LOG_LISTENER_CONNECTIONS = True
FORWARD_ALL = True
DESTINATIONS = 127.0.0.1:2004
REPLICATION_FACTOR = 1
MAX_QUEUE_SIZE = 10000
USE_FLOW_CONTROL = True
MAX_DATAPOINTS_PER_MESSAGE = 500
MAX_AGGREGATION_INTERVALS = 5
```
```sh
service apache2 reload
sudo a2dissite 000-default
sudo service apache2 reload
sudo apt-get install graphite-web graphite-carbon
apt-get install –y postgresql libpq-dev python-psycopg2
apt-get install yy postgresql libpq-dev python-psycopg2
apt-get install -y postgresql libpq-dev python-psycopg2
sudo -u postgres psql
sudo graphite-manage syncdb
sudo a2dissite 000-default
service apache2 reload
```
```sh
$ vim /etc/carbon/storage-schemas.conf
[carbon]
pattern = ^carbon\.
retentions = 60:90d

[default_1min_for_1day]
pattern = .*
retentions = 60s:1d

[collectd]
pattern = ^collectd.*
retentions = 10s:1d,1m:7d,10m:1y
```

```sh
apt-get install apache2 libapache2-mod-wsgi
a2ensite apache2-graphite
sudo service apache2 reload
sudo service apache2 stop
init 0
```

```sh
sudo apt-get update
sudo apt-get install graphite-web graphite-carbon
sudo apt-get install graphite-web graphite-carbon -y
sudo apt-get install –y postgresql libpq-dev python-psycopg2
sudo apt-get install -y postgresql libpq-dev python-psycopg2
sudo -u postgres psql
sudo graphite-manage syncdb
sudo graphite-manage syncdb
```

```sh
$ /etc/default/graphite-



CARBON_CACHE_ENABLED=true
```

```sh
sudo apt-get install -y apache2 libapache2-mod-wsgi
apt-get install graphite-web graphite-carbon
```
