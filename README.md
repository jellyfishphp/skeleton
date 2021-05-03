# Jellyfish Skeleton

## Initialize ##

Run the following line via terminal:

```shell
$ VERSION="7.4" \
  LINUX_DIST="alpine" \
  docker run --rm -it -v $PWD:/var/www/jellyfish/releases/current/ -w /var/www/jellyfish/releases/current/ --entrypoint= jellyfishphp/php:$VERSION-cli-$LINUX_DIST /bin/zsh -c "make dev"
```

The following table shows possible values for the variables in th: 

Variable   | Possible Values           
---------- | -----------
LINUX_DIST | alpine, debian
VERSION    | 7.4, 8.0
