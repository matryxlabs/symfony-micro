# Symfony MicroKernel Skeleton
## Not populated database

## Mongodb benchmark (%0 failed)
Server Software:        Apache/2.4.18
Server Hostname:        symfony-micro.dev
Server Port:            80

Document Path:          /mongotrackme?lid=d7a394b5c5153ef9a95562c48b0466c7&pid=77831e28477f3f4f8060f410333d1e6f
Document Length:        495 bytes

Concurrency Level:      100
Time taken for tests:   77.728 seconds
Complete requests:      5000
Failed requests:        0
Non-2xx responses:      5000
Keep-Alive requests:    0
Total transferred:      3885000 bytes
HTML transferred:       2475000 bytes
Requests per second:    64.33 [#/sec] (mean)
Time per request:       1554.564 [ms] (mean)
Time per request:       15.546 [ms] (mean, across all concurrent requests)
Transfer rate:          48.81 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   2.1      0      16
Processing:    83 1549 348.0   1597    7694
Waiting:       83 1534 344.2   1582    7693
Total:         84 1549 347.1   1597    7694

Percentage of the requests served within a certain time (ms)
  50%   1597
  66%   1670
  75%   1715
  80%   1750
  90%   1845
  95%   1960
  98%   2210
  99%   2398
 100%   7694 (longest request)

### Mysql benchmark (46% failed)
Server Software:        Apache/2.4.18
Server Hostname:        symfony-micro.dev
Server Port:            80

Document Path:          /trackme?lid=1&pid=1
Document Length:        5884 bytes

Concurrency Level:      100
Time taken for tests:   34.359 seconds
Complete requests:      5000
Failed requests:        2300
   (Connect: 0, Receive: 0, Length: 2300, Exceptions: 0)
Keep-Alive requests:    5000
Total transferred:      30555056 bytes
HTML transferred:       29414956 bytes
Requests per second:    145.52 [#/sec] (mean)
Time per request:       687.175 [ms] (mean)
Time per request:       6.872 [ms] (mean, across all concurrent requests)
Transfer rate:          868.45 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   2.5      0      20
Processing:   123  684 478.8    650    8961
Waiting:      123  684 478.8    650    8961
Total:        123  684 480.4    650    8981

Percentage of the requests served within a certain time (ms)
  50%    650
  66%    690
  75%    721
  80%    740
  90%    806
  95%    872
  98%    976
  99%   1062
 100%   8981 (longest request)

