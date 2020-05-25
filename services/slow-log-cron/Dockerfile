FROM perconalab/percona-toolkit

RUN apt update

RUN apt install -y cron logrotate mysql-client

COPY ./config/cron/crontab /etc/cron.d/crontab
RUN crontab /etc/cron.d/crontab
