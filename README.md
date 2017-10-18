# Simple PHP Profiler
A very simple PHP profiler for debugging small code blocks inside project or test scripts to promote performance

# Install
Use composer

# Usage
```
\Profiler\Profiler::start();
for ($i = 0; $i < 100000; $i++) $array[] = $i + 10;
$results = \Profiler\Profiler::end();

echo $results['time'], // in seconds
    PHP_EOL,
    $results['memory'], // in bytes
    PHP_EOL;
``` 
