php-cartesian-benchmark
=======================

[![Build Status](https://travis-ci.org/PatchRanger/php-cartesian-benchmark.png)](https://travis-ci.org/PatchRanger/php-cartesian-benchmark)

Tested with unstable dev-master versions.

[**Latest benchmarks**](https://travis-ci.org/PatchRanger/php-cartesian-benchmark)

```
$ php bin/console benchcart --count 1 --by 1
Runtime: PHP 7.3.1
Host: Windows NT DESKTOP-81ELF05 10.0 build 17134 (Windows 10) AMD64
Iterators count: 1
Each iterator by: 1

+--------------------------------+---------------+---------+
| package                        | duration (MS) | MEM (B) |
+--------------------------------+---------------+---------+
| patchranger/cartesian-iterator | 0             | 4194304 |
+--------------------------------+---------------+---------+

$ php bin/console benchcart --count 1 --by 1000
Runtime: PHP 7.3.1
Host: Windows NT DESKTOP-81ELF05 10.0 build 17134 (Windows 10) AMD64
Iterators count: 1
Each iterator by: 1000

+--------------------------------+---------------+---------+
| package                        | duration (MS) | MEM (B) |
+--------------------------------+---------------+---------+
| patchranger/cartesian-iterator | 6             | 4194304 |
+--------------------------------+---------------+---------+

$ php bin/console benchcart --count 1000 --by 1
Runtime: PHP 7.3.1
Host: Windows NT DESKTOP-81ELF05 10.0 build 17134 (Windows 10) AMD64
Iterators count: 1000
Each iterator by: 1

+--------------------------------+---------------+---------+
| package                        | duration (MS) | MEM (B) |
+--------------------------------+---------------+---------+
| patchranger/cartesian-iterator | 4             | 4194304 |
+--------------------------------+---------------+---------+

$ php bin/console benchcart --count 1000 --by 1000
  Runtime: PHP 7.3.1
  Host: Windows NT DESKTOP-81ELF05 10.0 build 17134 (Windows 10) AMD64
  Iterators count: 1000
  Each iterator by: 1000
  
  +--------------------------------+---------------+---------+
  | package                        | duration (MS) | MEM (B) |
  +--------------------------------+---------------+---------+
  | patchranger/cartesian-iterator | 9             | 4194304 |
  +--------------------------------+---------------+---------+

```
