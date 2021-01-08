# Right Consents - PHP Iframe Sample

This sample demonstrated how a consent form can be integrated within an iframe using PHP.

## In a nutshell

This sample is mean to be run as a docker container along with the [stock Rights Consents stack](https://github.com/fairandsmart/right-consents), please see below if your work environment
is different.

1. In your Right Consents instance, head to `Integration > Security` and generate an API Key ;
1. Build the image : `docker build -t php-iframe-form .` ;
1. Run the container : `docker run -e API_KEY="<the previously generated API key>" -p 8785:80 --network="right-consents_default" php-iframe-form` ;
1. Navigate to http://localhost:8785 ;

This sample use a predefined consent context that generate a form for a subject id **test-subject**. If you submit the form in the iframe, you should be able to consult the subject page using the backoffice operator access: http://localhost:4286/admin/subjects/test-subject

## Build and run a container with a generated sample

This sample can also be used to test custom consent collect context. You can use the backoffice dedicated page to generate a custom context and reflect that modification in the php sample application : 

1. In your Right Consents instance, head to `Integration > Collect` ;
1. Setup the sample form you wish to test, then click on `PHP integration example` at the end ;
1. Copy the content and replace the `index.php` file with it ;
1. Build the image : `docker build -t php-iframe-form .` ;
1. Run the container : `docker run -e API_KEY="<the previously generated API key>" -p 8785:80 --network="right-consents_default" php-iframe-form` ;
1. Navigate to http://localhost:8785 ;

# Sample tuning

The following env vars can be used to tune this sample :
    
| env. var. | usage | default value |
|---|---|---|
| API_URL | the Right Consents backend URL *from your PHP script point-of-view* | http://right-consents-back:8087 |
| IFRAME_HOST_URL | the Right Consents backend URL *from your web browser point-of-view* | http://localhost:4287 |
| API_KEY | your API key | |

Generally speaking, you will give the same value to API_URL and IFRAME_HOST_URL, excepted when your PHP sample will need to access to the RC backend with a different URL than your end users.
This is the case with our docker-compose setup, because from PHP's point-of-view, localhost is the *PHP container localhost* and not the *host localhost*. Yeah, that's tricky.
