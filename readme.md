# Examples for parsing Facebook's signed_request

Provides samples for decoding [`signed_request`](http://developers.facebook.com/docs/authentication/canvas) in a few different
languages. 

To run the simple tests:

    ./test.sh

To run the complex tests you need [expresso](http://visionmedia.github.com/expresso/) for [node.js](http://nodejs.org/). Then run:

    expresso

## Required Extensions

Many systems have the required extensions built in, but if you are getting weird errors when running the scripts, you are probably missing them.

### PHP

* [JSON](http://php.net/json)
* [Hash](http://php.net/hash)

### Python

No extensions required

### Ruby

No extensions required

### Java

* [Apache Commons Codec](http://commons.apache.org/codec/)
* [json-simple](http://code.google.com/p/json-simple/)
