php-cartesian-benchmark
=======================

[![Build Status](https://travis-ci.org/PatchRanger/php-cartesian-benchmark.png)](https://travis-ci.org/PatchRanger/php-cartesian-benchmark)

Tested with unstable dev-master versions.

[**Latest benchmarks**](https://travis-ci.org/PatchRanger/php-cartesian-benchmark)

```
$ php bin/console benchcart --count 1 --by 10000
Runtime: PHP 7.1.11
Host: Linux travis-job-5e9f3726-2b82-4f48-a376-b1d14d86441a 4.4.0-101-generic #124~14.04.1-Ubuntu SMP Fri Nov 10 19:05:36 UTC 2017 x86_64
Iterators count: 1
Each iterator by: 10000
[patchranger/cartesian-iterator] start.[patchranger/cartesian-iterator] finished.
[th3n3rd/cartesian-product] start.[th3n3rd/cartesian-product] finished.
[bentools/cartesian-product] start.[bentools/cartesian-product] finished.
+--------------------------------+---------------+---------+----------------+
| package                        | duration (MS) | MEM (B) | Error (if any) |
+--------------------------------+---------------+---------+----------------+
| bentools/cartesian-product     | 31            | 4194304 |                |
| th3n3rd/cartesian-product      | 72            | 6291456 |                |
| patchranger/cartesian-iterator | 89            | 4194304 |                |
+--------------------------------+---------------+---------+----------------+
The command "php bin/console benchcart --count 1 --by 10000" exited with 0.

$ php bin/console benchcart --count 2 --by 1000
Runtime: PHP 7.1.11
Host: Linux travis-job-5e9f3726-2b82-4f48-a376-b1d14d86441a 4.4.0-101-generic #124~14.04.1-Ubuntu SMP Fri Nov 10 19:05:36 UTC 2017 x86_64
Iterators count: 2
Each iterator by: 1000
[patchranger/cartesian-iterator] start.[patchranger/cartesian-iterator] finished.
[th3n3rd/cartesian-product] start.[th3n3rd/cartesian-product] finished.
[bentools/cartesian-product] start.[bentools/cartesian-product] finished.
+--------------------------------+---------------+---------+----------------+
| package                        | duration (MS) | MEM (B) | Error (if any) |
+--------------------------------+---------------+---------+----------------+
| bentools/cartesian-product     | 3031          | 4194304 |                |
| th3n3rd/cartesian-product      | 9456          | 4194304 |                |
| patchranger/cartesian-iterator | 9605          | 4194304 |                |
+--------------------------------+---------------+---------+----------------+
The command "php bin/console benchcart --count 2 --by 1000" exited with 0.

$ php bin/console benchcart --count 3 --by 100
Runtime: PHP 7.1.11
Host: Linux travis-job-5e9f3726-2b82-4f48-a376-b1d14d86441a 4.4.0-101-generic #124~14.04.1-Ubuntu SMP Fri Nov 10 19:05:36 UTC 2017 x86_64
Iterators count: 3
Each iterator by: 100
[patchranger/cartesian-iterator] start.[patchranger/cartesian-iterator] finished.
[th3n3rd/cartesian-product] start.[th3n3rd/cartesian-product] finished.
[bentools/cartesian-product] start.[bentools/cartesian-product] finished.
+--------------------------------+---------------+---------+----------------+
| package                        | duration (MS) | MEM (B) | Error (if any) |
+--------------------------------+---------------+---------+----------------+
| bentools/cartesian-product     | 3110          | 4194304 |                |
| patchranger/cartesian-iterator | 11633         | 4194304 |                |
| th3n3rd/cartesian-product      | 12969         | 4194304 |                |
+--------------------------------+---------------+---------+----------------+
The command "php bin/console benchcart --count 3 --by 100" exited with 0.

$ php bin/console benchcart --count 4 --by 30
Runtime: PHP 7.1.11
Host: Linux travis-job-5e9f3726-2b82-4f48-a376-b1d14d86441a 4.4.0-101-generic #124~14.04.1-Ubuntu SMP Fri Nov 10 19:05:36 UTC 2017 x86_64
Iterators count: 4
Each iterator by: 30
[patchranger/cartesian-iterator] start.[patchranger/cartesian-iterator] finished.
[th3n3rd/cartesian-product] start.[th3n3rd/cartesian-product] finished.
[bentools/cartesian-product] start.[bentools/cartesian-product] finished.
+--------------------------------+---------------+---------+----------------+
| package                        | duration (MS) | MEM (B) | Error (if any) |
+--------------------------------+---------------+---------+----------------+
| bentools/cartesian-product     | 2544          | 4194304 |                |
| patchranger/cartesian-iterator | 10257         | 4194304 |                |
| th3n3rd/cartesian-product      | 12915         | 4194304 |                |
+--------------------------------+---------------+---------+----------------+
The command "php bin/console benchcart --count 4 --by 30" exited with 0.

$ php bin/console benchcart --count 5 --by 15
Runtime: PHP 7.1.11
Host: Linux travis-job-5e9f3726-2b82-4f48-a376-b1d14d86441a 4.4.0-101-generic #124~14.04.1-Ubuntu SMP Fri Nov 10 19:05:36 UTC 2017 x86_64
Iterators count: 5
Each iterator by: 15
[patchranger/cartesian-iterator] start.[patchranger/cartesian-iterator] finished.
[th3n3rd/cartesian-product] start.[th3n3rd/cartesian-product] finished.
[bentools/cartesian-product] start.[bentools/cartesian-product] finished.
+--------------------------------+---------------+---------+----------------+
| package                        | duration (MS) | MEM (B) | Error (if any) |
+--------------------------------+---------------+---------+----------------+
| bentools/cartesian-product     | 2511          | 4194304 |                |
| patchranger/cartesian-iterator | 10584         | 4194304 |                |
| th3n3rd/cartesian-product      | 14598         | 4194304 |                |
+--------------------------------+---------------+---------+----------------+
The command "php bin/console benchcart --count 5 --by 15" exited with 0.

$ php bin/console benchcart --count 10 --by 4
Runtime: PHP 7.1.11
Host: Linux travis-job-5e9f3726-2b82-4f48-a376-b1d14d86441a 4.4.0-101-generic #124~14.04.1-Ubuntu SMP Fri Nov 10 19:05:36 UTC 2017 x86_64
Iterators count: 10
Each iterator by: 4
[patchranger/cartesian-iterator] start.[patchranger/cartesian-iterator] finished.
[th3n3rd/cartesian-product] start.[th3n3rd/cartesian-product] finished.
[bentools/cartesian-product] start.[bentools/cartesian-product] finished.
+--------------------------------+---------------+---------+----------------+
| package                        | duration (MS) | MEM (B) | Error (if any) |
+--------------------------------+---------------+---------+----------------+
| bentools/cartesian-product     | 4076          | 4194304 |                |
| patchranger/cartesian-iterator | 22042         | 4194304 |                |
| th3n3rd/cartesian-product      | 35785         | 4194304 |                |
+--------------------------------+---------------+---------+----------------+
The command "php bin/console benchcart --count 10 --by 4" exited with 0.

$ php bin/console benchcart --count 5000 --by 1
Runtime: PHP 7.1.11
Host: Linux travis-job-5e9f3726-2b82-4f48-a376-b1d14d86441a 4.4.0-101-generic #124~14.04.1-Ubuntu SMP Fri Nov 10 19:05:36 UTC 2017 x86_64
Iterators count: 5000
Each iterator by: 1
[patchranger/cartesian-iterator] start.[patchranger/cartesian-iterator] finished.
[th3n3rd/cartesian-product] start.[th3n3rd/cartesian-product] finished.
PHP Fatal error:  Allowed memory size of 1073741824 bytes exhausted (tried to allocate 266240 bytes) in /home/travis/build/PatchRanger/php-cartesian-benchmark/vendor/bentools/cartesian-product/src/CartesianProduct.php on line 43
+--------------------------------+---------------+----------+----------------+
| package                        | duration (MS) | MEM (B)  | Error (if any) |
+--------------------------------+---------------+----------+----------------+
| bentools/cartesian-product     |               |          |                |
| patchranger/cartesian-iterator | 234           | 6291456  |                |
| th3n3rd/cartesian-product      | 118341        | 10485760 |                |
+--------------------------------+---------------+----------+----------------+
The command "php bin/console benchcart --count 5000 --by 1" exited with 0.
```
