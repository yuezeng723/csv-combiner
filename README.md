# Yue Zeng's CSV Combiner

This is a PHP function that allows you to combine CSV files with the same columns and output a new CSV file to `stdout` that contains the rows from each of the inputs along with an additional column that has the filename from which the row came. 

## Quick start

`cd` into this project's directory and run the `./csv-combiner.php` in command line as below:

##### Example 1:

```
$php ./csv-combiner.php ./fixtures/accessories.csv ./fixtures/clothing.csv > combined.csv
```

This command combines file  `./fixtures/accessories.csv`  and file `./fixtures/clothing.csv` , echo the output and redirects the output into the result file `./combined/csv`.

##### Example 2:

```
$php ./csv-combiner.php ./fixtures/accessories.csv ./fixtures/clothing.csv ./fixtures/househ
old_cleaners.csv > combined.csv
```

 This command combines three files `./fixtures/accessories.csv` ,  `./fixtures/clothing.csv` , and `./fixtures/clothing.csv`, echo the output and redirects the ouput into the result file  `./combined/csv`.



## API

##### function joinFiles(array $files)

This method takes an array of CSV files to be joined, and combines the content of these CSV files together according to the files' order inside the array. It add a header corresponding with the headers of joined CSV file, and add a new column called "filename".

```php
function joinFiles(array $files) {
  /**
  *implementation codes
  */
}

$files = array("./fixtures/accessories.csv", "./fixtures/clothing.csv");
joinFiles($files);
```

The argument it takes is an array of the absolute path of CSV files to be joined, or relative path which relatives to `csv-combiner.php`



## Unit Tests

The unit test is implemented with PHPUnit framework. The project  directory tree is shown below:

```php
csv-combiner
├─ .DS_Store
├─ .phpunit.result.cache
├─ combined.csv // The output file contains the result of combined CSV files
├─ composer.json 
├─ composer.lock
├─ csv-combiner.php // My implementation of csv-combiner. Execute this one in the command line.
├─ fixtures
│  ├─ accessories.csv
│  ├─ clothing.csv
│  └─ household_cleaners.csv
├─ generatefixtures.py // Python file provided by PMG to generate CSV files inside fixtures directory
├─ phpunit.xml // Configuration file for PHPUnit
├─ tests // Containes Unit tests
│  ├─ cvsCombinerTest.php
│  └─ unitTestFiles
│     ├─ accessories.csv
│     ├─ clothing.csv
│     ├─ household_cleaners.csv
│     ├─ testFile1.csv
│     ├─ testFile2.csv
│     └─ testFile3.csv
└─ vendor   // Contains framework for PHPUnit
```

The Unit tests are in the file `./tests`. Testing codes are in the file `./tests/cvsCombinerTest.php`, which tests the performance of joining multiple CSV files and joining CSV files with multiple columns. 

`./tests/unitTestFiles` contains the CSV files for the unit test.



