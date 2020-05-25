FROM mysql:8.0

RUN apt update

RUN apt install -y wget supervisor

RUN cd /tmp && \
    wget --quiet https://github.com/prometheus/node_exporter/releases/download/v0.18.1/node_exporter-0.18.1.linux-amd64.tar.gz && \
    tar -xzf node_exporter-0.18.1.linux-amd64.tar.gz && \
    mv /tmp/node_exporter-0.18.1.linux-amd64/node_exporter /usr/local/bin/ && \
    rm /tmp/node_exporter-0.18.1.linux-amd64.tar.gz && \
    rm -r /tmp/node_exporter-0.18.1.linux-amd64/

RUN touch /var/log/supervisor/supervisord.log
