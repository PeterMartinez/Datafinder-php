<?php

namespace Datafinder;

/**
* DataFinder API Library
*
* https://github.com/PeterMartinez/Datafinder-php
*
* @copyright @PeterMartinez on GitHub
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in all
* copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
* SOFTWARE.
*
*
* @author @PeterMartinez on GitHub
* @version 1.0.0
*
*/

namespace Datafinder;
    use \GuzzleHttp\Client;

class Datafinder
{
    var $client;
    var $api_key;
    var $output;
    var $base_url = "http://api.datafinder.com/";

    /**
        * Constructor function for all new Datafinder instances
        *
        * Store Subscriber & Options
        *
        * @param  $api_key
        * @throws Exception if no API Key Set Set
        * @return Datafinder Object
        */
        public function __construct($api_key=null,$output="json"){
            $this->api_key = $api_key;            
            $this->client = new \GuzzleHttp\Client();
            $this->output = ($output == "json")? "json" : "xml";
        }

        /**
        * Consumer Contact Append 
        *
        * https://datafinder.com/api/docs-email-phone
        *
        * @param $service, email or phone      
        * NOTE: d_first and d_last are required for an individual level match.        
        * @param array $search
        *   $search = array();
        *   $search['d_first']  //Required
        *   $search['d_last']  // Required
        *   $search['d_zip'] 
        *   $search['d_fulladdr'] 
        *   $search['d_city'] 
        *   $search['d_state'] 
        *   $search['d_phone'] 
        *   $search['d_email'] 
        *   $search['d_lat'] 
        *   $search['d_long'] 
        *   $search['d_ip'] 
        * @param $cfg_mc, Example: cfg_mc=LF,ACSZ      
        * @param $dcfg_emailinvalid, dcfg_emailinvalid=1
        * @return Datafinder Consumer Contact Append Results
        */
        public function contactAppend($service="email",$search=array(),$cfg_mc=null,$dcfg_emailinvalid=null)
        {
            if($cfg_mc != null){
                $search['cfg_mc'] = $cfg_mc;
            }
            if($dcfg_emailinvalid != null){
                $search['dcfg_emailinvalid'] = $dcfg_emailinvalid;
            }
            $results = $this->client->post(
                    $this->base_url."qdf.php?k2=".$this->api_key."&service=".$service."&output=".$this->output, 
                    [
                        'form_params' => $search,
                        'timeout'=>0
                     ]);
            return json_decode(($results->getBody()->getContents()),true);//TODO PARSE XML IF OUTPUT XML

        }



}