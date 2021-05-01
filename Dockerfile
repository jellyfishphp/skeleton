ARG VERSION=7.4
ARG LINUX_DISTRIBUTION=alpine

FROM jellyfishphp/php:${VERSION}-cli-${LINUX_DISTRIBUTION}

LABEL maintainer="Daniel Rose <daniel-rose@gmx.de>"

ADD --chown=www-data:www-data . /var/www/spryker/jellyfish/current/

CMD ["./rr", "serve"]
