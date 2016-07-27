* https://www.elastic.co/guide/en/logstash/current/first-event.html

```
sh$ bin/logstash -e 'input { stdin { } } output { stdout {} }'
```
The -e flag enables you to specify a configuration directly from the command line. Specifying configurations at the command line lets you quickly test configurations without having to edit a file between iterations. This pipeline takes input from the standard input, stdin, and moves that input to the standard output, stdout, in a structured format.

Once "Pipeline main started" is displayed, type hello world at the command prompt to see Logstash respond:
```
hello world                                                         <--  STDIN
2013-11-21T01:22:14.405+0000 0.0.0.0 hello world                    <-- logstash response
```

Use the -f <path/to/file> option to specify the configuration file that defines that instance¡¯s pipeline.

A Logstash pipeline has two required elements, input and output, and one optional element, filter. 

```xxx.conf
# The # character at the beginning of a line indicates a comment. Use
# comments to describe your configuration.
input {
}
# The filter part of this file is commented out to indicate that it is
# optional.
# filter {
#
# }
output {
}


```
# 
## input
*   file: reads from a file on the filesystem, much like the UNIX command tail -0F
*   syslog: listens on the well-known port 514 for syslog messages and parses according to the RFC3164 format
*   redis: reads from a redis server, using both redis channels and redis lists. Redis is often used as a "broker" in a centralized Logstash installation, which queues Logstash events from remote Logstash "shippers".
*   beats: processes events sent by Filebeat.

## filter
*   grok: parse and structure arbitrary text. Grok is currently the best way in Logstash to parse unstructured log data into something structured and queryable. With 120 patterns built-in to Logstash, it¡¯s more than likely you¡¯ll find one that meets your needs!
*   mutate: perform general transformations on event fields. You can rename, remove, replace, and modify fields in your events.
*   drop: drop an event completely, for example, debug events.
*   clone: make a copy of an event, possibly adding or removing fields.
*   geoip: add information about geographical location of IP addresses (also displays amazing charts in Kibana!)

## outputs
*   elasticsearch: send event data to Elasticsearch. If you¡¯re planning to save your data in an efficient, convenient, and easily queryable format¡­ Elasticsearch is the way to go. Period. Yes, we¡¯re biased :)
*   file: write event data to a file on disk.
*   graphite: send event data to graphite, a popular open source tool for storing and graphing metrics. http://graphite.readthedocs.io/en/latest/
*   statsd: send event data to statsd, a service that "listens for statistics, like counters and timers, sent over UDP and sends aggregates to one or more pluggable backend services". If you¡¯re already using statsd, this could be useful for you!

# Samples

```
sh$ bin/logstash -f xxx.conf
```


```tutorial.conf
input {
    file {
        path => "/var/log/redis/redis.log"
        start_position => beginning 
        ignore_older => 0 
    }
}

filter {
    
}

output {
    elasticsearch {
        hosts => ["IP Address 1:port1", "IP Address 2:port2", "IP Address 3"]
    }
    stdout {}
    file {
        path = > /var/log/logstash/logstash.log
    }
}
```

	
The default behavior of the file input plugin is to monitor a file for new information, in a manner similar to the UNIX tail -f command. To change this default behavior and process the entire file, we need to specify the position where Logstash starts processing the file.

The default behavior of the file input plugin is to ignore files whose last modification is greater than 86400s. To change this default behavior and process the tutorial file (which date can be much older than a day), we need to specify to not ignore old files.
