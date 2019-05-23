npx git-file-history path/to/file.ext



#####Run a specific file
vendor\bin\phpunit tests\ReceiptTest.php
#####Run a specific method
vendor\bin\phpunit tests --filter=testTax
#####Run a specific testsuite
vendor\bin\phpunit --testsuite=app
#####Run a specific testsuite and a sppecific method
vendor\bin\phpunit --testsuite=app --filter=testTax
#####Create code coverage report in a folder
vendor\bin\phpunit --coverage-html=<place to store>
#####For help
vendor\bin\phpunit --help
