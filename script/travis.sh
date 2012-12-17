#/bin/sh

set -e
set -x

# unit tests
phpunit

# integration tests
cd tests/sample-ui-tests
mvn -qs settings.xml clean test
