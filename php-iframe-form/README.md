# PHP Iframe Sample

This sample demonstrated how a consent form can be integrated within an iframe using PHP.

## Quick Launch

1. In your Right Consents instance, head to `Integration > Collect`
2. Setup the sample form you wish to test, then click on `PHP integration example` at the end
3. Copy the content and replace the `index.php` file with it
4. In your Right Consents instance, head to `Integration > Security` and generate an API Key
5. In your `index.php` file, replace `PUT_YOUR_API_KEY_HERE` with your newly generated API Key

*Note: If you're running Right Consents locally, you will need to adjust the `$api_url` and `$iframe_host_url` given your setup (see [Advanced Setup](#advanced) below)*
6. Run the container

```shell
$ docker build -t php-iframe-form .
$ docker run -p 8785:80 --network="right-consents_default" --name php-iframe-sample -d php-iframe-form
```

The sample will be running on http://localhost:8785

## <a name="advanced"></a> Advanced Setup

If you wish to run the sample with docker and your Right Consents (RC) instance is installed locally, you will need to adjust some variables in the PHP code.

For reference, here are all the possible setups:

#### Local RC instance, with Docker
* `$iframe_host_url` :  The endpoint of the local API on the host machine (http://localhost:4287)
* `$api_url` : The endpoint of the API on the docker network (http://right-consents-back:8087)

#### Local RC instance, without Docker
`$api_url` and `$iframe_host_url` must be set with the same value (http://localhost:8087)

#### Remote RC instance
`$api_url` and `$iframe_host_url` must be set with the same value (i.e. the remote endpoint of the RC API)
