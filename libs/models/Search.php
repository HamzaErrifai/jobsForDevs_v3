<?php

namespace models;

class Search
{

  protected function getDataFromApi($desc, $location, $pageno): array
  {
    $url = "http://jobs.github.com/positions.json?search={$desc}&location={$location}&page={$pageno}";

    $data = array('key1' => 'value1', 'key2' => 'value2');
    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'GET',
        'content' => http_build_query($data)
      )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */
    }

    return json_decode($result, true);
  }
  protected function getPostFromApi($id): array
  {
    $url = "https://jobs.github.com/positions/" . $id . ".json";
    $data = array('key1' => 'value1', 'key2' => 'value2');
    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'GET',
        'content' => http_build_query($data)
      )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */
    }

    return json_decode($result, true);
  }
}
