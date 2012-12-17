#!/bin/sh -ex

# unit tests
phpunit

# integration tests
cd tests/samples-ui-tests
mvn -qs settings.xml clean test
