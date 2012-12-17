#/bin/sh

set -e
set -x

# unit tests
phpunit

# integration tests
cd tests/samples-ui-tests
mvn -s settings.xml clean test
